
<hr>
<div class="mb-3">
    <label for="country_id" class="form-label">Country</label>
    <input type="hidden" name="country" id="country" value="{{$user->country_id}}">
    <select class="form-control" id="country_id" name="country_id">   
        <option value=""></option>
        @php
            $default = $user->country_id?:174;
        @endphp
        @forelse ($countries as $country)
            @if ($default == $country->id)
                <option value="{{$country->id}}" selected>{{$country->name}}</option> 
            @else
                <option value="{{$country->id}}">{{$country->name}}</option>    
            @endif
        
        @empty
        <option value="">No countries found</option>
        @endforelse

    </select>
</div>
<hr>
<div id="localAddress">
    <div class="mb-3">
        <label for="region_code" class="form-label">Region</label>
        <select class="form-control" id="region_code" name="region_code">   
            <option value="">select region</option>
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
    <div class="mb-3" id="provinceCard">
        <input type="hidden" id="province" value="{{$user->province_code}}" />
        <label for="province_code" class="form-label">Province</label>
        <select class="form-control" id="province_code" name="province_code">

        </select>
        </div>
    <div class="mb-3" id="cityCard">
    <input type="hidden" id="city" value="{{$user->city_code}}" />
        <label for="city_code" class="form-label">City/Municipality</label>
        <select class="form-control" id="city_code" name="city_code">   

        </select>
    </div>
    <div class="mb-3" id="barangayCard">
        <input type="hidden" id="barangay" value="{{$user->barangay}}" />
            <label for="barangay_code" class="form-label">Barangay Polling Center</label>
            <select class="form-control" id="barangay_code" name="barangay">   
    
            </select>
    </div>
</div>
<div id="internationalAddress">
    <div class="mb-3">
        <input type="hidden" id="state" value="{{$user->state_id}}" />
        <label for="state_id" class="form-label">State</label>
        <select class="form-control" id="state_id" name="state_id">

        </select>
        </div>
    <div class="mb-3">
    <input type="hidden" id="world_city" value="{{$user->world_city_id}}" />
        <label for="world_city_id" class="form-label">City / Municipality</label>
        <select class="form-control" id="world_city_id" name="world_city_id">   

        </select>
    </div>
</div>
