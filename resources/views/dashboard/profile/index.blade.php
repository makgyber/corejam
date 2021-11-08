
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
    
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header"><h4>Personal Information</h4></div>

            
            <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <tbody>
                    <tr>
                        <th class="text-muted">First Name</th>
                        <td class="h4">
                        {{ $user->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Middle Name</th>
                        <td class="h4">
                        {{ $user->middle_name ?? old('middle_name')}}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Last Name</th>
                        <td class="h4">
                        {{ $user->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Birthday</th>
                        <td class="h4">
                        {{ $user->birthday }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Gender</th>
                        <td class="h4">
                        {{ $user->gender=='M'?'Male': ($user->gender=='F'?'Female':'')}}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Email</th>
                        <td class="h4">
                        {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Contact Number</th>
                        <td class="h4">
                        {{ $user->contact_number }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Residential Address</th>
                        <td class="h4">
                        {{ $user->address }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Registered Voter</th>
                        <td class="h4">
                        {{ $user->is_registered_voter ?  'Yes' : 'No' }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Region</th>
                        <td class="h4">
                        {{ $user->region->name ??'' }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Province</th>
                        <td class="h4">
                        {{ $user->province->name ??'' }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">City / Municipality</th>
                        <td class="h4">
                        {{ $user->city->name ??'' }}
                        </td>
                    </tr>
                    
                    <tr>
                        <th class="text-muted">Voter's ID</th>
                        <td class="h4">
                        {{ $user->voterid  }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Barangay Polling Center</th>
                        <td class="h4">
                        {{ $user->barangay  }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Skills And Capabilities</th>
                        <td class="h4">
                        {{ $user->skillsets  }}
                        </td>
                    </tr>
                </tbody>
            </table>
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
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
                        <button type="submit" class="btn btn-primary">Submit</button>
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