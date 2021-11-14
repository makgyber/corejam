@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <h5>
                      {{ __('M610 Strategic Action Planning Worksheet') }}
                      <a href="{{route('faq', 'sapw')}}" target="_blank"><span class="badge rounded-pill bg-light text-dark">?</span></a>
                    </h5>
                    
                    </div>

                      <div class="card-header">
                          <div> 
                            <h3>Select Region</h3>
                            <form method="GET" >
                            <div class="col-sm-6">
                            <select class="form-control" id="region_code" name="region_code">   

                              @forelse ($regions ?? [] as $region)
                                  @if ($regionCode == $region->code)
                                      <option value="{{$region->code}}" selected>{{$region->name}}</option> 
                                  @else
                                      <option value="{{$region->code}}">{{$region->name}}</option>    
                                  @endif

                              @empty
                              <option value="">No regions found</option>
                              @endforelse

                              </select>
                              <br>
                              <button class="btn btn-primary col-auto">{{ __('Select Region') }}</button>
                            </div>
                            
                              
                            </form>
                          </div> 

                    <div class="card-body">

                        
                        
                        
@forelse($targets as $target)
<br>
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
            </div>
          </div>
        </div>
{{ $targets->links()}}
@endsection


@section('javascript')

@endsection

