@extends('dashboard.base')

@section('content')
<div class="container-fluid animated fadeIn">
    <div class="animated fadeIn">
        <div class="row card col-12">
            <div class="card-header"><strong>User's Guide</strong></div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{route('faq', 'start')}}"><h5>Where to start?</h5></a>
                        <p>Step-by-step guide to what required tasks you need to do after accepting the coordinator invitation.</p>
                    </li>
                    <li class="list-group-item"><a href="{{route('faq', 'profile')}}"><h5>Updating your personal profile data</h5> </a>
                        <p>Guide to understanding the requested data points and what they are used for.</p>
                    </li>
                    <li class="list-group-item"><a href="{{route('faq', 'affiliations')}}"><h5>Managing your affiliations</h5> </a>
                        <p>Enter your church or other organisation details</p>
                    </li>
                    <li class="list-group-item"><a href="{{route('faq', 'members')}}"><h5>Adding your organisation's members</h5> </a>
                        <p>Learn how to enter members data one at a time or use the import tool to upload an excel file with your members data</p>
                    </li>
                    <li class="list-group-item"><a href="{{route('faq', 'targets')}}"><h5>Setting up Target Outcomes</h5> </a>
                        <p>Define your personal target outcomes</p>
                    </li>
                    <li class="list-group-item"><a href="{{route('faq', 'members')}}"><h5>Specifying your VIP - Critical Activities</h5> </a>
                        <p>Input specific critical activities, and request for support to achieve your target objectives</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="position-absolute-bottom">
            <nav class="navbar navbar-light bg-light">
                <div class="d-flex justify-content-end"></div>
                <div class="d-flex justify-content-end"><a class="btn btn-sm btn-dark" href="{{route('faq', 'start')}}"><i class="cil-hand-point-right"></i>  Start here</a></div>
          </nav>
        </div>
    </div>
</div>
@endsection
@section('javascript')

@endsection

