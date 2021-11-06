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
          <div class="card-header"><h4>User Details</h4></div>
            <div class="card-body">
                <table class="table table-borderless table-hover">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }} ({{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }})</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>{{ $user->contact_number }}</td>
                        </tr>
                        <tr>
                            <th>Birthday</th>
                            <td>{{ $user->birthday }}</td>
                        </tr>
                        <tr>
                            <th>Is Registered Voter?</th>
                            <td>{{ $user->is_registered_voter ? 'Yes' : 'No'}}</td>
                        </tr>
                        <tr>
                            <th>Skills And Capabilities</th>
                            <td>{{ $user->skillsets }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>
                                {{ $user->street }}
                                {{ $user->barangay }}
                                {{ $user->city?->name }}
                                {{ $user->province?->name }}
                                {{ $user->region?->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>Business</th>
                            <td>
                                {{ $user->business_type }}
                                {{ $user->business_location }}
                                {{ $user->capitalization ? '(PHP '. $user->capitalization . ')': '' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>      

    <div class="col-sm-6">
        <div class="card">
          <div class="card-header"><h4>Organisations</h4></div>
            <div class="card-body">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position in Organisation</th>
                            <th>No. of Members</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($user->affiliations as $affiliation)
                        <tr>
                            <td>{{ $affiliation->name }} </td>
                            <td>{{ $affiliation->pivot->position }}</td>
                            <td>{{ $affiliation->users->count() }}</td>
                        </tr>
                    @empty
                    @endforelse
                    
                    </tbody>
                </table>
                <a href="{{route('coordinators.index')}}" class="btn btn-primary">Return</a> 
            </div>
           
        </div>
        
    </div>     

    </div>
  </div>
</div>

@endsection

@section('javascript')

<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ asset('js/locations.js') }}"></script>

@endsection