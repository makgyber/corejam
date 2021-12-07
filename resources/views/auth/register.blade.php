@extends('dashboard.authBase')

@section('content')

<div class="container-fluid">
  <div class="fade-in">
  @if(Session::has('message'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            </div>
        </div>
    @endif  
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif   
    <div class="row justify-content-center bg-white shadow mb-3">
        <img src="{{ URL::to('/assets/img/m610.jpg') }}" width="200em" height="170em"/> </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="card shadow">
          <div class="card-header"><h5>Registration for {{$affiliation->name}}</h5></div>
          <form action="{{ route('member.selfStore')  }}" method="POST">
            @include('dashboard.shared.registration-create-form')

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')
<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ mix('js/locations.js') }}"></script> 
<script src="{{ mix('js/business.js') }}"></script> 
@endsection