@extends('dashboard.base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <div class="row mb-3 ">
                <form action="{{route('stats')}}" class="form form-group col-12 d-flex">
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
  <script src="{{ asset('js/axios.min.js') }}"></script> 

  <script>
    let self = this;
    this.buildSelectOptions = function( data , selectedId){
        let result = '<option></option>'
        let selectedValue = document.getElementById(selectedId).value;
        for(let i = 0; i<data.length; i++){
            result += '<option value="' + data[i].code+ '"'
            if(selectedValue == data[i].code) result += ' selected  '
            result +='>' + data[i].name + '</option>'
        }
        return result
    }

    this.buildSelectOptionsById = function( data , selectedId){
        let result = '<option></option>'
        let selectedValue = document.getElementById(selectedId).value;
        for(let i = 0; i<data.length; i++){
            result += '<option value="' + data[i].id+ '"'
            if(selectedValue == data[i].id) result += ' selected  '
            result +='>' + data[i].name + '</option>'
        }
        return result
    }

    this.updateSelectWorldCities = function($country=null, $state=null){
        let state =  document.getElementById("state_id").value 
        let country = document.getElementById('country_id').value
        if($state){
            state =  $state
        }
        if($country) {
            country = $country
        }

        axios.get( '/worldcities?state=' + state + '&country=' + country)
        .then(function (response) {
            document.getElementById("world_city_id").innerHTML = self.buildSelectOptionsById(response.data, 'world_city')
        })
        .catch(function (error) {
            // handle error
            console.log(error)
        })
    }

    this.updateSelectStates = function($country=null){
        let country =  document.getElementById("country_id").value 
        if($country){
            country =  $country
        }

        axios.get( '/states?country=' + country)
        .then(function (response) {
            document.getElementById("state_id").innerHTML = self.buildSelectOptionsById(response.data, 'state')
        })
        .catch(function (error) {
            // handle error
            console.log(error)
        })
    }

    this.updateSelectCountries = function($subregion=null){
      console.log('here')
      let subregion =  document.getElementById("subregion").value 
      if($subregion){
        subregion =  $subregion
      }

      axios.get( '/countries?subregion=' + subregion)
      .then(function (response) {
          document.getElementById("country_id").innerHTML = self.buildSelectOptionsById(response.data, 'country')
      })
      .catch(function (error) {
          // handle error
          console.log(error)
      })
    }

    this.updateSelectStates()
    this.updateSelectWorldCities()
    this.updateSelectCountries()
    document.getElementById("subregion").onchange = function(){self.updateSelectCountries();self.updateSelectStates();self.updateSelectWorldCities()}
    document.getElementById("country_id").onchange = function(){self.updateSelectStates();self.updateSelectWorldCities()}

  </script>
@endsection
