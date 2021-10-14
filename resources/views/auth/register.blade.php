@extends('dashboard.authBase')

@section('content')

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
                <div class="row justify-content-center">
                  <img src="{{ URL::to('/assets/img/m610.jpg') }}" width="220em"/>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1>{{ __('Register') }}</h1>
                    <p class="text-muted">Accomplishing and submitting this form completes your accreditation as a regional and/or provincial coordinator of M6:10</p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-envelope-open"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
                    </div>
                    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('Last Name') }}" name="name" value="{{ old('lastname') }}" required autofocus>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('First Name') }}" name="name" value="{{ old('firstname') }}" required autofocus>
                    </div>
                    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password" required>
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

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-compass"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('Region') }}" name="region" required>
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('City/Municipality') }}" name="city" required>
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('Home Address') }}" name="city" required>
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('Contact Number 1') }}" name="contact1" required>
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('Contact Number 2') }}" name="contact2">
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('Name of Church or Faith Based Organization') }}" name="churchname">
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                            </svg>
                          </span>
                        </div>
                        <textarea class="form-control" type="text" placeholder="{{ __('Please provide a brief description') }}" name="churchdescription"></textarea>
                    </div>
                    <div class="input-group mb-4">
                    <fieldset class="row ">
                      <legend class="col-form-label pt-0">Position within the Church or Organization
                      </legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="position" id="position_bishop" value="bishop" checked>
                          <label class="form-check-label" for="position_bishop">
                            Bishop
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="position" id="position_pastor" value="pastor">
                          <label class="form-check-label" for="position_pastor">
                            Pastor
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="position" id="position_elder" value="elder">
                          <label class="form-check-label" for="position_elder">
                            Elder
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="position" id="position_director" value="director">
                          <label class="form-check-label" for="position_director">
                            Board Member /  Director
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="position" id="position_member" value="member">
                          <label class="form-check-label" for="position_member">
                            Member
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="position" id="position_other" value="other">
                          <label class="form-check-label" for="position_other">
                            Other
                          </label>
                          <input class="form-control" type="text" placeholder="{{ __('Name of Church or Faith Based Organization') }}" name="position_other_description">
                        </div>
                      </div>
                    </fieldset>
                    </div>
                    <button class="btn btn-block btn-success" type="submit">{{ __('Register') }}</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('javascript')

@endsection