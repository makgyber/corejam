@extends('dashboard.base')

@section('content')

<div class="animated fadeIn">
    <div class="row card col-12">
        <div class="card-header"><strong>Setting up Target Outcomes</strong></div>
        <div class="card-body">
            <div class="row mb-5">
                <div class="col-6">
                    <h5>The Target Outcomes Landing Page</h5>  
                    The Target Outcomes landing page provides the user the basic functionality for managing his target outcomes in the system.
                    This is a core feature in the CMS that allows the campaign leadership to track progress and activities. This is also
                    where coordinators may request for financial assistance needed to meet targets.  <br>
                    <a href="{{route('targets.index')}}" class="btn btn-sm btn-light mt-2">Go to Target Outcomes page</a>
                </div>
                <div class="col-6">
                    
                    <img src="{{asset('assets/faq/targets/targets.png')}}" alt="" class="col-12">
                    <small>Image 1. the target outcomes landing page</small>
                </div>     
            </div>    
            <div class="row mb-5">
                <div class="col-6">
                    <h5>Create / Edit Target Outcome</h5>  
                    <table class="table table-sm table-borderless table-condensed table-hover">
                        <tbody>
                            <tr>
                                <th>Field</th>
                                <th>Description</th>
                                <th>Notes</th>
                                <th>Example</th>
                            </tr>
                            <tr>
                                <td>Target Outcome</td>
                                <td>short descriptive name</td>
                                <td>required</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Brief Description</td>
                                <td>short narrative description of planned target outcomes</td>
                                <td>preferred</td>
                                <td></td>
                            </tr>
                        </tbody>

                    </table><br>
                    <a href="{{route('targets.create')}}" class="btn btn-sm btn-light mt-2">Go to Add Target Outcomes page</a>
                </div>
                <div class="col-6">
                    
                    <img src="{{asset('assets/faq/targets/create.png')}}" alt="" class="col-12">
                    <small>Image 2. the target outcomes creation page</small>
                </div>
            </div>

            
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
