@extends('dashboard.base')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="card col-12">
                <div class="card-header">
                    <h3>{{ $thread->subject }}</h3>
                </div>
                <div class="card-body">
                    @each('dashboard.messenger.partials.messages', $thread->messages, 'message')
                </div> 
            </div> 

            @include('dashboard.messenger.partials.form-message')

        </div>
    </div>
</div>
@endsection

@section('javascript')

@endsection
