@extends('dashboard.authBase')

@section('content')

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4  bg-dark text-white">
              <div class="card-body">
                <h2>Welcome, {{ auth()->user()->name }}!</h2>
                <p class="text-muted">Please enter a password with minimum of 6 alphanumeric characters.</p>
                <form method="POST" action="{{ route('setpassword') }}">
                    @csrf
                    <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                        </svg>
                      </span>
                    </div>
                    <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password" required>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                        </svg>
                      </span>
                    </div>
                    <input class="form-control" type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>
                    </div>
                    <div class="row">
                    <div class="col-6">
                        <button class="btn btn-dark border-light px-4" type="submit">{{ __('Submit') }}</button>
                    </div>
                    </form>
                    </div>
              </div>
            </div>
            <div class="card text-dark py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
              <div class="row justify-content-center">
                  <img src="{{ URL::to('/assets/img/m610.jpg') }}" width="220em"/>
                </div>
                <div>
                  <h3>"thy kingdom come,
                    thy will be done,
                    on earth as it is in heaven."</h3>
                    <h4>Matthew 6:10</h4>
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