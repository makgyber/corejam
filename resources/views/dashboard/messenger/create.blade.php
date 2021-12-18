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
                            <details open="true">
                                <summary>Add Recipients</summary>
                                <div class="form-group mt-3">
                                    <label class="control-label text-success   text-uppercase" for="selectAll"></label>
                                    @if(auth()->user()->hasRole('admin'))
                                    <label class="text-success text-uppercase">        
                                        <input type="checkbox" id="selectAll"
                                        class="m-1 d-inline-block " >Select All
                                    </label>
                                    @endif
                                   
                                        <div class="flex">
                                            <select class="js-example-basic-multiple" name="recipients[]" id="recipientSelect" multiple="multiple" style="width:100%">
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{!!$user->last_name!!}, {{$user->first_name}} {{$user->middle_name}}</option>
                                                @endforeach
                                            </select>
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
<script src="{{ asset('js/axios.min.js') }}"></script> 
<script src="{{ asset('js/select2.full.min.js') }}"></script> 
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            allowClear: true
        });
    
        $("#selectAll").click(function(){
            if($("#selectAll").is(':checked') ){
                $("#recipientSelect > option").prop("selected","selected");
            }else{
                $("#recipientSelect").val('');
            }
            $("#recipientSelect").trigger('change');
        });

    });
</script>
@endsection
