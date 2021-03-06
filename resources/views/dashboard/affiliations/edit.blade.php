@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5>{{ __('Edit Affiliation') }}
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
                <form action="{{ route('affiliations.update' , $affiliation->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <table class="table table-striped table-bordered datatable">
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
                                    <input type="text" class="form-control" name="name" value="{{ $affiliation->name }}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Brief Introduction or Description
                                </th>
                                <td>
                                    <textarea class="form-control" name="description">{{ $affiliation->description }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Country
                                </th>
                                <td>
                                    <select class="form-control" id="country_id" name="country_id">   
                                    @forelse ($countries ?? [] as $country)
                                        @if ($affiliation->country_id == $country->id)
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

                                    @forelse ($regions ?? [] as $region)
                                        @if ($affiliation->region_code == $region->code)
                                            <option value="{{$region->code}}" selected>{{$region->name}}</option> 
                                        @else
                                            <option value="{{$region->code}}">{{$region->name}}</option>    
                                        @endif

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
                                    <input type="hidden" id="province" value="{{$affiliation->province_code ?? ''}}" />
                                    <select class="form-control" id="province_code" name="province_code">

                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    City/Municipality
                                </th>
                                <td>
                                <input type="hidden" id="city" value="{{$affiliation->city_code ?? ''}}" />
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
                                    <input type="hidden" id="state" value="{{$affiliation->state_id ?? ''}}" />
                                    <select class="form-control" id="state_id" name="state_id">
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    City/Municipality
                                </th>
                                <td>
                                    <input type="hidden" id="world_city" value="{{$affiliation->world_city_id ?? ''}}" />
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
                                    <textarea class="form-control"  name="address" >{{ $affiliation->address }}</textarea>
                                </td>
                            </tr>
                            
                            <tr>
                                <th>
                                    Position in organisation
                                </th>
                                <td>
                                    <select class="form-control" name="position" id="position">
                                        @forelse($positionOptions as $positionOption)
                                        <option value="{{$positionOption}}"
                                        {{ $positionOption == $position_other ? 'selected' : ($showOther==1 && $positionOption == 'Other' ? 'selected' : '')}}
                                        >{{$positionOption}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <input type="text" class="form-control  {{ $showOther==1 ? ''  : 'd-none'}}" placeholder="please specify position" name="position_other" id="position_other" value="{{$position_other}}"/>            
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    
                                </th>
                                <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" id="is_primary" 
                                    {{ $pivot->is_primary?'checked':''}}
                                    name="is_primary">
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