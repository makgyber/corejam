@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Create Affiliation</h4></div>
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
                <form action="{{ route('affiliations.store') }}" method="POST">
                    @csrf
                    <table class="table table-striped table-bordered datatable">
                        <tbody>
                            <tr>
                                <th>
                                    Organisation Type
                                </th>
                                <td>
                                    <select class="form-control" name="organisation_type" id="type">
                                        <option value="church">Church or Faith-based Organisation</option>
                                        <option value="government">Government</option>
                                        <option value="ngo">NGO</option>
                                        <option value="other">Other</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <td>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Brief Introduction or Description
                                </th>
                                <td>
                                    <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Address
                                </th>
                                <td>
                                    <textarea class="form-control"  name="address" >{{ old('address') }}</textarea>
                                </td>
                            </tr>
                            
                            <tr>
                                <th>
                                    Position in organisation
                                </th>
                                <td>
                                    <select class="form-control" name="position" id="position">
                                        <option value="Bishop">Bishop</option>
                                        <option value="Pastor">Pastor</option>
                                        <option value="Elder">Elder</option>
                                        <option value="Board Member/Director">Board Member/Director</option>
                                        <option value="Member">Member</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <input type="text" class="form-control  d-none" placeholder="please specify position" name="position_other" id="position_other"/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a class="btn btn-primary" href="{{ route('affiliations.index') }}">Return</a>
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


@endsection