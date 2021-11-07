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
                    <div class="col-12">
                    <div class="card-body p-4">
                <form method="POST" action="{{ route('coordinators.send-invite') }}" class="form">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <h1>{{ __('Invite New Coordinator') }}</h1>
                    <p class="text-info">
                        To: <strong>{{ $user->first_name }} {{ $user->middle_name }}  {{ $user->last_name }}</strong>
                        <br>Email: <strong>{{$user->email}}</strong>
                    </p>
                    <div class="input-group mb-3">
                        <div class="form-check checkbox">
                            <input class="form-check-input" type="checkbox" value="true" name="as_admin" id="as_admin"/>
                            <label class="form-check-label text-warning" for="as_admin">Give Admin Rights</label>
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