@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i><h5>{{ __('Affiliations') }}
                        <a href="{{route('faq', 'affiliations')}}" target="_blank"><span class="badge rounded-pill bg-light text-dark">?</span></a>
                      </h5></div>
                    <div class="card-body">
                        <div class="row"> 
                          <a href="{{ route('affiliations.create') }}" class="btn btn-primary m-2">{{ __('Add  affiliation') }}</a>
                        </div>
                        <br>
                        @if($affiliations->count())
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>Type</th>
                            <th>Position in Organisation</th>
                            <th>Region</th>
                            <th>Province</th>
                            <th>City</th>
                            <th>Is Primary</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($affiliations as $affiliation)
                          
                            <tr>
                              <td><strong>{{ $affiliation->name }}</strong></td>
                              <td>{{ $affiliation->description }}</td>
                              <td>{{ $affiliation->address }}</td>
                              <td>{{ $affiliation->organisation_type }}</td>
                              <td>{{ $affiliation->pivot->position }}</td>
                              <td>{{ $affiliation->region->name }}</td>
                              <td>{{ $affiliation->province->name }}</td>
                              <td>{{ $affiliation->city->name }}</td>
                              <td>{{ $affiliation->pivot->is_primary  ? 'Yes' : 'No'}}</td>
                              <td>
                                <a href="{{ url('/cms/affiliations/' . $affiliation->id . '/edit') }}" class="btn btn-block btn-primary btn-sm">Edit</a>
                              </td>
                              <td>
                                <a href="{{ url('/cms/members?affiliation_id=' . $affiliation->id ) }}" class="btn btn-block btn-primary btn-sm">Members</a>
                              </td>
                              <td>
                                <form action="{{ route('affiliations.destroy', $affiliation->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger btn-sm">Delete</button>
                                </form>
                              </td>
                            </tr>
                            @empty
                            <div class="alert alert-info">No affiliations have been saved yet.</div>
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

