@extends('dashboard.base')

@section('content')

<div class="animated fadeIn">
    <div class="row card col-12">
        <div class="card-header"><h4>Updating your personal profile data</h4></div>
        <div class="card-body">
            <div class="row mb-5">
                <div class="col-4">
                    <h5>The Profile Landing Page</h5>  
                    The Profile landing page provides a quick look your basic information, groups and target outcomes.
                    The three buttons on upper right corners of the different sections will lead directly to the named modules 
                    for easy access to the different functionalities.
                </div>
                <div class="col-8">
                    
                    <img src="{{asset('assets/faq/profile/complete.png')}}" alt="" class="col-12">
                </div>          
            </div>


<h5>The Edit Profile page consists of 4 basic sections</h5>            

<ul class="list-group">
    <li class="list-group-item">
        <h5>Edit Profile</h5>
        <div class="row">
        <div class="col-6">
        <table class="table table-sm  table-condensed table-outline table-hover">
            <tbody>
                <tr>
                    <th>Field</th>
                    <th>Description</th>
                    <th>Notes</th>
                    <th>Example</th>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td></td>
                    <td>required</td>
                    <td>Juan</td>
                </tr>
                <tr>
                    <td>Middle Name</td>
                    <td></td>
                    <td>preferred</td>
                    <td>Cruz</td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td></td>
                    <td>required</td>
                    <td>Santos</td>
                </tr>
                <tr>
                    <td>Birthday</td>
                    <td>used for calculating age demographics</td>
                    <td>required</td>
                    <td>01/01/1970</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>used for login and authentication; can be changed but should be unique across the whole system</td>
                    <td>required</td>
                    <td>juancruzsantos@mail.xyz</td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td>for direct communications</td>
                    <td>preferred</td>
                    <td>0917-1238467</td>
                </tr>
                <tr>
                    <td>Residential Address</td>
                    <td>full address for record purposes and communications</td>
                    <td>preferred</td>
                    <td>100 JP Rizal St. Brgy A</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>used for gender demographics calculation</td>
                    <td>required</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-6">
        <img src="{{asset('assets/faq/profile/editprofile.png')}}" alt="" class="col-8">
    </div>
</div>
    </li>
    <li class="list-group-item">
        <h5>Skills and Capabilities</h5>
        <img src="{{asset('assets/faq/profile/skills.png')}}" alt="" width="400">
        <table>
            <tbody>
                <tr>
                    <th>Field</th>
                    <th>Description</th>
                    <th>Notes</th>
                    <th>Example</th>
                </tr>
            </tbody>
        </table>
    </li>
    <li class="list-group-item">
        <h5>Registered Voter's Adddress</h5>
        <img src="{{asset('assets/faq/profile/voters.png')}}" alt="" width="400" >
    </li>
    <li class="list-group-item">
        <h5>Information for Business Owners</h5>
        <img src="{{asset('assets/faq/profile/business.png')}}" alt="" width="400">
    </li>
</ul>



        </div>
    </div>
    <div class="position-absolute-bottom">
        <nav class="navbar navbar-light bg-light">
            <div class="d-flex justify-content-start"><a class="btn btn-sm btn-dark" href="{{route('faq', 'start')}}"><i class="cil-hand-point-left"></i>  Quick Start</a></div>
            <div class="d-flex justify-content-center"><a class="btn btn-sm btn-dark" href="{{route('faq', 'index')}}"><i class="cil-hamburger-menu"></i> Table of contents</a></div>
            <div class="d-flex justify-content-end"><a class="btn btn-sm btn-dark" href="{{route('faq', 'affiliations')}}"><i class="cil-hand-point-right"></i>  Managing your affiliations</a></div>
      </nav>
    </div>
</div>

@endsection


@section('javascript')

@endsection
