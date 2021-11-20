@extends('dashboard.base')

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
    <div class="row">
    
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header"><h5>Edit Member
            <a href="{{route('faq', 'members')}}" target="_blank"><span class="badge rounded-pill bg-light text-dark">?</span></a></h5></div>
          <div class="card-header"><h5>{{$affiliation->name}}</h5></div>
          <form action="{{ route('members.update', $member->id ) }}" method="POST">
            <input type="hidden" name="affiliation_id" value="{{$affiliation->id}}"/>
            
            @include('dashboard.shared.member-edit-form', ['return_link'=>route('members.index', ['affiliation_id'=>$affiliation->id])])

          </form> 
        </div>
    

    </div>
  </div>
</div>

@endsection

@section('javascript')

<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ asset('js/locations.js') }}"></script>
<script src="{{ asset('js/business.js') }}"></script>
@endsection