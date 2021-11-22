
{{-- <div class="card">
    <div class="card-header bg-light">
        <strong>{{ $message->user->name }}</strong>
        <div class="text-muted float-right">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
    <div class="card-body">
        <div>{{ $message->body }}</div>
    </div>
</div> --}}
<details class="border-1 p-1 row col-12 m-1 w-100">
<summary class="bg-light text-dark p-1">
    <strong>{{ $message->user->name }}</strong>
    <div class="text-muted float-right">
        <small>Posted {{ $message->created_at->diffForHumans() }}</small>
    </div>
</summary>
<div>
    {{ $message->body }}
</div>
</details>