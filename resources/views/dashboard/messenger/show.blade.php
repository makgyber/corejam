@extends('dashboard.base')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
            <div class="card">
                <div class="card-header bg-info text-light"><strong>{{ $thread->subject }}</strong></div>
                <div class="card-body">
                    @foreach($thread->messages as $message)
                        <details class="w-100 border mb-1 shadow-sm d-block" @if ($loop->last) open="true" @endif>
                            <summary class="bg-light text-dark p-1 d-block">
                                <div class="c-avatar bg-warning float-left">
                                    @if ($message->user->image!='')
                                        <img class="c-avatar-img rounded-pill" style="width: 2.4em;height:2.4em;position:center"
                                            src="{{ url('/storage/'.auth()->user()->image) }}" alt="{{ Auth::user()->email }}">
                                    @else
                                        {{ substr($message->user->first_name, 0, 1) }}{{ substr($message->user->last_name, 0, 1) }}
                                    @endif
                                </div>
                                <div class="text-muted d-inline-block float-right">
                                    <small>Posted {{ $message->created_at->diffForHumans() }}</small>
                                </div>
                                <div class="ml-5 d pt-2 clearfix">From: {{ $message->user->name }}</div>

                                

                            </summary>
                            <div class="card-body p-3">
                                {{ $message->body }}
                            </div>
                        </details>
                    @endforeach
                </div> 
            </div> 
            @include('dashboard.messenger.partials.form-message')
    </div>
</div>
@endsection

@section('javascript')

@endsection
