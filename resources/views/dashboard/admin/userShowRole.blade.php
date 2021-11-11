@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Role and Coordinator Level Assignment</h4></div>
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
                <form method="POST" action="{{ route('coordinators.assign-role', $user->id) }}">
                    @method('put')
                    @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card-body p-4">
                    
                    
                            <h3>{{ __('Assign Roles') }}</h3>
                            <p class="text-muted">You can select multiple roles. This will determine which modules or features are accessible to the user.</p>
                            <div class="input-group mb-3 text-info">
                                Assign To:          <strong>{{ $user->name }}</strong>
                            </div>
                            <h4>Select Roles</h4>
                            <div class="input-group mb-3">
                                
                                @forelse($roles as $role)
                                <div class="form-check m-2 d-block width-30">
                                    <input class="form-check-input" type="checkbox" value="{{ $role->name }}" name="roles[]" id="role_{{ $role->name }}"
                                    @if(in_array($role->name, explode(',', $user->menuroles))) checked @endif />
                                    <label class="form-check-label" for="role_{{ $role->name }}">{{ $role->name }}</label>
                                </div>
                                @empty
                                <span>No roles defined</span>
                                @endforelse
                            </div>
                            <button class="btn btn-success" type="submit">{{ __('Submit') }}</button>
                    <a href="{{ route('coordinators.index') }}" class="btn btn-primary m-2">{{ __('Return') }}</a>
                        </div>
                    </div>
                    <div class="card col-6">
                        <div class="card-header">
                            <h5>Level and Area of Responsibility</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="coordinator_level" class="form-label">Coordinator Level</label>
                                <select class="form-control" id="coordinator_level" name="coordinator_level">   
                                    <option value="">Select coordinator level</option>
                                    @forelse ($coordinatorLevels as $coordinatorLevel)
                                        @if ($user->coordinator_level == $coordinatorLevel)
                                            <option value="{{$coordinatorLevel}}" selected>{{$coordinatorLevel}}</option> 
                                        @else
                                            <option value="{{$coordinatorLevel}}">{{$coordinatorLevel}}</option>    
                                        @endif
                                    
                                    @empty
                                    
                                    @endforelse
                    
                                </select>
                            </div>
                            <div class="mb-3" >
                                <label for="region_code" class="form-label">Region</label>
                                <select class="form-control" id="region_code" name="region_code">   
                    
                                    @forelse ($regions as $region)
                                        @if (substr($user->coordinator_scope, 0, 2) == $region->code)
                                            <option value="{{$region->code}}" selected>{{$region->name}}</option> 
                                        @else
                                            <option value="{{$region->code}}">{{$region->name}}</option>    
                                        @endif
                                    
                                    @empty
                                    <option value="">No regions found</option>
                                    @endforelse
                    
                                </select>
                            </div>
                            <div class="mb-3 d-none" id="provinceCard">
                                <input type="hidden" id="province" value="{{substr($user->coordinator_scope, 0, 4)}}" />
                                <label for="province_code" class="form-label">Province</label>
                                <select class="form-control" id="province_code" name="province_code">
                    
                                </select>
                                </div>
                            <div class="mb-3 d-none" id="cityCard">
                            <input type="hidden" id="city" value="{{$user->coordinator_scope}}" />
                                <label for="city_code" class="form-label">City/Municipality</label>
                                <select class="form-control" id="city_code" name="city_code">   
                    
                                </select>
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

</form>
@endsection

@section('javascript')

<script>
    let self = this;
    this.toggleArea = function(){
        let value = document.getElementById("coordinator_level").value
        console.log(value)
        if(value === 'regional'){
            document.getElementById('provinceCard').classList.add('d-none')
            document.getElementById('cityCard').classList.add('d-none')
        }else if(value === 'provincial'){
            document.getElementById('provinceCard').classList.remove('d-none')
            document.getElementById('cityCard').classList.add('d-none')
        }else if(value === 'city'){
            document.getElementById('provinceCard').classList.remove('d-none')
            document.getElementById('cityCard').classList.remove('d-none')
        }else if(value === 'municipal'){
            document.getElementById('provinceCard').classList.remove('d-none')
            document.getElementById('cityCard').classList.remove('d-none')
        }
    }

    this.toggleArea()
    document.getElementById("coordinator_level").onchange = function(){self.toggleArea()}
</script>
<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ asset('js/locations.js') }}"></script>
@endsection