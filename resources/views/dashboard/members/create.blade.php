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
          <div class="card-header"><h5>Create Member
            <a href="{{route('faq', 'members')}}" target="_blank"><span class="badge rounded-pill bg-light text-dark">?</span></a></h5></div>
          <div class="card-header"><h5>{{$affiliation->name}}</h5></div>
            <div class="card-body">
                <form action="{{ route('members.store')  }}" method="POST">
                    @csrf
                    <input type="hidden" name="affiliation_id" value="{{$affiliation->id}}"/>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName"  name="first_name" value="{{ old('first_name') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middleName"  name="middle_name" value="{{ old('middle_name') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName"   name="last_name" value="{{ old('last_name') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Birthday</label>
                        <input type="date" class="form-control" id="birthday"   name="birthday" value="{{ old('birthday') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email"   name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number"  name="contact_number" value="{{ old('contact_number') }}" />
                    </div>       
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-4">Is Registered Voter?</div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="isRegisteredVoterYes"   name="is_registered_voter" value="1" 
                                    {{ old('is_registered_voter') ? 'checked' : ''}}/>
                                    <label for="isRegisteredVoterYes" class="form-check-label">Yes</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="isRegisteredVoterNo"   name="is_registered_voter" value="0" 
                                    {{ old('is_registered_voter') ? '' : 'checked'}}/>
                                    <label for="isRegisteredVoterNo" class="form-check-label">No</label>
                                </div>
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
                                <input class="form-check-input" type="checkbox" value="{{$skillOption}}" id="skills{{ $loop->index}}" name="skillsets[]"/>
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
                    <input type="text" class="form-control" id="otherSkills" value="{{ old('other_skillsets') }}" name="other_skillsets">
                        </div>
                    </div>
                    
                </div>

            </div></div></div>
        <div class="col-sm-6">

            <div class="card">
                <div class="card-header">
                    <h5>Registered Voter's Address</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="region_code" class="form-label">Region</label>
                        <select class="form-control" id="region_code" name="region_code">   

                            @forelse ($regions as $region)
                                @if (old('region_code') == $region->code)
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
                        <input type="hidden" id="province" value="{{old('province_code')}}" />
                        <label for="province_code" class="form-label">Province</label>
                        <select class="form-control" id="province_code" name="province_code">

                        </select>
                        </div>
                    <div class="mb-3">
                    <input type="hidden" id="city" value="{{old('city_code')}}" />
                        <label for="city_code" class="form-label">City/Municipality</label>
                        <select class="form-control" id="city_code" name="city_code">   

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Barangay</label>
                        <input type="text" class="form-control" id="barangay" name="barangay"  value="{{ old('barangay') }}">
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Voter's ID</label>
                        <input type="text" class="form-control" id="street" name="street" value="{{ old('street')}}">
                    </div>
                </div>
                
                <hr/>
                <div class="card-header">
                    <h5>Position in Organisation</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="region_code" class="form-label">Position</label>
                        <select class="form-control" name="position" id="position">
                            <option value=""></option>
                            <option value="Bishop">Bishop</option>
                            <option value="Pastor">Pastor</option>
                            <option value="Elder">Elder</option>
                            <option value="Board Member/Director">Board Member/Director</option>
                            <option value="Member">Member</option>
                            <option value="Other">Other</option>
                        </select>
                        <input type="text" class="form-control  d-none" placeholder="please specify position" name="position_other" id="position_other"/>
                    </div>
                </div>

                <hr/>
                <div class="card-header">
                    <h5>Are you a business owner?</h5>
                    <div>
                        <input type="radio" name="bizowner" id="bizowner_yes" class="m-2" value="yes">Yes
                        <input type="radio" name="bizowner" id="bizowner_no" class="m-2" value="no">No
                    </div>
                </div>
                <div class="card-body" id="biznes_card">
                    <div class="mb-3">
                        <label for="business_type" class="form-label">Type of business</label>
                        <input type="text" class="form-control" placeholder="please specify type of business" name="business_type" id="business_type"/>
                    </div>
                    <div class="mb-3">
                        <label for="capitalization" class="form-label">Estimated capitalization</label>
                        <input type="text" class="form-control" placeholder="please specify estimated capitalization" name="capitalization" id="capitalization"/>
                    </div>
                    <div class="mb-3">
                        <label for="business_location" class="form-label">Location of business</label>
                        <input type="text" class="form-control" placeholder="please specify business location" name="business_location" id="business_location"/>
                    </div>
                    
                </div>
                
                <div class="card-body" >
                    <button type="submit" class="btn btn-primary">Save Details</button>
                    <a href="{{ route('members.index') }}" class="btn btn-primary">Return</a>
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
            document.getElementById('position_other').value=''
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