@extends('dashboard.base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <div class="row">
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-primary">
                    <div class="card-body pb-0">
                      <div class="btn-group float-right">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                      </div>
                      <div class="text-value-lg">{{ $totals['total_users'] }}</div>
                      <div>Total Members</div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                      <canvas class="chart" id="card-chart1" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-info">
                    <div class="card-body pb-0">
                      <button class="btn btn-transparent p-0 float-right" type="button">
                        <svg class="c-icon">
                          <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                        </svg>
                      </button>
                      <div class="text-value-lg">{{ $totals['registered_voters'] }}</div>
                      <div>Registred Voters</div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                      <canvas class="chart" id="card-chart2" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-warning">
                    <div class="card-body pb-0">
                      <div class="btn-group float-right">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                      </div>
                      <div class="text-value-lg">{{ $totals['coordinators'] }}</div>
                      <div>Coordinators</div>
                    </div>
                    <div class="c-chart-wrapper mt-3" style="height:70px;">
                      <canvas class="chart" id="card-chart3" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-danger">
                    <div class="card-body pb-0">
                      <div class="btn-group float-right">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                      </div>
                      <div class="text-value-lg">{{ $totals['targetRegistrations'] }}</div>
                      <div>Minimum Target Registered Voters</div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                      <canvas class="chart" id="card-chart4" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
              </div>
              <div class="row">
                <div class="col-sm-6 col-lg-6">
                  <div class="card mb-4" style="--cui-card-cap-bg: #3b5998">
                    <div class="card-header position-relative d-flex justify-content-center align-items-center bg-gradient-warning text-white">
                      <h4>
                      <i class="cil-wc"></i><span class="ml-3">Gender</span> </h4>
                    </div>
                    <div class="card-body row text-center">
                      <div class="col">
                        <div class="fs-5 fw-semibold">{{$totals['male'] ?? 0}}</div>
                        <div class="text-uppercase text-medium-emphasis small">male</div>
                      </div>
                      <div class="vr"></div>
                      <div class="col">
                        <div class="fs-5 fw-semibold">{{$totals['female'] ?? 0}}</div>
                        <div class="text-uppercase text-medium-emphasis small">female</div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-6">
                  <div class="card mb-4" style="--cui-card-cap-bg: #00aced">
                    <div class="card-header position-relative d-flex justify-content-center align-items-center bg-gradient-success text-white">
                      <h4>
                        <i class="cil-wc"></i><span class="ml-3">Age</span> </h4>
                    </div>
                    <div class="card-body row text-center">
                      <div class="col">
                        <div class="fs-5 fw-semibold">{{$totals['youth']??0}}</div>
                        <div class="text-uppercase text-medium-emphasis small">youth  (18-29)</div>
                      </div>
                      <div class="vr"></div>
                      <div class="col">
                        <div class="fs-5 fw-semibold">{{$totals['adults']??0}}</div>
                        <div class="text-uppercase text-medium-emphasis small">adults (30-59)</div>
                      </div>
                      <div class="vr"></div>
                      <div class="col">
                        <div class="fs-5 fw-semibold">{{$totals['seniors']??0}}</div>
                        <div class="text-uppercase text-medium-emphasis small">seniors (60 and up)</div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                
                </div>
                <!-- /.col-->
              </div>
              <!-- /.row-->
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">Registration Activities</div>
                    <div class="card-body">
                      <div class="row">
                        <!-- /.col-->
                        @forelse($regionCounts as $regionCount)
                        <div class="col-sm-6">
                          <!-- /.row-->            
                          
                          <div class="progress-group">
                            <div class="progress-group-header align-items-end">
                              <svg class="c-icon progress-group-icon">
                                <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-pin"></use>
                              </svg>
                              <div>{{$regionCount->name}}</div>
                              <div class="ml-auto font-weight-bold mr-2">{{$regionCount->user_count}}</div>
                              <div class="text-muted small">({{ number_format(100*($regionCount->user_count/$regionTargets[$regionCount->code]), 2)}}%)</div>
                            </div>
                            <div class="progress-group-bars">
                              <div class="progress progress-xs">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ number_format(100*($regionCount->user_count/$regionTargets[$regionCount->code]), 2)}}%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                          @empty
                          @endforelse
                          
                        

                        
                      <!-- /.row--><br>
                      <table class="table table-responsive-sm table-hover table-outline mb-0">
                        <thead class="thead-light">
                          <tr>
                            <th class="text-center">
                              <svg class="c-icon">
                                <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-people"></use>
                              </svg>
                            </th>
                            <th>Coordinators</th>
                            <th class="text-center">Region</th>
                            <th>Budget</th>
                            <th class="text-center">Disbursed</th>
                            <th>Last Activity</th>
                          </tr>
                        </thead>
                        <tbody>

                          @forelse($coordinators as $coordinator)
                          <tr>
                            <td class="text-center text-white">
                              <div class="c-avatar bg-gradient-{{Arr::random(['warning','info','dark','light','primary','danger'])}}">{{substr($coordinator->first_name,0, 1)}}{{substr($coordinator->last_name,0, 1)}}<span class="c-avatar-status bg-success"></span></div>
                            </td>
                            <td>
                              <div>{{ $coordinator->name }}</div>
                              <div class="small text-muted"><span>New</span> | Registered: {{date('M d, Y', strtotime($coordinator->created_at))}}</div>
                            </td>
                            <td class="text-center"><i class="flag-icon flag-icon-us c-icon-xl" id="us" title="us">{{$coordinator->region_name ?? ''}}</i></td>
                            <td>
                              <div class="clearfix">
                                <div class="float-left"><strong>{{number_format((float)$coordinator->support_how_much,2) ?? ''}}</strong></div>
                              </div>
                              {{-- <div class="progress progress-xs">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div> --}}
                            </td>
                            <td class="text-center">
                              <div class="float-right"><strong>{{number_format((float)$coordinator->disbursed,2) ?? ''}}</strong></div>
                            </td>
                            <td>
                            <strong>{{$coordinator->title ?? ''}}</strong>
                            </td>
                          </tr>
                          @empty
                          @endforelse


                          
                        </tbody>
                      </table>
                      
                    </div><br>
                    {{$coordinators->links()??''}}
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
