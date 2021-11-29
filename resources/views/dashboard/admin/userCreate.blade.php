@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Coordinator Invitation</h4></div>
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
                <form method="POST" action="{{ route('coordinators.store') }}">
                    @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card-body p-4">
                    
                    
                            <h1>{{ __('Invite New Coordinator') }}</h1>
                            <p class="text-muted">Create a new coordinator account</p>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('First Name') }}" id="first_name" name="first_name" value="{{ old('first_name') }}" required autofocus>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('Last Name') }}" id="last_name" name="last_name" value="{{ old('last_name') }}" required autofocus>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="form-check checkbox">
                                    <input class="form-check-input" type="checkbox" value="true" name="as_admin" id="as_admin"/>
                                    <label class="form-check-label" for="as_admin">Has Admin Rights</label>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">{{ __('Submit') }}</button>
                    <a href="{{ route('coordinators.index') }}" class="btn btn-primary m-2">{{ __('Return') }}</a>
                        </div>
                    </div>
                    <div class="card col-6">
                        <div class="card-header">
                            <h5>Level and Area of Responsibility</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="coordinator_level" class="form-label">Coordinator Level</label>
                                <select class="form-control" id="coordinator_level" name="coordinator_level">   
                                    <option value="">Select coordinator level</option>
                                    @forelse ($coordinatorLevels as $coordinatorLevel)
                                        @if (old('coordinator_level') == $coordinatorLevel)
                                            <option value="{{$coordinatorLevel}}" selected>{{$coordinatorLevel}}</option> 
                                        @else
                                            <option value="{{$coordinatorLevel}}">{{$coordinatorLevel}}</option>    
                                        @endif
                                    
                                    @empty
                                    
                                    @endforelse
                    
                                </select>
                            </div>
                            @include('dashboard.shared.member-create-form-locations')

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

<script>
    let self = this;
    this.initCards = function(){
        $('#localAddress').hide();
        $('#internationalAddress').hide();
        $('#barangayCard').hide();
        $('#cityCard').hide();
        $('#regionCard').hide();
        $('#provinceCard').hide();
    }

    this.toggleArea = function(){
        let value = document.getElementById("coordinator_level").value
        if (value === 'ofw') {
            $('#country_id').val('');
            $('#internationalAddress').show();
            $('#localAddress').hide();
            $('#regionCard').hide();
            $('#provinceCard').hide();
            $('#cityCard').hide();
            $('#barangayCard').hide();
        }else if(value === 'regional'){
            $('#country_id').val(174);
            $('#internationalAddress').hide();
            $('#localAddress').show();
            $('#regionCard').show();
            $('#provinceCard').hide();
            $('#cityCard').hide();
            $('#barangayCard').hide();
        }else if(value === 'provincial'){
            $('#country_id').val(174);
            $('#internationalAddress').hide();
            $('#localAddress').show();
            $('#regionCard').show();
            $('#provinceCard').show();
            $('#cityCard').hide();
            $('#barangayCard').hide();
        }else if(value === 'city'){
            $('#country_id').val(174);
            $('#internationalAddress').hide();
            $('#localAddress').show();
            $('#regionCard').show();
            $('#provinceCard').show();
            $('#cityCard').show();
            $('#barangayCard').hide();
        }else if(value === 'municipal'){
            $('#country_id').val(174);
            $('#internationalAddress').hide();
            $('#localAddress').show();
            $('#regionCard').show();
            $('#provinceCard').show();
            $('#cityCard').show();
            $('#barangayCard').hide();
        }else if(value === 'barangay'){
            $('#country_id').val(174);
            $('#internationalAddress').hide();
            $('#localAddress').show();
            $('#regionCard').show();
            $('#provinceCard').show();
            $('#cityCard').show();
            $('#barangayCard').show();
        }
    }

    this.initCards()
    this.toggleArea()
    document.getElementById("coordinator_level").onchange = function(){self.toggleArea()}
    $('#country_id').on('change', function(){
        if($( this ).val()!=174) {
            $('#coordinator_level').val('ofw');
        }else{
            $('#coordinator_level').val('');
        }
    })
</script>
<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ asset('js/locations.js') }}"></script>
@endsection