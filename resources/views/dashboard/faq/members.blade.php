@extends('dashboard.base')

@section('content')

<div class="animated fadeIn">
    <div class="row card col-12">
        <div class="card-header"><strong>Adding your organisation's members</strong></div>
        <div class="card-body">

        </div>
    </div>
    <div class="position-absolute-bottom">
        <nav class="navbar navbar-light bg-light">
            <div class="d-flex justify-content-start">
                <a class="btn btn-sm btn-dark" href="{{route('faq', 'affiliations')}}"><i class="cil-hand-point-left"></i>  Managing your affiliations</a></div>
            <div class="d-flex justify-content-center">
                <a class="btn btn-sm btn-dark" href="{{route('faq', 'index')}}"><i class="cil-hamburger-menu"></i> Table of contents</a></div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-sm btn-dark" href="{{route('faq', 'targets')}}"><i class="cil-hand-point-right"></i>  Setting up Target Outcomes</a></div>
      </nav>
    </div>
</div>

@endsection


@section('javascript')

@endsection
