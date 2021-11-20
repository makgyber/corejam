<div class="card-body">
    <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input type="text" class="form-control" id="firstName"  name="first_name" value="{{ $member->first_name }}" />
    </div>
    <div class="mb-3">
        <label for="firstName" class="form-label">Middle Name</label>
        <input type="text" class="form-control" id="middleName"  name="middle_name" value="{{ $member->middle_name }}" />
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastName"   name="last_name" value="{{ $member->last_name }}" />
    </div>
    <div class="mb-3">
        <label for="birthday" class="form-label">Birthday</label>
        <input type="date" class="form-control" id="birthday"   name="birthday" value="{{ $member->birthday }}" />
    </div>
       
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email"   name="email" value="{{ $member->email }}" />
    </div>
    <div class="mb-3">
        <label for="contact_number" class="form-label">Contact Number</label>
        <input type="text" class="form-control" id="contact_number"  name="contact_number" value="{{ $member->contact_number }}" />
    </div>       
    <div class="mb-3">
        <label for="address" class="form-label">Residential Address</label>
        <textarea name="address" class="form-control">{{ $member->address }}</textarea>
    </div>
    <div class="mb-3">
        <div class="row">
        <div class="col-4">Gender</div>
        <div class="col-2">
        <div class="form-check">
            <input type="radio" class="form-check-input" id="genderM"   name="gender" value="M" 
        {{ $member->gender == 'M' ? 'checked' : ''}}/>
        <label for="genderM" class="form-check-label">Male</label>
          </div>
        </div>
        <div class="col-2">
          <div class="form-check">
            <input type="radio" class="form-check-input" id="genderF"   name="gender" value="F" 
            {{ $member->gender  == 'F'? 'checked' : ''}}/>
            <label for="genderF" class="form-check-label">Female</label>
          </div>
        </div>
    </div>  
        
</div>