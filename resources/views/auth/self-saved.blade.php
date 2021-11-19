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
      <div class="row justify-content-center">
        <div class="card shadow col-sm-4">
          <div class="card-header  text-center">
              <img src="{{ URL::to('/assets/img/m610.jpg') }}" width="220em"/>
            </div>
            <div class="card-body   text-center">
                <h5>Thank you for completing the registration.</h5>

            Click here to go back to the home page.
            <a href="{{route('index')}}" class="btn btn-primary">Home</a>
            </div>
        </div>    
    </div> 
</div>

@endsection

@section('javascript')

@endsection