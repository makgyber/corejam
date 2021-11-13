
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
        <div class="col-sm-4">
            <div class="card ">
                <div class="card-header"><h4>Change Password</h4></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.change-password') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-warning">Submit</button>
                        <a href="{{route('profile.index')}}" class="btn btn-light">Back to Profile</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')

@endsection