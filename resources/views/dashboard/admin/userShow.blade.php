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
          <div class="card-header"><h4>Personal Details</h4></div>
            <div class="card-body">
                
                <form action="{{ route('profile.store')  }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName"  name="first_name" value="{{ $user->first_name }}" />
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middleName"  name="middle_name" value="{{ $user->middle_name }}" />
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName"   name="last_name" value="{{ $user->last_name }}" />
                    </div>
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Birthday</label>
                        <input type="date" class="form-control" id="birthday"   name="birthday" value="{{ $user->birthday }}" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email"   name="email" value="{{ $user->email }}" />
                    </div>
                    <div class="mb-3">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number"  name="contact_number" value="{{ $user->contact_number }}" />
                    </div>       
                    <div class="mb-3">
                        <div class="row">
                        <div class="col-4">Is Registered Voter?</div>
                        <div class="col-2">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="isRegisteredVoterYes"   name="is_registered_voter" value="1" 
                        {{ $user->is_registered_voter ? 'checked' : ''}}/>
                        <label for="isRegisteredVoterYes" class="form-check-label">Yes</label>
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-check">
                            <input type="radio" class="form-check-input" id="isRegisteredVoterNo"   name="is_registered_voter" value="0" 
                            {{ $user->is_registered_voter ? '' : 'checked'}}/>
                            <label for="isRegisteredVoterNo" class="form-check-label">No</label>
                          </div>
                        </div>
                    </div>

                    </div>
            </div>

            <hr class=""/>
                
            
            <div class="card-header">
                <h4>Skills And Capabilities</h4>
                <p>Please describe your professional skills, capabilities and recognized spiritual gifts</p>
            </div>
            <div class="card-body">
                <div class="row">   
                    <div class="col-sm-6">
                        <div class="mb-3">

                            @forelse($skillOptions as $skillOption)

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$skillOption}}" id="skills{{ $loop->index}}" name="skillsets[]"
                                {{ in_array($skillOption, $skillsets)? 'checked' : ''}}
                                >
                                <label class="form-check-label" for="skills{{ $loop->index}}">
                                {{$skillOption}}
                                </label>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="otherSkills" class="form-label">Others (separate multiple items with commas)</label>
                    <input type="text" class="form-control" id="otherSkills" value="{{ $other_skillsets ?? '' }}" name="other_skillsets">
                        </div>
                    </div>
                    
                </div>
            </div>

          </div>
        </div>
        <div class="col-sm-6">

            <div class="card">
                <div class="card-header">
                    <h4>Address</h4>
                </div>
                <div class="card-body">
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
                    <a href="{{ route('profile.index') }}" class="btn btn-primary">Return</a>
                </div>
                
            </div>

            
        </div>
    </form>

    </div>
  </div>
</div>

@endsection

@section('javascript')

<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ asset('js/locations.js') }}"></script>

@endsection