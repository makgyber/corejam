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
          <div class="card-header"><h5>Edit Profile
            <a href="{{route('faq', 'profile')}}" target="_blank"><span class="badge rounded-pill bg-light text-dark">?</span></a>
        </h5></div>
            <div class="card-body">
                <form action="{{ route('profile.store', $member->id ) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName"  name="first_name" value="{{ $member->first_name }}" />
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middleName"  name="middle_name" value="{{ $member->middle_name }}" />
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName"   name="last_name" value="{{ $member->last_name }}" />
                    </div>
                    
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Birthday</label>
                        <input type="date" class="form-control" id="birthday"   name="birthday" value="{{ $member->birthday }}" />
                    </div>
                       
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email"   name="email" value="{{ $member->email }}" />
                    </div>
                    <div class="mb-3">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number"  name="contact_number" value="{{ $member->contact_number }}" />
                    </div>       
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Residential Address</label>
                        <textarea name="address" class="form-control">{{ $member->address }}</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                        <div class="col-4">Gender</div>
                        <div class="col-2">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="genderM"   name="gender" value="M" 
                        {{ $member->gender == 'M' ? 'checked' : ''}}/>
                        <label for="genderM" class="form-check-label">Male</label>
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-check">
                            <input type="radio" class="form-check-input" id="genderF"   name="gender" value="F" 
                            {{ $member->gender  == 'F'? 'checked' : ''}}/>
                            <label for="genderF" class="form-check-label">Female</label>
                          </div>
                        </div>
                    </div>  
                        
            </div>

            <hr class=""/>
                
            
            <div class="card-header">
                <h5>Skills And Capabilities</h5>
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
                                />
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
                    <input type="text" class="form-control" id="otherSkills" value="{{ $other_skillsets ?? old('other_skillsets') }}" name="other_skillsets">
                        </div>
                    </div>
            </div></div></div>

          </div>
        </div>
        <div class="col-sm-6">

            <div class="card">
                <div class="card-header">
                    <h5>Registered Voter's Address</h5>
                </div>
                <div class="card-body">

                    <div class="mb-3 row">

                        <div class="col-4">Is Registered Voter?</div>
                        <div class="col-2">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="isRegisteredVoterYes"   name="is_registered_voter" value="1" 
                        {{ $member->is_registered_voter ? 'checked' : ''}}/>
                        <label for="isRegisteredVoterYes" class="form-check-label">Yes</label>
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-check">
                            <input type="radio" class="form-check-input" id="isRegisteredVoterNo"   name="is_registered_voter" value="0" 
                            {{ $member->is_registered_voter ? '' : 'checked'}}/>
                            <label for="isRegisteredVoterNo" class="form-check-label">No</label>
                          </div>
                        </div>
                    </div> 
                    <hr>
                    <div class="mb-3">
                        <label for="region_code" class="form-label">Region</label>
                        <select class="form-control" id="region_code" name="region_code">   

                            @forelse ($regions as $region)
                                @if ($member->region_code == $region->code)
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
                        <input type="hidden" id="province" value="{{$member->province_code}}" />
                        <label for="province_code" class="form-label">Province</label>
                        <select class="form-control" id="province_code" name="province_code">

                        </select>
                        </div>
                    <div class="mb-3">
                    <input type="hidden" id="city" value="{{$member->city_code}}" />
                        <label for="city_code" class="form-label">City/Municipality</label>
                        <select class="form-control" id="city_code" name="city_code">   

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="voterid" class="form-label">Voter's ID</label>
                        <input type="text" class="form-control" id="voterid" name="voterid" value="{{ $member->voterid}}">
                    </div>

                    <div class="mb-3">
                        <label for="street" class="form-label">Barangay Polling Center</label>
                        <input type="text" class="form-control" id="barangay" name="barangay"  value="{{ $member->barangay }}">
                    </div>
                    
                </div>
                
                <hr/>
                <div class="card-header">
                    <h5>Are you a business owner?</h5>
                    <div>
                        <input type="radio" name="bizowner" id="bizowner_yes" class="m-2" value="yes"
                        {{ $member->business_type == '' ? '' : 'checked' }}>
                        <label for="bizowner_yes">Yes</label>
                        <input type="radio" name="bizowner" id="bizowner_no" class="m-2" value="no"
                        {{ $member->business_type == '' ? 'checked' : ''}}>
                        <label for="bizowner_no">No</label>
                    </div>
                </div>
                <div class="card-body" id="biznes_card">
                    <div class="mb-3">
                        <label for="business_type" class="form-label">Type of business</label>
                        <input type="text" class="form-control" placeholder="please specify type of business" name="business_type" 
                        id="business_type" value="{{ $member->business_type }}"/>
                    </div>
                    <div class="mb-3">
                        <label for="capitalization" class="form-label">Estimated capitalization</label>
                        <input type="text" class="form-control" placeholder="please specify estimated capitalization" name="capitalization" 
                        id="capitalization" value="{{ $member->capitalization }}"/>
                    </div>
                    <div class="mb-3">
                        <label for="business_location" class="form-label">Location of business</label>
                        <input type="text" class="form-control" placeholder="please specify business location" name="business_location" 
                        value="{{ $member->business_location }}" id="business_location"/>
                    </div>
                    
                </div>
                
                <div class="card-body" >
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

<script>
    let self = this;
    this.toggleOther = function(){
        let value = document.getElementById("position").value
        if(value === 'Other'){
            document.getElementById('position_other').classList.remove('d-none')
        }else{
            document.getElementById('position_other').value=value
            document.getElementById('position_other').classList.add('d-none')
        }
    }

    this.toggleBusiness = function(){
        let value = document.querySelector("input[name=bizowner]:checked")?.value
        console.log(value)
        if(value == 'yes'){
            document.getElementById('biznes_card').classList.remove('d-none')
        }else{
            document.getElementById('biznes_card').classList.add('d-none')
        }
    }
    
    this.toggleOther()
    document.getElementById("position").onchange = function(){self.toggleOther()}
    this.toggleBusiness()
    document.getElementById("bizowner_yes").onchange = function(){self.toggleBusiness()}
    document.getElementById("bizowner_no").onchange = function(){self.toggleBusiness()}

</script>

<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ asset('js/locations.js') }}"></script>

@endsection