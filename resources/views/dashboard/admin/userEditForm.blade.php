@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="fade-in">
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
    
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header"><h4>Edit User Profile</h4></div>
          <form action="{{ route('coordinators.update', $user->id ) }}" method="POST">
            @method('PUT')
            @csrf
            @include('dashboard.shared.member-edit-form-personal', ['member' => $user])

            <hr class=""/>
            @include('dashboard.shared.member-edit-form-skills', ['member' => $user])

        <div class="col-sm-6">

@include('dashboard.shared.member-edit-form-voter', ['member' => $user])

                <hr/>
                @include('dashboard.shared.member-edit-form-business', ['member' => $user])
                
                <div class="card-body" >
                    <button type="submit" class="btn btn-primary">Save Details</button>
                    <a href="{{ route('coordinators.index') }}" class="btn btn-primary">Return</a>
                </div>
            </div>    
        </div>
    </div>
</form>
  </div>
</div>

@endsection

@section('javascript')

<script>
    let self = this;
    this.toggleOther = function(){
        let value = document.getElementById("position").value
        if(value === 'Other'){
            document.getElementById('position_other').classList.remove('d-none')
        }else{
            document.getElementById('position_other').value=value
            document.getElementById('position_other').classList.add('d-none')
        }
    }

    this.toggleBusiness = function(){
        let value = document.querySelector("input[name=bizowner]:checked")?.value
        console.log(value)
        if(value == 'yes'){
            document.getElementById('biznes_card').classList.remove('d-none')
        }else{
            document.getElementById('biznes_card').classList.add('d-none')
        }
    }
    
    this.toggleOther()
    document.getElementById("position").onchange = function(){self.toggleOther()}
    this.toggleBusiness()
    document.getElementById("bizowner_yes").onchange = function(){self.toggleBusiness()}
    document.getElementById("bizowner_no").onchange = function(){self.toggleBusiness()}

</script>

<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ mix('js/locations.js') }}"></script>

@endsection