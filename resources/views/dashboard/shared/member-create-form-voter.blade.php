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
        @include('dashboard.shared.member-create-form-locations')

        <div class="mb-3">
            <label for="voterid" class="form-label">Voter's ID</label>
            <input type="text" class="form-control" id="voterid" name="voterid" value="{{ old('voterid')}}">
        </div>
    </div>