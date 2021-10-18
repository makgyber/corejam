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
    <div class="row">
    
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header"><h4>{{ Auth::user()->name }}</h4></div>
            <div class="card-body">
                
                <form href="{{ route('profile.details')  }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName"  name="first_name">
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName"   name="last_name">
                    </div>
                    <div class="mb-3">
                        <label for="contact1" class="form-label">Contact No 1</label>
                        <input type="text" class="form-control" id="contact1"   name="contact1">
                    </div>
                    <div class="mb-3">
                        <label for="contact2" class="form-label">Contact No 2</label>
                        <input type="text" class="form-control" id="contact2"  name="contact2">
                    </div>
                    <div class="mb-3">
                        <label for="region" class="form-label">Region</label>
                        <select class="form-control" id="region" name="region">   

                            @forelse ($regions as $region)
                            <option value="{{$region->code}}">{{$region->name}}</option>
                            @empty
                            <option value="">No regions found</option>
                            @endforelse

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="province" class="form-label">Province</label>
                        <select class="form-control" id="province" name="province">

                        </select>
                        </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City/Municipality</label>
                        <select class="form-control" id="city" name="city">   

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Street Address</label>
                        <input type="text" class="form-control" id="street" name="street">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="card ">
                <div class="card-header"><h4>Change Password</h4></div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="existingPassword" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="existingPassword">
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword">
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
               
            <div class="card">
                <div class="card-header">
                    <h4>Skills And Capabilities</h4>
                    <p>Please describe your professional skills, capabilities and recognized spiritual gifts</p>
                </div>
                <div class="card-body">
                    <form>
                    <div class="row">   
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Preaching
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Teaching
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Evangelism
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Discipleship
                                    </label>
                                </div>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Leadership
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Administration
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Finance
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="mb-3">
                            <label for="otherSkills" class="form-label">Others (separate multiple items with commas)</label>
                            <input type="text" class="form-control" id="otherSkills">
                        </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')

<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ asset('js/locations.js') }}"></script>

@endsection