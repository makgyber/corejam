@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> Note: {{ $note->title }}</div>
                    <div class="card-body">

                        <strong>Author:</strong>
                        <p> {{ $note->user->name }}</p>
                        <strong>Title:</strong>
                        <p> {{ $note->title }}</p>
                        <strong>Content:</strong> 
                        <p>{{ $note->content }}</p>
                        <strong>Applies to date:</strong> 
                        <p>{{ $note->applies_to_date }}</p>
                        <strong> Status: </strong>
                        <p>
                            <span class="{{ $note->status->class }}">
                              {{ $note->status->name }}
                            </span>
                        </p>
                        <strong>Note type:</strong>
                        <p>{{ $note->note_type }}</p>
                        <a href="{{ route('notes.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection