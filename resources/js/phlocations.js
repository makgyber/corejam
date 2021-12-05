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

this.updateSelectProvince = function(){
    axios.get( '/provinces?region=' + document.getElementById("region_code").value )
    .then(function (response) {
        document.getElementById("province_code").innerHTML = self.buildSelectOptions(response.data, 'province')
        self.updateSelectCities(document.getElementById("province_code").value)
    })
    .catch(function (error) {
        // handle error
        console.log(error)
    })
}

this.updateSelectCities = function($province=null){
    let provinceCode =  document.getElementById("province_code").value 
    if($province){
        provinceCode =  $province
    }

    axios.get( '/cities?province=' + provinceCode)
    .then(function (response) {
        document.getElementById("city_code").innerHTML = self.buildSelectOptions(response.data, 'city')
        self.updateSelectBarangays(document.getElementById("city_code").value)
    })
    .catch(function (error) {
        // handle error
        console.log(error)
    })
}

this.updateSelectBarangays = function($city=null){
    let cityCode =  document.getElementById("city_code").value 
    if($city){
        cityCode =  $city
    }

    axios.get( '/barangays?city=' + cityCode)
    .then(function (response) {
        document.getElementById("barangay_code").innerHTML = self.buildSelectOptions(response.data, 'barangay')
    })
    .catch(function (error) {
        // handle error
        console.log(error)
    })
}

this.updateSelectProvince()
this.updateSelectCities()
this.updateSelectBarangays()

document.getElementById("region_code").onchange = function(){self.updateSelectProvince()}
document.getElementById("province_code").onchange = function(){self.updateSelectCities()}
document.getElementById("city_code").onchange = function(){self.updateSelectBarangays()}
 

