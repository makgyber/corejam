<?php $count = Auth::user()->newThreadsCount(); ?>
@if($count > 0)
    <span class="badge bg-danger">{{ $count }}</span>
@endif
