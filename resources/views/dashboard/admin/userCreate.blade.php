@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Coordinator Invitation</h4></div>
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
                <form method="POST" action="{{ route('coordinators.store') }}">
                    @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card-body p-4">
                    
                    
                            <h1>{{ __('Invite New Coordinator') }}</h1>
                            <p class="text-muted">Create a new coordinator account</p>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('First Name') }}" id="first_name" name="first_name" value="{{ old('first_name') }}" required autofocus>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('Last Name') }}" id="last_name" name="last_name" value="{{ old('last_name') }}" required autofocus>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="form-check checkbox">
                                    <input class="form-check-input" type="checkbox" value="true" name="as_admin" id="as_admin"/>
                                    <label class="form-check-label" for="as_admin">Has Admin Rights</label>
                                </div>
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
                                        @if (old('coordinator_level') == $coordinatorLevel)
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
                            <div class="mb-3 d-none" id="provinceCard">
                                <input type="hidden" id="province" value="{{old('province_code')}}" />
                                <label for="province_code" class="form-label">Province</label>
                                <select class="form-control" id="province_code" name="province_code">
                    
                                </select>
                                </div>
                            <div class="mb-3 d-none" id="cityCard">
                            <input type="hidden" id="city" value="{{old('city_code')}}" />
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