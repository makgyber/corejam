<?php 
$class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; 
$unreadMessagesCount = $thread->userUnreadMessagesCount(Auth::id())
?>

<tr class="{{$class}}">
    <td class="col-md-1">
        <div class="c-avatar bg-warning">
        @if ($thread->creator()->image!='')
            <img class="c-avatar-img rounded-pill" style="width: 2.5em;height:2.5em"
                src="{{ url('/storage/'.auth()->user()->image) }}" alt="{{ Auth::user()->email }}">
        @else
            {{ substr($thread->creator()->first_name, 0, 1) }}{{ substr($thread->creator()->last_name, 0, 1) }}
        @endif
        <span class="c-avatar-status bg-success"></span></div>
    </td>
    <td class="col-md-2">
        <a href="{{ route('messages.show', $thread->id)}}" class="text-dark text-decoration-none">{{ $thread->creator()->name }}</a></td>
    <td class="col-md-7">
        <a href="{{ route('messages.show', $thread->id)}}" class="text-decoration-none">
        <div class="text-bold">{{ $thread->subject }}</div>
        <span class="small text-muted text-truncate">{{ substr($thread->latestMessage->body, 0, 200) }}...</span>
        </a>
    </td>
    <td class="col-md-2"><small class="text-muted">{{ $thread->latestMessage->created_at->diffForHumans() }}<small></td>
</tr>

