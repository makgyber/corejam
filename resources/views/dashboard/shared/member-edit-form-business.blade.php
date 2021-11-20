<div class="card-header">
    <h4>Are you a business owner?</h4>
    <div>
        <input type="radio" name="bizowner" id="bizowner_yes" class="m-2" value="yes"
        {{ $member->business_type == '' ? '' : 'checked' }}>
        <label for="bizowner_yes">Yes</label>
        <input type="radio" name="bizowner" id="bizowner_no" class="m-2" value="no"
        {{ $member->business_type == '' ? 'checked' : ''}}>
        <label for="bizowner_no">No</label>
    </div>
</div>
<div class="card-body" id="biznes_card">
    <div class="mb-3">
        <label for="business_type" class="form-label">Type of business</label>
        <input type="text" class="form-control" placeholder="please specify type of business" name="business_type" 
        id="business_type" value="{{ $member->business_type }}"/>
    </div>
    <div class="mb-3">
        <label for="capitalization" class="form-label">Estimated capitalization</label>
        <input type="text" class="form-control" placeholder="please specify estimated capitalization" name="capitalization" 
        id="capitalization" value="{{ $member->capitalization }}"/>
    </div>
    <div class="mb-3">
        <label for="business_location" class="form-label">Location of business</label>
        <input type="text" class="form-control" placeholder="please specify business location" name="business_location" 
        value="{{ $member->business_location }}" id="business_location"/>
    </div>
    
</div>