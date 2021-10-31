<a class="dropdown-item" href="{{ route('messages.show', $thread->id)}}">
    <div class="message">
        <div class="py-3 mfe-3 float-left">
            <div class="c-avatar bg-warning">{{ substr($thread->creator()->first_name, 0, 1) }}{{ substr($thread->creator()->last_name, 0, 1) }}
                <span class="c-avatar-status bg-success"></span>
            </div>
        </div>
        <div style="min-width: 35em;max-width:38em">
            <small class="text-muted">{{ $thread->creator()->name }}</small>
            <small class="text-muted float-right mt-1">{{ $thread->latestMessage->created_at->diffForHumans() }}</small>
        </div>  
        <div class="font-weight-bold">{{ $thread->subject }}</div>
        <div class="small text-muted text-truncate" >{{ $thread->latestMessage->body }}</div>
    </div>
</a>