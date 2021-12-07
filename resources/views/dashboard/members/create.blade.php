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
          <div class="card-header"><h5>Create Member
            <a href="{{route('faq', 'members')}}" target="_blank"><span class="badge rounded-pill bg-light text-dark">?</span></a></h5></div>
          <div class="card-header"><h5>{{$affiliation->name}}</h5></div>
          <form action="{{ route('members.store')  }}" method="POST">
            @include('dashboard.shared.member-create-form')
          </form>        
        </div>
    </div>

  </div>
</div>

@endsection

@section('javascript')

<script>
    let self = this;
    this.toggleOther = function(){
        let value = document.getElementById("position").value
        if(value === 'Other'){
            document.getElementById('position_other').value=''
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