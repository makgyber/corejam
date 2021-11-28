@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5>{{ __('Add Affiliation') }}
            <a href="{{route('faq', 'affiliations')}}" target="_blank"><span class="badge rounded-pill bg-light text-dark">?</span></a>
          </h5></div>
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
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
                <form action="{{ route('affiliations.store') }}" method="POST">
                    @csrf
                    <table class="table table-borderless datatable">
                        <tbody>
                            <tr>
                                <th>
                                    Organisation Type
                                </th>
                                <td>
                                    <select class="form-control" name="organisation_type" id="type">
                                        <option value="church">Church or Faith-based Organisation</option>
                                        <option value="government">Government</option>
                                        <option value="ngo">NGO</option>
                                        <option value="other">Other</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <td>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Brief Introduction or Description
                                </th>
                                <td>
                                    <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                </td>
                            </tr>
                        
                            <tr>
                                <th>
                                    Country
                                </th>
                                <td>
                                    <select class="form-control" id="country_id" name="country_id">   
                                    @php
                                        $defaultCountry = isset($user->country) ?: 'Philippines';
                                    @endphp
                                    @forelse ($countries ?? [] as $country)
                                        @if ($defaultCountry == $country->name)
                                            <option value="{{$country->id}}" selected>{{$country->name}}</option> 
                                        @else
                                            <option value="{{$country->id}}">{{$country->name}}</option>    
                                        @endif

                                    @empty
                                    <option value="">No countries found</option>
                                    @endforelse

                                    </select>
                                </td>
                            </tr>
                        </tbody>
                        <tbody id="localAddress">
                            <tr>
                                <th>
                                    Region
                                </th>
                                <td>
                                    <select class="form-control" id="region_code" name="region_code">   
                                        <option value=""></option>
                                    @forelse ($regions ?? [] as $region)
                                    <option value="{{$region->code}}">{{$region->name}}</option>    

                                    @empty
                                    <option value="">No regions found</option>
                                    @endforelse

                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Province
                                </th>
                                <td>
                                    <input type="hidden" id="province" value="{{$user->province_code ?? ''}}" />
                                    <select class="form-control" id="province_code" name="province_code">

                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    City/Municipality
                                </th>
                                <td>
                                <input type="hidden" id="city" value="{{$user->city_code ?? ''}}" />
                                    <select class="form-control" id="city_code" name="city_code">   

                                    </select>
                                </td>
                            </tr>
                        </tbody>
                        <tbody id="internationalAddress">
                            <tr>
                                <th>
                                    State
                                </th>
                                <td>
                                    <select class="form-control" id="state_id" name="state_id">
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    City/Municipality
                                </th>
                                <td>
                                    <select class="form-control" id="world_city_id" name="world_city_id">   
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <th>
                                    Address
                                </th>
                                <td>
                                    <textarea class="form-control"  name="address" >{{ old('address') }}</textarea>
                                </td>
                            </tr>
                            
                            <tr>
                                <th>
                                    Position in organisation
                                </th>
                                <td>
                                    <select class="form-control" name="position" id="position">
                                        <option value="Bishop">Bishop</option>
                                        <option value="Pastor">Pastor</option>
                                        <option value="Elder">Elder</option>
                                        <option value="Board Member/Director">Board Member/Director</option>
                                        <option value="Member">Member</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <input type="text" class="form-control  d-none" placeholder="please specify position" name="position_other" id="position_other"/>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    
                                </th>
                                <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" id="is_primary" name="is_primary">
                                    <label class="form-check-label" for="is_primary">
                                    This is my primary organisation
                                    </label>
                                </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a class="btn btn-primary" href="{{ route('affiliations.index') }}">Return</a>
                </form>
            </div>
          </div>
        </div>
      </div>
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
        document.getElementById('position_other').classList.add('d-none')
    }
}

this.toggleOther()
document.getElementById("position").onchange = function(){self.toggleOther()}
</script>

<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ asset('js/locations.js') }}"></script>
@endsection