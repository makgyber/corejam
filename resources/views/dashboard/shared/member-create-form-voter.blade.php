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
        <hr>
        <div class="mb-3">
            <label for="region_code" class="form-label">Region</label>
            <select class="form-control" id="region_code" name="region_code">   
                <option value="">select region</option>
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
            <input type="hidden" id="barangay" value="{{old('barangay')}}" />
                <label for="barangay_code" class="form-label">Barangay Polling Center</label>
                <select class="form-control" id="barangay_code" name="barangay">   
        
                </select>
        </div>
        <div class="mb-3">
            <label for="voterid" class="form-label">Voter's ID</label>
            <input type="text" class="form-control" id="voterid" name="voterid" value="{{ old('voterid')}}">
        </div>
    </div>