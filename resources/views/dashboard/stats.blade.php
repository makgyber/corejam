@extends('dashboard.base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <div class="row mb-3 ">
                <form action="{{route('stats')}}" class="form form-group col-12 d-flex">
                <div class="card-group col-12">
                  <div class="card">
                    <div class="card-body">
                      <span>Region</span>
                      <select class="form-control" id="region_code" name="region_code" aria-placeholder="Select region">   
                        <option value=""></option>
                        @forelse ($regions as $region)
                            @if (isset($params['region_code']) && $params['region_code'] == $region->code)
                                <option value="{{$region->code}}" selected>{{$region->name}}</option> 
                            @else
                                <option value="{{$region->code}}">{{$region->name}}</option>    
                            @endif
                        @empty
                        <option value="">No regions found</option>
                        @endforelse
            
                    </select>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <span>Province</span>
                      <input type="hidden" id="province" value="{{$params['province_code'] ?? ''}}" />
                      <select class="form-control" id="province_code" name="province_code">
    
                      </select>
                  </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <span class="text-sm">City/Municipality</span>
                      <input type="hidden" id="city" value="{{$params['city_code'] ?? ''}}" />
                      <select class="form-control" id="city_code" name="city_code">   
    
                      </select>
                  </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <input type="hidden" id="barangay" value="{{$params['barangay'] ?? ''}}" />
                      <span>Barangay</span>
                      <select class="form-control" id="barangay_code" name="barangay">   
    
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
            @if(isset($params['region_code']))
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
                      

                      @include('dashboard.metrics.location-counts')

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
  <script src="{{ asset('js/locations.js') }}"></script>
  <script src="{{ asset('js/business.js') }}"></script>
@endsection
