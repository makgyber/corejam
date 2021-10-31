@extends('dashboard.base')

@section('content')
    <div class="col-md-6">
        <h1>{{ $thread->subject }}</h1>
        @each('dashboard.messenger.partials.messages', $thread->messages, 'message')

        @include('dashboard.messenger.partials.form-message')
    </div>
@endsection

@section('javascript')

@endsection
