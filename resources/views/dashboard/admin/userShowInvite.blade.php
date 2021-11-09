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
                <form method="POST" action="{{ route('coordinators.send-invite') }}" class="form">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="row">
                    <div class="col-12">
                        <div class="card- p-4">
                        
                        
                            <h1>{{ __('Invite New Coordinator') }}</h1>
                            <p class="text-info">
                                To: <strong>{{ $user->first_name }} {{ $user->middle_name }}  {{ $user->last_name }}</strong>
                                <br>Email: <strong>{{$user->email}}</strong>
                            </p>
                            <div class="input-group mb-3">
                                <div class="form-check checkbox">
                                    <input class="form-check-input" type="checkbox" value="true" name="as_admin" id="as_admin"/>
                                    <label class="form-check-label text-warning" for="as_admin">Give Admin Rights</label>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Registered Voter's Address</h4>
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
                            </div><div class="card">
                                <div class="card-header">
                                    <h4>Registered Voter's Address</h4>
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
z                    </div>

                    
                    <button class="btn btn-success" type="submit">{{ __('Submit') }}</button>
                    <a href="{{ route('coordinators.index') }}" class="btn btn-primary m-2">{{ __('Return') }}</a>
                

                   
                </div>

    </form>
            </div>
                    
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