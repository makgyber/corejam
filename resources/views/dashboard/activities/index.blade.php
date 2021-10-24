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
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Success Indicator</th>
                            <th>Location</th>
                            <th>Remarks</th>
                            <th>Plan B</th>
                            <th>Support Request</th>
                            <th>From Whom</th>
                            <th>How Much</th>
                            <th>When Needed</th>
                            <th>Target Start</th>
                            <th>Target End</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                          @forelse($target->activities ?? '' as $activity)
                            <tr>
                              <td><strong>{{ $activity->title }}</strong></td>
                              <td>{{ $activity->success_indicator }}</td>
                              <td>{{ $activity->location }}</td>
                              <td>{{ $activity->remarks }}</td>
                              <td>{{ $activity->plan_b }}</td>
                              <td>{{ $activity->support_request }}</td>
                              <td>{{ $activity->support_from_whom }}</td>
                              <td>{{ $activity->support_how_much }}</td>
                              <td>{{ $activity->support_when_needed }}</td>
                              <td>{{ $activity->target_start }}</td>
                              <td>{{ $activity->target_end }}</td>
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

