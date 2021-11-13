@extends('dashboard.base')

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
<div class="card">

    <div class="card-header">
        <h1>Create a new message</h1>
    </div>
    <div class="card-body">
    <form action="{{ route('messages.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-12">
            <!-- Subject Form Input -->
            <div class="form-group">
                <label class="control-label">Subject</label>
                <input type="text" class="form-control" name="subject" placeholder="Subject"
                       value="{{ old('subject') }}">
            </div>

            <!-- Message Form Input -->
            <div class="form-group">
                <label class="control-label">Message</label>
                <textarea name="message" class="form-control" placeholder="message body">{{ old('message') }}</textarea>
            </div>

            @if($users->count() > 0)
            <div class="form-group">
                <label class="control-label" for="selectAll">Recipients</label>
<br>
                <label>
                    <input type="checkbox" id="selectAll"
                    class="m-1 d-inline-block " >Select All</label>
                <div class="top-0 start-0 ">
                @foreach($users as $user)
                
                <div class="form-check d-inline-block col-2 mt-1 position-relative">
                    <label title="{{ $user->name }}" for="rec{{ $user->id }}"><input type="checkbox" name="recipients[]"
                    class="m-1 d-inline-block "   value="{{ $user->id }}" id="rec{{ $user->id }}">
                    {!!$user->name!!}</label>
                </div>
                @endforeach
            </div>
            </div>
            @endif
    
            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
</div></div></div>
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
