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
                        <a href="{{ route('coordinators.create') }}" class="btn btn-primary btn-sm">{{ __('Invite Coordinator') }}</a>
                        <a href="{{ asset('assets/downloads/Member_import_template.xlsx') }}" class="btn btn-warning btn-sm">{{ __('Download Excel template') }}</a>
                    
                        <span class="d-inline form-control bg-light text-muted">
                          <form method="POST" class="d-inline" enctype="multipart/form-data" action="{{route('coordinators.import')}}">
                            @csrf
                              <input type="file" name="membersheet" class="form form-file" />
                              <button class="btn btn-info btn-sm">{{ __('Import excel file') }}</button>
                          </form>
                        </span>
                    </div>
                    </div>
                    <form method="GET" class="col-12">
                      <div class="row">
                        <div class="mt-3 col-12">
                          <button class="btn btn-dark col-2 d-inline-block  float-right"><i class="cil-search" ></i> Search by Name</button>
                          <input type="text" placeholder="Search" name="searchfilter" value="{{$searchfilter??''}}" class="form-control col-4 d-inline-block  float-right">
                        </div>
                      </div>
                    </form>  
                    <div class="card-body">
                      <form action="{{ route('coordinators.destroy', $you->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm "
                              onclick="return confirm('Are you sure you want to delete selected members?')">
                              <i class="cil-trash"></i>
                        </button>
                        <table class="table table-responsive-sm table-striped table-sm">
                          <thead>
                          <tr>
                            <th><input type="checkbox" name="delAll" id="delAll"></th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Roles</th>
                            <th>Coordinator Level</th>
                            <th>Area</th>
                            <th>Registered</th>
                            <th></th>
                          </tr>
                        </thead>
                        
                        <tbody>
                          @foreach($users as $user)
                            <tr>
                              <td>
                                @if($you->id != $user->id)
                                <input type="checkbox" name="item[]" class="form-control-checkbox cbitem" value="{{$user->id}}">
                                @endif
                              </td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->menuroles }}</td>
                              <td>{{ $user->coordinator_level }}</td>
                              <td>
                                @php
                                  if(strlen($user->coordinator_scope) == 2) {
                                    echo App\Models\Regions::where('code', $user->coordinator_scope)->first()->name;
                                  } else  if(strlen($user->coordinator_scope) == 4) {
                                    echo App\Models\Provinces::where('code', $user->coordinator_scope)->first()->name;
                                  } else  if(strlen($user->coordinator_scope) > 4){
                                    echo App\Models\Cities::where('code', $user->coordinator_scope)->first()->name;
                                  }
                                @endphp
                              </td>
                              <td>
                                @if($user->hasAcceptedInvitation())
                                <i class="cil-check text-primary"></i>
                                @else
                                <i class="cil-x text-danger"></i>
                                @endif
                              </td>
                              <td>

                                <a href="{{ route('coordinators.show',  $user->id) }}" class="btn btn-sm btn-primary">View</a>
                                
                                <a href="{{ route('coordinators.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                @if($you->id != $user->id)
                                <a href="{{ route('coordinators.show-role', $user->id) }}" class="btn btn-sm btn-success">Role</a>
                                @endif
                                @if( 'user' == $user->menuroles )
                                  <a href="{{ route('coordinators.show-invite',  $user->id) }}" class="btn btn-sm btn-info">Invite</a>
                                @endif
 
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      
                      </table></form>
                    </div>
                </div>
              </div>
              {{ $users->links()}}
            </div>
          </div>
        </div>

@endsection


@section('javascript')
<script>
  document.getElementById('delAll').onclick = function() {
    var checkboxes = document.getElementsByName('item[]');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
}
</script>

@endsection

