@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Edit Target Outcome</h4></div>
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
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
                <form action="{{ url('/cms/targets/'.$target->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <table class="table table-striped table-bordered datatable">
                        <tbody>
                            <tr>
                                <th>
                                    Target Outcome
                                </th>
                                <td>
                                    <input type="text" class="form-control" name="objective" value="{{ $target->objective }}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Brief Description
                                </th>
                                <td>
                                    <textarea class="form-control" name="tldr">{{ $target->tldr }}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a class="btn btn-primary" href="{{ route('targets.index') }}">Return</a>
                </form>
            </div>
          </div>
        </div>
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
        document.getElementById('position_other').classList.remove('d-none')
    }else{
        document.getElementById('position_other').classList.add('d-none')
    }
}

this.toggleOther()
document.getElementById("position").onchange = function(){self.toggleOther()}
</script>

<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ asset('js/locations.js') }}"></script>
@endsection