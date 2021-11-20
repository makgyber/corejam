@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">

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
              
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <h5 class="d-block">{{ __('Member Registry') }}
                        <a href="{{route('faq', 'members')}}" target="_blank"><span class="badge rounded-pill bg-light text-dark">?</span></a>
                      </h5>
                      <small>You can now add  your registered-voter members who will vote for Sen. Manny Pacquiao for President.</small>  
                    </div>
                    <div class="card-header">
                      <div class="float-right">
                        <a href="{{ route('members.create') }}?affiliation_id={{$affiliation_id}}" class="btn btn-primary btn-sm">{{ __('Add  member') }}</a>
                        <a href="{{ asset('assets/downloads/Member_import_template.xlsx') }}" class="btn btn-warning btn-sm">{{ __('Download Excel template') }}</a>
                    
                        <span class="d-inline form-control bg-light text-muted">
                          <form method="POST" class="d-inline" enctype="multipart/form-data" action="{{route('members.import')}}">
                            @csrf
                              <input type="hidden" name="affiliation_id" value="{{$affiliation_id}}"/>
                              <input type="file" name="membersheet" class="form form-file" />
                              <button class="btn btn-info btn-sm">{{ __('Import excel file') }}</button>
                          </form>
                        </span>
                    </div>
                    </div>

                     
                          @if($affiliations->count() )
                          
                              
                            <form method="GET" class="col-12">
                              <div class="row mt-3 ">
                                <div class="col-8 form-inline ">
                                   <select class="form-control col-8 mr-2" name="affiliation_id" id="affiliation_id">
                                      @foreach($affiliations as $affiliation)
                                            @if($affiliation->id == trim($affiliation_id))
                                                <option value="{{ $affiliation->id }}" selected>{{ $affiliation->name }}</option>
                                            @else
                                                <option value="{{ $affiliation->id }}" >{{ $affiliation->name }}</option>
                                            @endif
                                      @endforeach
                                    </select>
                                    <button class="btn btn-dark  form-button">{{ __('Select Organisation') }}</button>
                                </div>
                                <div class="col-4 form-inline">
                                  <input type="text" placeholder="Search" name="searchfilter" value="{{$searchfilter??''}}" class="form-control float-right ">
                                       <button class="btn btn-dark float-right "><i class="cil-search" ></i> Search by Name</button>
                                </div>

                              </div>
                            </form>  
                          
                        
                          
                          
                          @else
                              <div class="alert alert-info">
                                Please register a Church or other affiliated organisation first. 
                                <a href="{{ route('affiliations.create') }}"  class="btn btn-primary m-2">Add affiliation</a>
                              </div>
                          @endif
                    

                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Location</th>
                            <th>Skillsets</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                          @forelse($members ?? '' as $member)
                            <tr>
                              <td>{{ $member->id }}</td>
                              <td><strong>{{ $member->first_name }} {{ $member->last_name }}</strong></td>
                              <td>{{ $member->email }}</td>
                              <td>{{ $member->contact_number }}</td>
                              <td>{{ $member->region->name ??'' }}</td>
                              <td>{{ str_replace(',', ', ', $member->skillsets) }}</td>
                              <td>
                                <a href="{{ url('/cms/members/' . $member->id . '/edit?affiliation_id='. $affiliation_id) }}" class="btn btn-block btn-primary btn-sm">Edit</a>
                              </td>
                              <td>
                                <form action="{{ route('members.destroy', $member->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger btn-sm" 
                                    onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                                </form>
                              </td>
                            </tr>
                            @empty
                            <div class="alert alert-info">No members have been saved yet.</div>
                            @endforelse
                        </tbody>
                      </table>
                      {{$members->links()}}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

