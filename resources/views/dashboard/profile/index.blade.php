
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
          <div class="card-header">
              <h5 class="d-inline-block">Personal Information <a href="{{route('faq', 'profile')}}" target="_blank"><span class="badge rounded-pill bg-light text-dark">?</span></a></h5>
               <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm float-right">Edit Profile</a>
          </div>
          <div class="card-body">
            <table class="table table-borderless table-sm table-hover">
                <tbody>
                    <tr>
                        <td class="text-muted">First Name</td>
                        <td class="">
                        {{ $user->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Middle Name</td>
                        <td class="">
                        {{ $user->middle_name ?? old('middle_name')}}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Last Name</td>
                        <td class="">
                        {{ $user->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Birthday</td>
                        <td class="">
                        {{ $user->birthday }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Gender</td>
                        <td class="">
                        {{ $user->gender=='M'?'Male': ($user->gender=='F'?'Female':'')}}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Email</td>
                        <td class="">
                        {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Contact Number</td>
                        <td class="">
                        {{ $user->contact_number }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Residential Address</td>
                        <td class="">
                        {{ $user->address }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Registered Voter</td>
                        <td class="">
                        {{ $user->is_registered_voter ?  'Yes' : 'No' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Region</td>
                        <td class="">
                        {{ $user->region->name ??'' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Province</td>
                        <td class="">
                        {{ $user->province->name ??'' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">City / Municipality</td>
                        <td class="">
                        {{ $user->city->name ??'' }}
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="text-muted">Voter's ID</td>
                        <td class="">
                        {{ $user->voterid  }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Barangay Polling Center</td>
                        <td class="">
                        {{ $user->barangay  }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Skills And Capabilities</td>
                        <td class="">
                        {{ str_replace(',', ', ', $user->skillsets)  }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Business</td>
                        <td class="">
                        {{ $user->business_type  }} {{ $user->business_location  }}
                        (PHP {{ $user->capitalisation  }})
                        </td>
                    </tr>
                </tbody>
            </table>
                
            </div>
          </div>
      </div>
      <div class="col-sm-6">
            <div class="card ">
                <div class="card-header">
                    <h5 class="d-inline-block">Church or Other Affiliations <a href="{{route('faq', 'affiliations')}}" target="_blank"><span class="badge rounded-pill bg-light text-dark">?</span></a></h5>
                    <a href="{{route('affiliations.index')}}" class="btn btn-primary btn-sm float-right">Manage Affiliations</a>
                </div>
            <div class="card-body">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position in Organisation</th>
                            <th>No. of Members</th>
                            <th>QR Code</th>
                            <th>URL</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($user->affiliations as $affiliation)
                        <tr>
                            <td>{{ $affiliation->name }} </td>
                            <td>{{ $affiliation->pivot->position }}</td>
                            <td>{{ $affiliation->users->count() }}</td>
                            <td>
                                <a href="{{route('member.qrcode', ['p' => Crypt::encrypt(['c'=>auth()->user()->id, 'a'=>$affiliation->id])])}}" target="_blank">
                                {!! 
                            
                            QrCode::size(100)->generate(route('member.selfregister', ['p' => Crypt::encrypt(['c'=>auth()->user()->id, 'a'=>$affiliation->id])]
                        
                        )); !!} </a>
                        </td>
                        <td>
                            <a href="{{route('member.selfregister', ['p' => Crypt::encrypt(['c'=>auth()->user()->id, 'a'=>$affiliation->id])])}}" target="_blank" rel="noopener noreferrer">Link</a>
                        </td>
                            <td><a href="{{ route('members.index', ['affiliation_id'=> $affiliation->id]) }}" class="btn btn-light btn-sm">View Members</a></td>
                        </tr>
                    @empty
                    <tr><td colspan="3">
                        <div class="alert alert-warning">Please click here to add your Church or other affiliation 
                            <a href="{{route('affiliations.create')}}" class="btn btn-success btn-sm">Add Church / Affiliation</a>
                        </div>
                        </td></tr>
                    @endforelse
                    
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card col-12">
            <div class="card-header"><h5 class="d-inline-block">Target Outcomes 
                <a href="{{route('faq', 'targets')}}" target="_blank"><span class="badge rounded-pill bg-light text-dark">?</span></a></h5>
                <a href="{{route('targets.index')}}" class="btn btn-primary btn-sm float-right">Manage Target Outcomes</a></div>
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
                                    <div class="alert alert-warning">No targets have been saved yet. Please click here to start adding your target outcome
                                        <a href="{{route('targets.create')}}" class="btn btn-sm btn-success">Add Target Outcome</a></div>
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

@endsection