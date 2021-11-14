@extends('dashboard.base')

@section('content')

<div class="animated fadeIn">
    <div class="row card col-12">
        <div class="card-header"><strong>Specifying your VIP - Critical Activities</strong></div>
        <div class="card-body">

            <div class="row mb-5">
                <div class="col-6">
                    <h5>Critical Activities</h5>  
                    The access to the Critical Activities management page only shows up when a target outcome has been added to the system.
                    The Activities button will show up as shown in Image 1.
                    <br>
                    <a href="{{route('targets.index')}}" class="btn btn-sm btn-light mt-2">Go to Target Outcomes page</a>
                </div>
                <div class="col-6">
                    
                    <img src="{{asset('assets/faq/targets/targets.png')}}" alt="" class="col-12">
                    <small>Image 1. activities button appears for each target outcome registered</small>
                </div>     
            </div>

            <div class="row mb-5">
                <div class="col-6">
                    <h5>The Critical Activities Landing Page</h5>  
                    The Critical Activities landing page provides the user the basic functionality for managing his critical activities as 
                    related to target outcomes in the system.
                    This is a core feature in the CMS that allows the campaign leadership to track progress and activities. This is also
                    where coordinators may request for financial assistance needed to meet targets.  <br>
                    <a href="{{route('targets.index')}}" class="btn btn-sm btn-light mt-2">Go to Target Outcomes page</a>
                </div>
                <div class="col-6">
                    
                    <img src="{{asset('assets/faq/targets/activities.png')}}" alt="" class="col-12">
                    <small>Image 2. the activities list page</small>
                </div>     
            </div>

            <div class="row mb-5">
                <div class="col-6">
                    <h5>Adding Critical Activities</h5>  
                    <p>
                        
                    </p>
                    <table class="table table-sm table-borderless table-condensed table-hover">
                        <tbody>
                            <tr>
                                <th>Field</th>
                                <th>Description</th>
                                <th>Notes</th>
                                <th>Example</th>
                            </tr>
                            <tr>
                                <td>VIP - CRITICAL ACTIVITY</td>
                                <td>short descriptive name</td>
                                <td>required</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>TIMELINE (Schedules)</td>
                                <td>start date and end date</td>
                                <td>preferred</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Location (Address)</td>
                                <td>where the activities will be conducted</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>SUCCESS INDICATORS (Metrics)</td>
                                <td>narrative description of success metrics</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>WHAT IS IT</td>
                                <td>narrative description of support requested</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>WHEN</td>
                                <td>short description of when the support is needed</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>FROM WHOM</td>
                                <td>who to request help from</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>HOW MUCH</td>
                                <td>how much is neededd</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>REMARKS</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>PLAN B (For what if)</td>
                                <td>short narrative for contingency plans</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>

                    </table><br>
                </div>
                <div class="col-6">

                    <img src="{{asset('assets/faq/targets/createActivity.png')}}" alt="" class="col-12">
                    <small>Image 3. the creating new critical activities page</small>
                </div>
            </div>
        </div>
    </div>
    <div class="position-absolute-bottom">
        <nav class="navbar navbar-light bg-light">
            <div class="d-flex justify-content-start">
                <a class="btn btn-sm btn-dark" href="{{route('faq', 'targets')}}"><i class="cil-hand-point-left"></i> Setting up Target Outcomes</a></div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-sm btn-dark" href="{{route('faq', 'index')}}"><i class="cil-hamburger-menu"></i> Table of contents <i class="cil-hand-point-right"></i></a></div>
      </nav>
    </div>
</div>

@endsection


@section('javascript')

@endsection
