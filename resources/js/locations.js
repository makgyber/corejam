
let self = this;

this.buildSelectOptions = function( data ){
    let result = ''
    for(let i = 0; i<data.length; i++){
        result += '<option value="' + data[i].code+ '">' + data[i].name + '</option>'
    }
    return result
}

this.updateSelectProvince = function(){
    axios.get( '/provinces?region=' + document.getElementById("region").value )
    .then(function (response) {
        document.getElementById("province").innerHTML = self.buildSelectOptions(response.data)
        self.updateSelectCities(document.getElementById("province").value)
    })
    .catch(function (error) {
        // handle error
        console.log(error)
    })
}

this.updateSelectCities = function($province=null){
    let provinceCode =  document.getElementById("province").value 
    if($province){
        provinceCode =  $province
    }

    axios.get( '/cities?province=' + provinceCode)
    .then(function (response) {
        document.getElementById("city").innerHTML = self.buildSelectOptions(response.data)
    })
    .catch(function (error) {
        // handle error
        console.log(error)
    })
}

this.updateSelectProvince()
this.updateSelectCities()
document.getElementById("region").onchange = function(){self.updateSelectProvince()}
document.getElementById("province").onchange = function(){self.updateSelectCities()}