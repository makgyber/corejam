@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Role and Coordinator Level Assignment</h4></div>
            <div class="card-body">
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
                <form method="POST" action="{{ route('coordinators.assign-role', $user->id) }}">
                    @method('put')
                    @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card-body p-4">
                    
                    
                            <h3>{{ __('Assign Roles') }}</h3>
                            <p class="text-muted">You can select multiple roles. This will determine which modules or features are accessible to the user.</p>
                            <div class="input-group mb-3 text-info">
                                Assign To:          <strong>{{ $user->name }}</strong>
                            </div>
                            <h4>Select Roles</h4>
                            <div class="input-group mb-3">
                                
                                @forelse($roles as $role)
                                <div class="form-check m-2 d-block width-30">
                                    <input class="form-check-input" type="checkbox" value="{{ $role->name }}" name="roles[]" id="role_{{ $role->name }}"
                                    @if(in_array($role->name, explode(',', $user->menuroles))) checked @endif />
                                    <label class="form-check-label" for="role_{{ $role->name }}">{{ $role->name }}</label>
                                </div>
                                @empty
                                <span>No roles defined</span>
                                @endforelse
                            </div>
                            <button class="btn btn-success" type="submit">{{ __('Submit') }}</button>
                    <a href="{{ route('coordinators.index') }}" class="btn btn-primary m-2">{{ __('Return') }}</a>
                        </div>
                    </div>
                    <div class="card col-6">

@include('dashboard.admin.area-of-responsibility', ['action' => 'edit', 'user' => $user])

                        </div>
                      
                </div>
                    
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</form>
@endsection

@section('javascript')
<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ mix('js/arearesponsibility.js') }}"></script>
<script src="{{ mix('js/locations.js') }}"></script>
@endsection