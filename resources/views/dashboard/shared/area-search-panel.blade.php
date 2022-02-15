<details class="m-4 p-4 col-11 card " open='true'>
    <summary>Additional search parameters</summary>
<div class="card-group col-12 mt-2">
    <div class="card">
      <div class="card-body">
        <span>Region</span>
        <select class="form-control" id="region_code" name="region_code" aria-placeholder="Select region">   
          <option value=""></option>
          @forelse ($regions as $region)
              @if (isset($params['region_code']) && $params['region_code'] == $region->code)
                  <option value="{{$region->code}}" selected>{{$region->name}}</option> 
              @else
                  <option value="{{$region->code}}">{{$region->name}}</option>    
              @endif
          @empty
          <option value="">No regions found</option>
          @endforelse

      </select>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <span>Province</span>
        <input type="hidden" id="province" value="{{$params['province_code'] ?? ''}}" />
        <select class="form-control" id="province_code" name="province_code">

        </select>
    </div>
    </div>
    <div class="card">
      <div class="card-body">
        <span class="text-sm">City/Municipality</span>
        <input type="hidden" id="city" value="{{$params['city_code'] ?? ''}}" />
        <select class="form-control" id="city_code" name="city_code">   

        </select>
    </div>
    </div>
    <div class="card">
      <div class="card-body">
        <input type="hidden" id="barangay" value="{{$params['barangay'] ?? ''}}" />
        <span>Barangay</span>
        <select class="form-control" id="barangay_code" name="barangay">   

        </select>
      </div>
    </div>
    <div class="card">
      <div class="card-body btn-group-vertical">
        <button class="btn btn-dark" type="submit">Search by selected filters</button>
      </div>
    </div>
  </div>
</details>
