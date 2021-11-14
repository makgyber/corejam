@extends('dashboard.base')

@section('content')

<div class="animated fadeIn">
    <div class="row card col-12">
        <div class="card-header"><strong>Adding your organisation's members</strong></div>
        <div class="card-body">
            <div class="row mb-5">
                <div class="col-6">
                    <h5>The Members Registry Landing Page</h5>  
                    The Members Registry landing page provides the user the basic functionality for adding members who are registered voters into the system.
                    A pre-requisite for adding members is the affiliations page. These members are automatically linked to these organisations when they are
                    added to the system. <br>
                    <a href="{{route('members.index')}}" class="btn btn-sm btn-light mt-2">Go to Members Registry page</a>
                </div>
                <div class="col-6">
                    
                    <img src="{{asset('assets/faq/members/noaffiliations.png')}}" alt="" class="col-12">
                    <small>Image 1. when the requisite affiliation have not been added</small>

                    <img src="{{asset('assets/faq/members/nomembers.png')}}" alt="" class="col-12 mt-2">
                    <small>Image 2. when you can start adding members</small>
                </div>          
            </div>

            <div class="row mb-5">
                <div class="col-6">
                    <h5>Create / Edit Members</h5>  
                    The information to provide on this page is exactly the same as that for the Profile module. 
                    See the field descriptions <a href="{{ route('faq', 'profile')}}">here.</a>
                    
                </div>
                <div class="col-6">
                    
                    <img src="{{asset('assets/faq/members/create.png')}}" alt="" class="col-12">
                    <small>Image 3. ui for creating and editing members</small>
                </div>          
            </div>

            <div class="row mb-5">
                <div class="col-6">
                    <h5>Importing Members Data from an Excel file</h5>  
                    <p>
                    For users who are more familiar with working with excel spreadsheets, it may be easier to add members data using spreadsheets
                    rather than inputting each member singly via the Create Member form above.
                </p>
                <p>For this reason we provide a way for users to import data via excel spreadsheets.</p>
                <h5>
                Here is the process</h5>
                <ol>
                    <li>Click on the <a href="{{ asset('assets/downloads/Member_import_template.xlsx') }}" class="btn btn-sm btn-warning"> Download Excel Template </a>
                        link on the upper right part of the page next to the <a href="{{route('members.create')}}" class="btn btn-sm btn-primary">Add Member button</a> </li>
                    <li>Open the downloaded file in your spreadsheet editor</li>
                    <li>The template will look something like the image on the right(Image 3)</li>
                    <li>Copy the whole ROW3 then paste to the next rows to preserve the format of the fields in the sample data. This will be important for the birthday field as 
                        sometimes the format imported is different from what is expected so it may fail to save the row.
                    </li>
                    <li>You can overwrite the sample data provided.</li>
                    <li><strong>DO NOT</strong> modify or delete the first 2 rows of the excel file</li>
                    <li>Save your excel file. You can name the file anything you like.</li>
                    <li>Start the upload by clicking on the <span class="btn btn-sm btn-light">Choose File</span> button then selecting your excel 
                    file from your filesystem</li>
                    <li>The name of you excel spreadsheet should become visible next to <span class="btn btn-sm btn-light">Choose file</span></li>
                    <li>Click on <span class="btn btn-sm btn-info">Import excel file</span></li>
                    <li>Use the search function to verify that your members have been saved</li>
                </ol>
                    
                </div>
                <div class="col-6">
                    
                    <img src="{{asset('assets/faq/members/template.png')}}" alt="" class="col-12">
                    <small>Image 3. excel template for importing members data</small>
                </div>          
            </div>

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
