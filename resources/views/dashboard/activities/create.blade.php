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
    
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Create Activity for {{ auth()->user()->name}}</h4></div>
          <div class="card-header"><h5>{{$target->objective}}</h5></div>
            <div class="card-body">
                <form action="{{ route('activities.store', $target->id)  }}" method="POST">
                    @csrf
                    <input type="hidden" name="target_id" value="{{$target->id}}"/>
                    <input type="hidden" name="owner" value="{{auth()->user()->id}}"/>
                    <table class="table table-bordered datatable">
                        <tr>
                            <th colspan="2">Activity Details</th>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <th><input type="text" class="form-control" id="title"  name="title" value="{{ old('title') }}" /></th>
                        </tr>
                        <tr>
                            <td>Success Indicators</td>
                            <th><textarea type="text" class="form-control" id="success_indicator"  name="success_indicator">{{ old('success_indicator') }}</textarea></th>
                        </tr>
                        <tr>
                            <td>Plan B</td>
                            <th><textarea type="text" class="form-control" id="plan_b"  name="plan_b">{{ old('plan_b') }}</textarea></th>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <th><textarea type="text" class="form-control" id="location"  name="location">{{ old('location') }}</textarea></th>
                        </tr>
                        <tr>
                            <td>Target Dates</td>
                            <th>
                                <div class="row">
                                    <div class="col-6">
                                        From: 
                                        <input type="date" class="form-control" id="target_start"  name="target_start" value="{{ date('Y-m-d', strtotime(old('target_start') ?? now() )) }}" />
                                    </div>
                                    <div class="col-6">
                                        To:
                                        <input type="date" class="form-control" id="target_end"  name="target_end" value="{{ date('Y-m-d', strtotime(old('target_end') ?? now()))
                                         }}" />
                                    </div>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2">Request for Support</th>
                        </tr>
                        <tr>
                            <td>What?</td>
                            <th><textarea type="text" class="form-control" id="support_request"  name="support_request">{{ old('support_request') }}</textarea></th>
                        </tr>
                        <tr>
                            <td>From Whom?</td>
                            <th><textarea type="text" class="form-control" id="support_from_whom"  name="support_from_whom">{{ old('support_from_whom') }}</textarea></th>
                        </tr>
                        <tr>
                            <td>How Much?</td>
                            <th><textarea type="text" class="form-control" id="support_how_much"  name="support_how_much">{{ old('support_how_much') }}</textarea></th>
                        </tr>
                        <tr>
                            <td>When Needed?</td>
                            <th><textarea type="text" class="form-control" id="support_when_needed"  name="support_when_needed">{{ old('support_when_needed') }}</textarea></th>
                        </tr>
                        <tr>
                            <td>Remarks</td>
                            <th><textarea type="text" class="form-control" id="remarks"  name="remarks">{{ old('remarks') }}</textarea></th>
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

<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ asset('js/locations.js') }}"></script>

@endsection