
@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
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
    <div class="row">
    
      <div class="col-sm-8">
        <div class="card">
          <div class="card-header">
              <h4 class="d-inline-block">Personal Information</h4>
             <a href="{{ route('profile.edit') }}" class="btn btn-primary float-right">Edit Profile</a>
        </div>
            <div class="card-body">
            <table class="table table-borderless table-sm table-hover">
                <tbody>
                    <tr>
                        <td class="text-muted w-25">First Name</td>
                        <td class="h5">
                        {{ $user->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Middle Name</td>
                        <td class="h5">
                        {{ $user->middle_name ?? old('middle_name')}}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Last Name</td>
                        <td class="h5">
                        {{ $user->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Birthday</td>
                        <td class="h5">
                        {{ $user->birthday }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Gender</td>
                        <td class="h5">
                        {{ $user->gender=='M'?'Male': ($user->gender=='F'?'Female':'')}}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Email</td>
                        <td class="h5">
                        {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Contact Number</td>
                        <td class="h5">
                        {{ $user->contact_number }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Residential Address</td>
                        <td class="h5">
                        {{ $user->address }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Registered Voter</td>
                        <td class="h5">
                        {{ $user->is_registered_voter ?  'Yes' : 'No' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Region</td>
                        <td class="h5">
                        {{ $user->region->name ??'' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Province</td>
                        <td class="h5">
                        {{ $user->province->name ??'' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">City / Municipality</td>
                        <td class="h5">
                        {{ $user->city->name ??'' }}
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="text-muted">Voter's ID</td>
                        <td class="h5">
                        {{ $user->voterid  }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Barangay Polling Center</td>
                        <td class="h5">
                        {{ $user->barangay  }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Skills And Capabilities</td>
                        <td class="h5">
                        {{ str_replace(',', ' ', $user->skillsets)  }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Business</td>
                        <td class="h5">
                        {{ $user->business_type  }} {{ $user->business_location  }}
                        (PHP {{ $user->capitalisation  }})
                        </td>
                    </tr>
                </tbody>
            </table>
                
            </div>
          </div>
        </div>
        <div class="col-sm-4">
            <div class="card ">
                <div class="card-header"><h4>Change Password</h4></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.change-password') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')

@endsection