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
          <div class="card-header"><h4>Edit Member</h4></div>
          <div class="card-header"><h5>{{$affiliation->name}}</h5></div>
            <div class="card-body">
                <form action="{{ url('/members/'. $member->id ) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="affiliation_id" value="{{$affiliation->id}}"/>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName"  name="first_name" value="{{ $member->first_name }}" />
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName"   name="last_name" value="{{ $member->last_name}}" />
                    </div>
                    <div class="mb-3">
                        <label for="contact1" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email"   name="email" value="{{ $member->email }}" />
                    </div>
                    <div class="mb-3">
                        <label for="contact2" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number"  name="contact_number" value="{{ $member->contact_number }}" />
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
                        <label for="street" class="form-label">Barangay</label>
                        <input type="text" class="form-control" id="barangay" name="barangay"  value="{{ $member->barangay }}">
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Street Address</label>
                        <input type="text" class="form-control" id="street" name="street" value="{{ $member->street}}">
                    </div>
                </div>
                
                <hr/>
                <div class="card-header">
                    <h4>Position in Organisation</h4>
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
                        <input type="text" class="form-control  d-none" placeholder="please specify position" name="position_other" id="position_other" value="{{$affiliation->pivot->position}}"/>
                    </div>
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
    
    this.toggleOther()
    document.getElementById("position").onchange = function(){self.toggleOther()}
</script>

<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ asset('js/locations.js') }}"></script>

@endsection