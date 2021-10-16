@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Create Member</h4></div>
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
                <form action="{{ route('members.store') }}" method="POST">
                    @csrf
                    <table class="table table-striped table-bordered datatable">
                        <tbody>
                            <tr>
                                <th>
                                    Organisation
                                </th>
                                <td>
                                    {{ $affiliation->name}}
                                    <input type="hidden" name="affiliation_id" value="{{ $affiliation->id}}" />
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    First Name
                                </th>
                                <td>
                                    <input type="text" name="first_name" class="form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                Last Name
                                </th>
                                <td>
                                <input type="text" name="last_name" class="form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                Email
                                </th>
                                <td>
                                <input type="text" name="email" class="form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                Contact Number
                                </th>
                                <td>
                                <input type="text" name="contact_number" class="form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Skills and Capabilities
                                </th>
                                <td>
                                    <textarea class="form-control"  name="skillsets"></textarea>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a class="btn btn-primary" href="{{ route('members.index') }}?affiliation_id={{ $affiliation->id }}">Return</a>
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

@endsection