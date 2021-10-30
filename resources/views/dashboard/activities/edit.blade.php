@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
  @if(Session::has('message'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success" role="alert">{{ Session::get('message')}}</div>
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
          <div class="card-header"><h4>TARGET OUTCOME (Very Important Priority - VIP)</h4><h5>{{$target->objective}}</h5></div>
            <div class="card-body">
                <form action="{{ route('activities.update', [$target->id, $activity->id] )  }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="target_id" value="{{$target->id}}"/>
                    <input type="hidden" name="owner" value="{{auth()->user()->id}}"/>
                    <table class="table table-bordered datatable">
                        <tr>
                            <th colspan="2">VIP - CRITICAL ACTIVITY Details</th>
                        </tr>
                        <tr>
                            <td>VIP - CRITICAL ACTIVITY</td>
                            <th><input type="text" class="form-control" id="title"  name="title" value="{{  $activity->title}}" /></th>
                        </tr>
                        <tr>
                            <td>TIMELINE (Schedules)</td>
                            <th>
                                <div class="row">
                                    <div class="col-6">
                                        Start: 
                                        <input type="date" class="form-control" id="target_start"  name="target_start" value="{{ date('Y-m-d', strtotime($activity->target_start)) }}" />
                                    </div>
                                    <div class="col-6">
                                        Finish:
                                        <input type="date" class="form-control" id="target_end"  name="target_end" value="{{date('Y-m-d', strtotime($activity->target_end)) }}" />
                                    </div>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>LOCATION (Address)</td>
                            <th><textarea type="text" class="form-control" id="location"  name="location">{{  $activity->location}}</textarea></th>
                        </tr>
                        <tr>
                            <td>SUCCESS INDICATORS (Metrics)</td>
                            <th><textarea type="text" class="form-control" id="success_indicator"  name="success_indicator">{{  $activity->success_indicator}}</textarea></th>
                        </tr>
                        
                        
                        <tr>
                            <th colspan="2">SUPPORT REQUEST</th>
                        </tr>
                        <tr>
                            <td>WHAT IS IT</td>
                            <th><textarea type="text" class="form-control" id="support_request"  name="support_request">{{  $activity->support_request}}</textarea></th>
                        </tr>
                        <tr>
                            <td>WHEN</td>
                            <th><textarea type="text" class="form-control" id="support_when_needed"  name="support_when_needed">{{  $activity->support_when_needed}}</textarea></th>
                        </tr>
                        <tr>
                            <td>FROM WHOM</td>
                            <th><textarea type="text" class="form-control" id="support_from_whom"  name="support_from_whom">{{  $activity->support_from_whom}}</textarea></th>
                        </tr>
                        <tr>
                            <td>HOW MUCH</td>
                            <th><textarea type="text" class="form-control" id="support_how_much"  name="support_how_much">{{  $activity->support_how_much}}</textarea></th>
                        </tr>
                        
                        {{-- <tr>
                            <td>REMARKS</td>
                            <th><textarea type="text" class="form-control" id="remarks"  name="remarks">{{  $activity->remarks}}</textarea></th>
                        </tr> --}}
                        <tr>
                            <td>PLAN B (For what if)</td>
                            <th><textarea type="text" class="form-control" id="plan_b"  name="plan_b">{{  $activity->plan_b}}</textarea></th>
                        </tr>
                    </table>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a class="btn btn-primary" href="{{ route('activities.index', $target->id) }}">Return</a>
            </div>

            
        </div>
    </form>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')

<script>
    let self = this;
    this.toggleOther = function(){
        let value = document.getElementById("position").value
        if(value === 'Other'){
            document.getElementById('position_other').value=''
            document.getElementById('position_other').classList.remove('d-none')
        }else{
            document.getElementById('position_other').value=value
            document.getElementById('position_other').classList.add('d-none')
        }
    }
    
    this.toggleOther()
    document.getElementById("position").onchange = function(){self.toggleOther()}
</script>

<script src="{{ asset('js/axios.min.js')}}"></script> 
<script src="{{ asset('js/locations.js')}}"></script>

@endsection