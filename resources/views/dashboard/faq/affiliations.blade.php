@extends('dashboard.base')

@section('content')

<div class="animated fadeIn">
    <div class="row card col-12">
        <div class="card-header"><strong>Managing your affiliations</strong></div>
        <div class="card-body">

            <div class="row mb-5">
                <div class="col-6">
                    <h5>The Church / Affiliations Landing Page</h5>  
                    The Church / Affiliations landing page provides the user the basic functionality for adding and editing Church or other organization information.
                    This is a pre-requisite for adding members who are registered voters. These members are automatically linked to these organisations when they are
                    added to the system. <br>
                    <a href="{{route('affiliations.index')}}" class="btn btn-sm btn-light mt-2">Go to Affiliations page</a>
                </div>
                <div class="col-6">
                    
                    <img src="{{asset('assets/faq/affiliates/affiliationlist.png')}}" alt="" class="col-12">
                </div>          
            </div>

            <div class="row mb-5">
                <div class="col-6">
                    <h5>Create Affiliation</h5>  

                    <table>
                        <tbody>
                            <tr>
                                <th>Field</th>
                                <th>Description</th>
                                <th>Notes</th>
                                <th>Example</th>
                            </tr>
                            <tr>
                                <td>Organization Type</td>
                                <td>select from the dropddown of optionsd</td>
                                <td>required</td>
                                <td>Church</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>name of the organization that will be used in the system</td>
                                <td>required</td>
                                <td>PCEC</td>
                            </tr>
                            <tr>
                                <td>Brief Introduction or Description</td>
                                <td>short introduction to the organization</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Region</td>
                                <td>regional address of organization; this is used for demographics/analytics</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Province</td>
                                <td>provincial address of organization; this is used for demographics/analytics</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>City/Municipality</td>
                                <td>city or municipal address of organization; this is used for demographics/analytics</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>street address of organization</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Position in Organisation</td>
                                <td>select from a dropdown of values; if not in the selection, select Other then enter the type in the provided input field</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>This is my primary organisation</td>
                                <td>check this only when you have multiple organisations registered in the system</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>

                    </table>
                    <a href="{{route('affiliations.create')}}" class="btn btn-sm btn-light mt-2">Go to Create Affiliation page</a>
                </div>
                <div class="col-6">
                    
                    <img src="{{asset('assets/faq/affiliates/create.png')}}" alt="" class="col-12">
                </div>          
            </div>

        </div>
    </div>
    <div class="position-absolute-bottom">
        <nav class="navbar navbar-light bg-light">
            <div class="d-flex justify-content-start">
                <a class="btn btn-sm btn-dark" href="{{route('faq', 'profile')}}"><i class="cil-hand-point-left"></i> Updating your personal profile data</a></div>
            <div class="d-flex justify-content-center"><a class="btn btn-sm btn-dark" href="{{route('faq', 'index')}}"><i class="cil-hamburger-menu"></i> Table of contents</a></div>
            <div class="d-flex justify-content-end"><a class="btn btn-sm btn-dark" href="{{route('faq', 'members')}}">Adding your organisation's members</a></div>
      </nav>
    </div>
</div>

@endsection


@section('javascript')

@endsection
