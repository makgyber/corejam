@extends('dashboard.base')

@section('content')

<div class="container-fluid animated fadeIn">
    <div class="animated fadeIn">
        <div class="row">
            <div class="card col-5">
                <div class="card-header"><strong>Where to start?</strong></div>
                <div class="card-body">
                    <h3>Welcome to your CMS Dashboard</h3>
                    <h4>Quick start</h4>
                    <p>If this is your first time here, this page will guide you through the initial steps required to complete setting up your profile.</p>

                    <ol>
                        <li>
                            You will first need to 
                            complete the profile information on your Profile page. It will look like the image on the right.
                            You can go do that now by clicking on this link:
                            <a href="{{route('profile.edit')}}" class="btn btn-sm btn-light" target="_blank">Edit profile</a>

                        </li>
                        <li>
                            After providing the required data, you need to register your church in the system. Notice that the image on the right prompts you
                            to add your Church or affiliation by clicking on the link. You can also do that by clicking on this link:
                            <a href="{{route('affiliations.create')}}" class="btn btn-sm btn-light">Add affiliation</a>
                        </li>
                        <li>Once you have at least one affiliation registered, you can now input members for that organisation.  
                            <a href="{{route('members.index')}}" class="btn btn-sm btn-light">Go to Members Registry</a>

                        </li>
                        <li>As a coordinator, you will also need to record your Target Outcomes to the system.
                            <a href="{{route('targets.create')}}" class="btn btn-sm btn-light">Add Target Outcome</a>

                        </li>
                        <li>Critical activities to achieve your Target Outcomes will then be defined and added. 
                            This is also where request for support can be specified.
                            <br>
                            <em> Please note that since activities are linked to target outcomes, there is no menu item in the side bar that
                            directly leads to the activity module. This button will be available only after a target outcome has been created.</em>

                        </li>
                    </ol>
                </div>
                <div class="card-body border rounded-pill mb-2 bg-gradient-warning">
                        <span class="badge bg-info rounded text-white p-1">Quick Tip</span>
                        The module titles at the top of the page have a clickable context-help icon <a class="badge bg-light rounded-pill text-dark">?</a>
                        that will open up the User Guide page.
                </div>
            </div>

            <div class="card col-7">
                <img src="{{asset('assets/faq/start/profile_incomplete.png')}}" alt="" class="col-12" class="d-flex">
            </div>
            <div class=" col-12">
            <nav class="d-flex navbar navbar-light bg-light">
                <div class="d-flex justify-content-start"><a class="btn btn-sm btn-dark" href="{{route('faq', 'index')}}"><i class="cil-hamburger-menu"></i>   Table of contents</a></div>
                <div class="d-flex justify-content-end"><a class="btn btn-sm btn-dark" href="{{route('faq', 'profile')}}"><i class="cil-hand-point-right"></i>  Updating your personal profile data</a></div>
            </nav>
            </div>
        </div>

    </div>
</div>

@endsection


@section('javascript')

@endsection
