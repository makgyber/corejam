<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0 "  style="width: 40em">
    <div class="dropdown-header bg-light"><strong>You have {{$popThreads->count()}} messages</strong></div>
    
    @each('dashboard.messenger.partials.pop-thread', $popThreads, 'thread', 'dashboard.messenger.partials.no-threads')
    
    <a class="dropdown-item text-center border-top" href="{{route('messages')}}"><strong>View all messages</strong></a>
</div>