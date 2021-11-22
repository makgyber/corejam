
<details>
    <summary class="bg-primary p-2 shadow">Add a new message</summary>
    <div class="card col-12">
        <div class="row">
<div class="card-body">
            <form action="{{ route('messages.update', $thread->id) }}" method="post" class="d-block">
                {{ method_field('put') }}
                {{ csrf_field() }}

                <div class="form-group">

                    <label class="form-label col-auto">Message body</label>
                        <textarea name="message" class="form-control w-100" rows="10">{{ old('message') }}</textarea>
                </div>
            
                @if($users->count() > 0)

                <div class="form-group">
                    <details class="d-block">
                        <summary>Add recipients</summary>
                        <div class="form-group mt-3">
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
                </div>
                @endif  
                <div class="form-group">
                    <button type="submit" class=" btn btn-primary  mt-3"><i class="cil-send"></i> Submit</button>
                    <a href="" class=" btn btn-secondary  mt-3"><i class="cil-arrow-left"></i> Back</a>
                </div>
            </form>
            </div>
        </div>
    </div>
    </div>
</details>