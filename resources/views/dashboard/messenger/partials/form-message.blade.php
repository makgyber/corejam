
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
                    @forelse($users as $user)
                    <span class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $user->id }}" id="skills{{ $loop->index}}" name="recipients[]"/>
                        <label class="form-check-label" for="skills{{ $loop->index}}">
                            {{ $user->name }}
                        </label>
                    </span>
                    @empty
                    @endforelse
                </div>
                <button type="submit" class="btn-block btn btn-primary ">Submit</button>
            </div>
            
            
            
        </div> 
        </form>
    </div>
