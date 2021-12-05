@extends('dashboard.base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <div class="row mb-3 ">
                <form action="{{route('globalstats')}}" class="form form-group col-12 d-flex">
                <div class="card-group col-12">
                  <div class="card">
                    <div class="card-body">
                      <span>Global Region</span>
                      <select class="form-control" id="subregion" name="subregion" aria-placeholder="Select region">   
                        <option value=""></option>
                        @forelse ($subregions as $subregion)
                            @if (isset($params['subregion']) && $params['subregion'] == $subregion->subregion)
                                <option value="{{$subregion->subregion}}" selected>{{$subregion->subregion}}</option> 
                            @else
                                <option value="{{$subregion->subregion}}">{{$subregion->subregion}}</option>    
                            @endif
                        @empty
                        <option value="">No region found</option>
                        @endforelse
            
                    </select>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <span>Country</span>
                      <input type="hidden" id="country" value="{{$params['country_id'] ?? ''}}" />
                      <select class="form-control" id="country_id" name="country_id">   
                      </select>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <span>State</span>
                      <input type="hidden" id="state" value="{{$params['state_id'] ?? ''}}" />
                      <select class="form-control" id="state_id" name="state_id">
                      </select>
                  </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <span class="text-sm">City/Municipality</span>
                      <input type="hidden" id="world_city" value="{{$params['world_city_id'] ?? ''}}" />
                      <select class="form-control" id="world_city_id" name="world_city_id">   
                      </select>
                  </div>
                  </div>
                  <div class="card">
                    <div class="card-body text-center btn-group-vertical">
                      <button class="btn btn-light" type="submit">Search by selected filter</button>
                    </div>
                  </div>
                </div>
              </form>
              </div>
            @if(isset($params['subregion']))
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
                @include('dashboard.metrics.age')
                @include('dashboard.metrics.business')
                @include('dashboard.metrics.coopmember')
                </div>
                <!-- /.col-->
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      @include('dashboard.metrics.affiliation-counts')
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.row-->
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">Registration Activities</div>
                    <div class="card-body">
                      

                      @include('dashboard.metrics.global-location-counts')

                  </div>
                  
                </div>
               
                <!-- /.col-->
              </div>
              <!-- /.row-->
              @endif
            </div>
          </div>

@endsection

@section('javascript')
  <script src="{{ asset('js/Chart.min.js') }}"></script>
  <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
  <script src="{{ asset('js/main.js') }}" defer></script>
  <script src="{{ asset('js/axios.min.js') }}"></script> 
  <script src="{{ asset('js/globallocation.js') }}"></script> 
@endsection
