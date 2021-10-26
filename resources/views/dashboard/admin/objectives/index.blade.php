@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('M610 Strategic Action Planning Worksheet') }}</div>

                      <div class="card-header">
                          <div> 
                              <h1>M6:10 Strategic Action Planning Worksheet</h1>  
                          </div> 

                    <div class="card-body">

                        
                        
                        
@forelse($targets as $target)
<br>
                        <table class="table table-responsive-sm table-bordered table-condensed table-sm">

<thead class="thead-dark">
    <tr>
      <th rowspan="2">#</th> 
      <th rowspan="2">TARGET OUTCOME (Very Important Priority - VIP)</th>
      <th rowspan="2">VIP - CRITICAL ACTIVITIES</th>
      <th rowspan="2">IN-CHARGE</th>
      <th rowspan="2">TIMELINE Schedules Start-Finish</th>
      <th rowspan="2">LOCATION Address</th>
      <th rowspan="2">SUCCESS INDICATORS Metrics</th>
      <th colspan="6" style="text-align:center">Support Request</th>
      
      <th rowspan="2"></th>
    </tr>
    <tr>
      <th>WHAT IS IT</th>
      <th>WHEN</th> 
      <th>FROM WHOM</th>
      <th>HOW MUCH</th>
      <th >REMARKS</th>
      <th >PLAN B (For what if)</th>
    </tr>
  </thead>
                          @forelse($target->activities ?? '' as $activity)
                          <tbody>
                            <tr>
                              <td>{{$loop->index+1}}</td>
                              <td><strong>@php if($loop->index==1) $target->objective @endphp</strong></td>
                              <td><strong>{{ $activity->title }}</strong></td>
                              <td>{{ $target->user->name }}</td>
                              <td>{{ date('Y-m-d', strtotime($activity->target_start)) }} to {{ date('Y-m-d', strtotime($activity->target_end)) }}</td>
                              <td>{{ $activity->location }}</td>
                              <td>{{ $activity->success_indicator }}</td>
                              <td>{{ $activity->support_request }}</td>
                              <td>{{ $activity->support_when_needed }}</td>
                              <td>{{ $activity->support_from_whom }}</td>
                              <td>{{ $activity->support_how_much }}</td>
                              <td>{{ $activity->remarks }}</td>
                              <td>{{ $activity->plan_b }}</td>
                              <td>
                                <a href="{{ route('activities.edit', [$target->id,$activity->id]) }}" class="btn btn-block btn-primary btn-sm">Edit</a>
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
            </div>
          </div>
        </div>
{{ $targets->links()}}
@endsection


@section('javascript')

@endsection

