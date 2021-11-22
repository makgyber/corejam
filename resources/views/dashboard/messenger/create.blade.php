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

        <div class="card col-12">
        <div class="row">
                <div class="card-header bg-info text-light col-12">
                    <h5>Create a new message</h5>
                </div>
                <div class="card-body">
                <form action="{{ route('messages.store') }}" method="post" class="d-block">
                
                    
                        {{ csrf_field() }}

                            <!-- Subject Form Input -->
                            <div class="form-group">
                                <label class="control-label text-success  text-uppercase">Subject</label>
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    value="{{ old('subject') }}">
                            </div>

                            <!-- Message Form Input -->
                            <div class="form-group">
                                <label class="control-label text-success">Message</label>
                                <textarea name="message" class="form-control" rows="10" placeholder="message body">{{ old('message') }}</textarea>
                            </div>

                            @if($users->count() > 0)
                            <details>
                                <summary>Add Recipients</summary>
                                <div class="form-group mt-3">
                                    <label class="control-label text-success   text-uppercase" for="selectAll"></label>

                                    <label class="text-success text-uppercase">
                                        <input type="checkbox" id="selectAll"
                                        class="m-1 d-inline-block " >Select All</label>
                                    <div class="overflow-auto" style="height: 21em">
                                        <div class="card-columns">
                                            @foreach($users as $user)
                                                <div class="card form-check col-12 border-0 pt-2 bg-light">
                                                    <label title="{{ $user->name }}" for="rec{{ $user->id }}"><input type="checkbox" name="recipients[]"
                                                    class="m-1 d-inline-block "   value="{{ $user->id }}" id="rec{{ $user->id }}">
                                                    {!!$user->last_name!!}, {{$user->first_name}} {{$user->middle_name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </details>
                            @endif
                    
                            <!-- Submit Form Input -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3"><i class="cil-send"></i> Submit</button>
                                <a href="" class=" btn btn-secondary  mt-3"><i class="cil-arrow-left"></i> Back</a>
                            </div>
                        </div>
                    </form>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    document.getElementById('selectAll').onclick = function() {
      var checkboxes = document.getElementsByName('recipients[]');
      for (var checkbox of checkboxes) {
          checkbox.checked = this.checked;
      }
  }
  </script>
@endsection
