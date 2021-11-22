@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="card">
              <div class="card-header bg-info text-white">
                <h5 class="d-inline-block ">
                  {{ __('Conversations') }} <a href="{{route('faq', 'messages')}}" target="_blank"><span class="badge rounded-pill bg-light text-dark">?</span></a>
                </h5>
                    <a href="{{ route('messages.create') }}" class="float float-right btn btn-light btn-sm shadow">
                        <span class="cil-chat-bubble"></span> {{ __('New conversation') }}</a>
                     
                </div>

              <div class="card-body">

                  <br>

    @include('dashboard.messenger.partials.flash')

    <table class="table table-sm table-hover table-light">
        <thead>
            <tr>
                <th></th>
                <th>From</th>
                <th>Subject</th>
                <th>Sent</th>
            </tr>
        </thead>
<tbody>
    @each('dashboard.messenger.partials.thread', $threads, 'thread', 'dashboard.messenger.partials.no-threads')
</tbody>
    </table>

                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('javascript')

@endsection