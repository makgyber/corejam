@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Member Registry') }}</div>

                      <div class="card-header">
                          @if($affiliations->count() )
                          <div> 
                              <form method="GET">
                                <div class="form-inline">
                                <select class="form-control col-10  mr-2" name="affiliation_id" id="affiliation_id">

                                  @foreach($affiliations as $affiliation)
                                        @if($affiliation->id == trim($affiliation_id))
                                            <option value="{{ $affiliation->id }}" selected>{{ $affiliation->name }}</option>
                                        @else
                                            <option value="{{ $affiliation->id }}" >{{ $affiliation->name }}</option>
                                        @endif
                                  @endforeach
                                </select>
                                <button href="{{ route('members.create') }}" class="btn btn-primary col-auto">{{ __('Select Organisation') }}</button>
                                </div>
                              </form>
                          </div> 
                          <a href="{{ route('members.create') }}?affiliation_id={{$affiliation_id}}" class="btn btn-primary m-2">{{ __('Add  member') }}</a>
                          @else
                              <div class="alert alert-info">
                                Please register a Church or other affiliated organisation first. 
                                <a href="{{ route('affiliations.create') }}"  class="btn btn-primary m-2">Add affiliation</a>
                              </div>
                          @endif
                        
                    <div class="card-body">
                      
                       
                          
                        
                        
                        <br>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Skillsets</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                          @forelse($members ?? '' as $member)
                            <tr>
                              <td><strong>{{ $member->first_name }} {{ $member->last_name }}</strong></td>
                              <td>{{ $member->email }}</td>
                              <td>{{ $member->contact_number }}</td>
                              <td>{{ $member->skillsets }}</td>
                              <td>
                                <a href="{{ url('/members/' . $member->id . '/edit?affiliation_id='. $affiliation_id) }}" class="btn btn-block btn-primary btn-sm">Edit</a>
                              </td>
                              <td>
                                <form action="{{ route('members.destroy', $member->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger btn-sm">Delete</button>
                                </form>
                              </td>
                            </tr>
                            @empty
                            <div class="alert alert-info">No members have been saved yet.</div>
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

