@extends('dashboard.base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <div class="row">
                @include('dashboard.metrics.total-members')
                <!-- /.col-->
                @include('dashboard.metrics.registered-voters')
                <!-- /.col-->
                @include('dashboard.metrics.coordinators')
                <!-- /.col-->
                @include('dashboard.metrics.target-voters')
                <!-- /.col-->
              </div>
              <div class="row">
                @include('dashboard.metrics.gender')
                <!-- /.col-->
                @include('dashboard.metrics.age')
                <!-- /.col-->
                @include('dashboard.metrics.business')
                </div>
                <!-- /.col-->
              </div>
              <!-- /.row-->
              <div class="row">

                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">Registration Activities</div>
                    <div class="card-body">
                      
                        <!-- /.col-->
                        @include('dashboard.metrics.region-counts')
                      

                        @include('dashboard.metrics.global-region-counts')
                      
                      <!-- /.row-->
                      @include('dashboard.metrics.activities')
                    
                  </div>
                  
                </div>
               
                <!-- /.col-->
              </div>
              <!-- /.row-->
            </div>
          </div>

@endsection

@section('javascript')

    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection
