<?php 
$class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; 
$unreadMessagesCount = $thread->userUnreadMessagesCount(Auth::id())
?>

<tr class="{{$class}}">
    <td class="col-md-1"><div class="c-avatar bg-warning">
        {{ substr($thread->creator()->first_name, 0, 1) }}{{ substr($thread->creator()->last_name, 0, 1) }}
        <span class="c-avatar-status bg-success"></span></div></td>
    <td class="col-md-2">
        <a href="{{ route('messages.show', $thread->id)}}"><strong>{{ $thread->creator()->name }}</strong></a></td>
    <td class="col-md-7">
        <a href="{{ route('messages.show', $thread->id)}}">
        <strong>{{ $thread->subject }}</strong> <span class="small text-muted text-truncate">{{ $thread->latestMessage->body }}</span>
        </a>
    </td>
    <td class="col-md-2"><small class="text-muted">{{ $thread->latestMessage->created_at->diffForHumans() }}<small></td>
</tr>
