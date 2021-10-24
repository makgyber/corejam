@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Activities') }}</div>

                      <div class="card-header">
                          <div> 
                              <h1>{{ $target->objective }}</h1>  
                          </div> 
                          <a href="{{ route('activities.create', $target->id) }}" class="btn btn-primary">{{ __('Add  activity') }}</a>
                          <a href="{{ route('targets.index', $target->id) }}" class="btn btn-primary m-2">{{ __('Return') }}</a>

                    <div class="card-body">

                        <br>
                        <table class="table table-responsive-sm table-bordered table-condensed">
                        <thead class="thead-dark">
                          <tr>
                            <th rowspan="2">Title</th>
                            <th rowspan="2">Success Indicator</th>
                            <th rowspan="2">Location</th>
                            <th rowspan="2">Duration</th>
                            <th rowspan="2">Plan B</th>
                            <th colspan="4" style="text-align:center">Support Request</th>
                            <th rowspan="2">Remarks</th>
                            <th rowspan="2"></th>
                            <th rowspan="2"></th>
                          </tr>
                          <tr>
                            <th>What</th>
                            <th>From Whom</th>
                            <th>How Much</th>
                            <th>When Needed</th>
                          </tr>
                        </thead>
                        <tbody>

                          @forelse($target->activities ?? '' as $activity)
                            <tr>
                              <td><strong>{{ $activity->title }}</strong></td>
                              <td>{{ $activity->success_indicator }}</td>
                              <td>{{ $activity->location }}</td>
                              <td>{{ date('Y-m-d', strtotime($activity->target_start)) }} to {{ date('Y-m-d', strtotime($activity->target_end)) }}</td>
                              <td>{{ $activity->remarks }}</td>
                              <td>{{ $activity->plan_b }}</td>
                              <td>{{ $activity->support_request }}</td>
                              <td>{{ $activity->support_from_whom }}</td>
                              <td>{{ $activity->support_how_much }}</td>
                              <td>{{ $activity->support_when_needed }}</td>
                              <td>
                                <a href="{{ route('activities.edit', [$target->id,$activity->id]) }}" class="btn btn-block btn-primary btn-sm">Edit</a>
                              </td>
                              <td>
                                <form action="{{ route('activities.delete', [$target->id, $activity->id] ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger btn-sm">Delete</button>
                                </form>
                              </td>
                            </tr>
                            @empty
                            <div class="alert alert-info">No activities have been saved yet.</div>
                            @endforelse
                        </tbody>
                      </table>

                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

