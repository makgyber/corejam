@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i><h4>{{ __('Target Outcomes (Very Important Priorities - VIP)') }}</h4></div>
                    <div class="card-body">
                        <div class="row"> 
                          <a href="{{ route('targets.create') }}" class="btn btn-primary m-2">{{ __('Add Target Outcome') }}</a>
                        </div>
                        <br>
                        @if($targets->count())
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Target Outcome</th>
                            <th>Description</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($targets as $target)
                            <tr>
                              <td><strong>{{ $target->objective }}</strong></td>
                              <td>{{ $target->tldr }}</td>
                              <td>
                                <a href="{{ url('/cms/targets/' . $target->id . '/edit') }}" class="btn btn-block btn-primary btn-sm">Edit</a>
                              </td>
                              <td>
                                <a href="{{ route( 'activities.index', $target->id ) }}" class="btn btn-block btn-primary btn-sm">Activities</a>
                              </td>
                              <td>
                                <form action="{{ route('targets.destroy', $target->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger btn-sm">Delete</button>
                                </form>
                              </td>
                            </tr>
                            @empty
                            <div class="alert alert-info">No target have been saved yet.</div>
                            @endforelse
                        </tbody>
                      </table>
                      
                      @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

