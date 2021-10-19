@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Coordinator Invitation</h4></div>
            <div class="card-body">
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
                    <div class="col-6">
                    <div class="card-body p-4">
                <form method="POST" action="{{ route('coordinators.store') }}">
                    @csrf
                    <h1>{{ __('Invite New Coordinator') }}</h1>
                    <p class="text-muted">Create a new coordinator account</p>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" placeholder="{{ __('First Name') }}" id="first_name" name="first_name" value="{{ old('first_name') }}" required autofocus>
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" placeholder="{{ __('Last Name') }}" id="last_name" name="last_name" value="{{ old('last_name') }}" required autofocus>
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-check checkbox">
                            <input class="form-check-input" type="checkbox" value="true" name="as_admin" id="as_admin"/>
                            <label class="form-check-label" for="as_admin">Has Admin Rights</label>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit">{{ __('Submit') }}</button>
                    <a href="{{ route('coordinators.index') }}" class="btn btn-primary m-2">{{ __('Return') }}</a>
                </form>
            </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')


@endsection