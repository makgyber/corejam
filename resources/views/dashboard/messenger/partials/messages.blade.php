
<div class="card">
    <div class="card-header bg-light">
        <strong>{{ $message->user->name }}</strong>
        <div class="text-muted float-right">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
    <div class="card-body">
        <div>{{ $message->body }}</div>
    </div>
</div>