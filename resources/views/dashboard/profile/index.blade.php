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
          <div class="card-header"><h4>Details</h4></div>
            <div class="card-body">
                
                <form href="{{ url('profile.store')  }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName"  name="first_name" value="{{ $user->first_name }}" />
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName"   name="last_name" value="{{ $user->last_name }}" />
                    </div>
                    <div class="mb-3">
                        <label for="contact1" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email"   name="email" value="{{ $user->email }}" />
                    </div>
                    <div class="mb-3">
                        <label for="contact2" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number"  name="contact_number" value="{{ $user->contact_number }}" />
                    </div>
                    <div class="mb-3">
                        <label for="region_code" class="form-label">Region</label>
                        <select class="form-control" id="region_code" name="region_code">   

                            @forelse ($regions as $region)
                                @if ($user->region_code == $region->code)
                                    <option value="{{$region->code}}" selected>{{$region->name}}</option> 
                                @else
                                    <option value="{{$region->code}}">{{$region->name}}</option>    
                                @endif
                            
                            @empty
                            <option value="">No regions found</option>
                            @endforelse

                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" id="province" value="{{$user->province_code}}" />
                        <label for="province_code" class="form-label">Province</label>
                        <select class="form-control" id="province_code" name="province_code">

                        </select>
                        </div>
                    <div class="mb-3">
                    <input type="hidden" id="city" value="{{$user->city_code}}" />
                        <label for="city_code" class="form-label">City/Municipality</label>
                        <select class="form-control" id="city_code" name="city_code">   

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Barangay</label>
                        <input type="text" class="form-control" id="barangay" name="barangay"  value="{{ $user->barangay }}">
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Street Address</label>
                        <input type="text" class="form-control" id="street" name="street" value="{{ $user->street }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Details</button>
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