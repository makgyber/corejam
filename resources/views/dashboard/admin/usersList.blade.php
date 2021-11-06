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
                      <i class="fa fa-align-justify"></i><h4 class="d-inline-block">{{ __('Users') }}</h4>
                      <div class="float-right">
                        <a href="{{ route('coordinators.create') }}" class="btn btn-primary btn-sm">{{ __('Add user') }}</a>
                        <a href="{{ asset('assets/downloads/Member_import_template.xlsx') }}" class="btn btn-warning btn-sm">{{ __('Download Excel template') }}</a>
                    
                        <span class="d-inline form-control bg-light text-muted">
                          <form method="POST" class="d-inline" enctype="multipart/form-data" action="{{route('members.import')}}">
                            @csrf
                              <input type="file" name="membersheet" class="form form-file" />
                              <button class="btn btn-info btn-sm">{{ __('Import excel file') }}</button>
                          </form>
                        </span>
                    </div>
                    </div>
                    <form method="GET" class="col-12">
                      <div class="row mt-3 ">
                        <div class="col-4 form-inline">
                          <input type="text" placeholder="Search" name="searchfilter" value="{{$searchfilter??''}}" class="form-control float-right ">
                               <button class="btn btn-dark float-right "><i class="cil-search" ></i> Search by Name</button>
                        </div>

                      </div>
                    </form>  
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Roles</th>
                            <th>Email verified at</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                            <tr>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->menuroles }}</td>
                              <td>{{ $user->email_verified_at }}</td>
                              <td>
                                <a href="{{ route('coordinators.show',  $user->id) }}" class="btn btn-block btn-primary">View</a>
                              </td>
                              <td>
                                <a href="{{ route('coordinators.edit', $user->id) }}" class="btn btn-block btn-primary">Edit</a>
                              </td>
                              <td>
                                @if( $you->id !== $user->id )
                                <form action="{{ route('coordinators.destroy', $user->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger">Delete Coordinator</button>
                                </form>
                                @endif
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
              {{ $users->links()}}
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

