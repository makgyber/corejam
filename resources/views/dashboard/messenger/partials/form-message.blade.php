
    <div class="card col-12 p-3">
        <div class="card-header bg-info">
            <h4 class="text-white">Add a new message</h4>
        </div>
        <form action="{{ route('messages.update', $thread->id) }}" method="post">
            {{ method_field('put') }}
            {{ csrf_field() }}
            
            
            <div class="card-body">
                
                <h5 class="form-label">Message body</h5>
                    <textarea name="message" class="form-control">{{ old('message') }}</textarea>
            </div>

            
            <div class="card-body">
                <h5>Select Recipient</h5>
                <div class="d-grid">

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
                <button type="submit" class="btn-block btn btn-primary ">Submit</button>
            </div>
            
            
            
        </div> 
        </form>
    </div>
