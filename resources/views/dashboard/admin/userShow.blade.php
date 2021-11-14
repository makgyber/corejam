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
    <div class="row mb-3">
        <div class="col-12">
            <form action="{{route('coordinators.re-invite')}}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <button class="btn btn-warning btn-sm float-right">Re-send Coordinator Invitation</button>
            </form>
        </div>
    </div>
    <div class="row">

      <div class="col-sm-6">
        <div class="card">
          <div class="card-header"><h4>User Details</h4></div>
            <div class="card-body   col-12 d-flexz">
                <table class="table  table-hover table-borderless table-responsive table-sm  col-12 d-flex">
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
                            <th>Gender</th>
                            <td>{{ $user->gender=='M'?'Male': ($user->gender=='F'?'Female':'')}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $user->address }}</td>
                        </tr>
                        <tr>
                            <th>Is Registered Voter?</th>
                            <td>{{ $user->is_registered_voter ? 'Yes' : 'No'}}</td>
                        </tr>
                        <tr>
                            <th>Voter's ID</th>
                            <td>{{ $user->voterid }}</td>
                        </tr>
                        <tr>
                            <th>Skills And Capabilities</th>
                            <td>{{ str_replace(',', ', ', $user->skillsets) }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>
                                {{ $user->street }}
                                {{ $user->barangay }}
                                {{ $user->city->name??'' }}
                                {{ $user->province->name??'' }}
                                {{ $user->region->name??'' }}
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

    <div class="row">
<div class="card col-12">
    <div class="card-header"><h5>Target Outcomes</h5></div>
    <div class="card-body">
        @forelse($targets as $target)

<small>{{$target->objective}}</small>
<table class="table table-responsive-sm table-bordered table-condensed table-sm">
<thead class="thead-dark">
    <tr>
      <th rowspan="2">#</th> 
      <th rowspan="2" style="text-align:center" class="text-sm"><div class="text-small">TARGET OUTCOME</div>(Very Important Priority - VIP)</th>
      <th rowspan="2" style="text-align:center">VIP - CRITICAL ACTIVITIES</th>
      <th rowspan="2" style="text-align:center">IN-CHARGE</th>
      <th rowspan="2" style="text-align:center"><div class="text-small text-start">TIMELINE SCHEDULES </div><br>Start-Finish</th>
      <th rowspan="2" style="text-align:center"><div class="text-small">LOCATION </div>Address</th>
      <th rowspan="2" style="text-align:center"><div class="text-small">SUCCESS INDICATORS </div>Metrics</th>
      <th colspan="7" style="text-align:center">SUPPORT REQUEST</th>
      
      <th rowspan="2"></th>
    </tr>
    <tr>
      <th style="text-align:center">WHAT IS IT</th>
      <th style="text-align:center">WHEN</th> 
      <th style="text-align:center">FROM WHOM</th>
      <th style="text-align:center">HOW MUCH</th>
      <th style="text-align:center">DISBURSED</th>
      <th  style="text-align:center">REMARKS</th>
      <th  style="text-align:center">PLAN B <br>(For what if)</th>
    </tr>
  </thead>
                          @forelse($target->activities ?? '' as $activity)
                          <tbody>
                            <tr>
                              <td>{{$loop->index+1}}</td>
                              <td><strong class="text-primary">@php if($loop->index==0) echo $target->objective; @endphp</strong></td>
                              <td><strong>{{ $activity->title }}</strong></td>
                              <td>{{ $target->user->name }}</td>
                              <td>{{ date('Y-m-d', strtotime($activity->target_start)) }} to {{ date('Y-m-d', strtotime($activity->target_end)) }}</td>
                              <td>{{ $activity->location }}</td>
                              <td>{{ $activity->success_indicator }}</td>
                              <td>{{ $activity->support_request }}</td>
                              <td>{{ $activity->support_when_needed }}</td>
                              <td>{{ $activity->support_from_whom }}</td>
                              <td>{{ $activity->support_how_much }}</td>
                              <td>{{ $activity->disbursed }}</td>
                              <td>{{ $activity->remarks }}</td>
                              <td>{{ $activity->plan_b }}</td>
                              <td>
                                <a href="{{ route('objectives.edit', [$activity->id]) }}" class="btn btn-block btn-primary btn-sm">Edit</a>
                              </td>
                            </tr>
                        </tbody>
                            @empty
                            @endforelse
                          </table>
                            @empty
                            <div class="alert alert-info">No activities have been saved yet.</div>
                            @endforelse
                    </div>
                </div>
            </div>
{{ $targets->links()}}

    </div>
  </div>
</div>

@endsection

@section('javascript')

<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ asset('js/locations.js') }}"></script>

@endsection