@extends('dashboard.base')

@section('content')

<div class="animated fadeIn">
    <div class="row card col-12">
        <div class="card-header"><strong>Setting up Target Outcomes</strong></div>
        <div class="card-body">

        </div>
    </div>
    <div class="position-absolute-bottom">
        <nav class="navbar navbar-light bg-light">
            <div class="d-flex justify-content-start"><a class="btn btn-sm btn-dark" href="{{route('faq', 'members')}}">
                <i class="cil-hand-point-left"></i>  Adding your organisation's members</a></div>
            <div class="d-flex justify-content-center"><a class="btn btn-sm btn-dark" href="{{route('faq', 'index')}}"><i class="cil-hamburger-menu"></i> Table of contents</a></div>
            <div class="d-flex justify-content-end"><a class="btn btn-sm btn-dark" href="{{route('faq', 'activities')}}">
                <i class="cil-hand-point-right"></i>  Specifying your VIP - Critical Activities</a></div>
      </nav>
    </div>
</div>

@endsection


@section('javascript')

@endsection
