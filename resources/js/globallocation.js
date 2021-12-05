let self = this;

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
    let state =  document.getElementById("state").value 
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
    
    let country =  document.getElementById("country").value 
    if($country){
        country =  $country
    }
    console.log(country)
    axios.get( '/states?country=' + country)
    .then(function (response) {
        document.getElementById("state_id").innerHTML = self.buildSelectOptionsById(response.data, 'state')
        self.updateSelectWorldCities(country, document.getElementById("state_id").value)
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
      self.updateSelectStates(document.getElementById("country_id").value)
  })
  .catch(function (error) {
      // handle error
      console.log(error)
  })
}

this.updateSelectCountries()
this.updateSelectStates()
this.updateSelectWorldCities()

document.getElementById("subregion").onchange = function(){self.updateSelectCountries()}
document.getElementById("country_id").onchange = function(){self.updateSelectStates(this.value)}
document.getElementById("state_id").onchange = function(){self.updateSelectWorldCities(null, this.value)}