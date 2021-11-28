/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/locations.js":
/*!***********************************!*\
  !*** ./resources/js/locations.js ***!
  \***********************************/
/***/ (function() {

var self = this;

this.buildSelectOptions = function (data, selectedId) {
  var result = '<option></option>';
  var selectedValue = document.getElementById(selectedId).value;

  for (var i = 0; i < data.length; i++) {
    result += '<option value="' + data[i].code + '"';
    if (selectedValue == data[i].code) result += ' selected  ';
    result += '>' + data[i].name + '</option>';
  }

  return result;
};

this.buildSelectOptionsById = function (data, selectedId) {
  var result = '<option></option>';
  var selectedValue = document.getElementById(selectedId).value;

  for (var i = 0; i < data.length; i++) {
    result += '<option value="' + data[i].id + '"';
    if (selectedValue == data[i].id) result += ' selected  ';
    result += '>' + data[i].name + '</option>';
  }

  return result;
};

this.updateSelectProvince = function () {
  axios.get('/cms/provinces?region=' + document.getElementById("region_code").value).then(function (response) {
    document.getElementById("province_code").innerHTML = self.buildSelectOptions(response.data, 'province');
    self.updateSelectCities(document.getElementById("province_code").value);
  })["catch"](function (error) {
    // handle error
    console.log(error);
  });
};

this.updateSelectCities = function () {
  var $province = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var provinceCode = document.getElementById("province_code").value;

  if ($province) {
    provinceCode = $province;
  }

  axios.get('/cms/cities?province=' + provinceCode).then(function (response) {
    document.getElementById("city_code").innerHTML = self.buildSelectOptions(response.data, 'city');
    self.updateSelectBarangays(document.getElementById("city_code").value);
  })["catch"](function (error) {
    // handle error
    console.log(error);
  });
};

this.updateSelectBarangays = function () {
  var $city = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var cityCode = document.getElementById("city_code").value;

  if ($city) {
    cityCode = $city;
  }

  axios.get('/cms/barangays?city=' + cityCode).then(function (response) {
    document.getElementById("barangay_code").innerHTML = self.buildSelectOptions(response.data, 'barangay');
  })["catch"](function (error) {
    // handle error
    console.log(error);
  });
};

this.updateSelectStates = function () {
  var $country = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var country = document.getElementById("country_id").value;

  if ($country) {
    country = $country;
  }

  console.log(country);
  axios.get('/cms/states?country=' + country).then(function (response) {
    document.getElementById("state_id").innerHTML = self.buildSelectOptionsById(response.data, 'state');
  })["catch"](function (error) {
    // handle error
    console.log(error);
  });
};

this.updateSelectWorldCities = function () {
  var $country = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var $state = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
  var state = document.getElementById("state_id").value;
  var country = document.getElementById('country_id').value;

  if ($state) {
    state = $state;
  }

  if ($country) {
    country = $country;
  }

  axios.get('/cms/worldcities?state=' + state + '&country=' + country).then(function (response) {
    document.getElementById("world_city_id").innerHTML = self.buildSelectOptionsById(response.data, 'world_city');
  })["catch"](function (error) {
    // handle error
    console.log(error);
  });
};

this.toggleAddressGroups = function () {
  if ($('#country_id').val() == '174') {
    $('#localAddress').show();
    $('#internationalAddress').hide();
  } else {
    $('#localAddress').hide();
    $('#internationalAddress').show();
  }
};

this.updateSelectProvince();
this.updateSelectCities();
this.updateSelectBarangays();
this.updateSelectStates();
this.updateSelectWorldCities();
this.toggleAddressGroups();

document.getElementById("region_code").onchange = function () {
  self.updateSelectProvince();
};

document.getElementById("province_code").onchange = function () {
  self.updateSelectCities();
};

document.getElementById("city_code").onchange = function () {
  self.updateSelectBarangays();
};

document.getElementById("country_id").onchange = function () {
  self.toggleAddressGroups();
  self.updateSelectStates();
  self.updateSelectWorldCities();
};

document.getElementById("state_id").onchange = function () {
  self.updateSelectWorldCities();
};

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/locations.js"]();
/******/ 	
/******/ })()
;