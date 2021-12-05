/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/globallocation.js":
/*!****************************************!*\
  !*** ./resources/js/globallocation.js ***!
  \****************************************/
/***/ (function() {

var self = this;

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

this.updateSelectWorldCities = function () {
  var $country = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var $state = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
  var state = document.getElementById("state").value;
  var country = document.getElementById('country_id').value;

  if ($state) {
    state = $state;
  }

  if ($country) {
    country = $country;
  }

  axios.get('/worldcities?state=' + state + '&country=' + country).then(function (response) {
    document.getElementById("world_city_id").innerHTML = self.buildSelectOptionsById(response.data, 'world_city');
  })["catch"](function (error) {
    // handle error
    console.log(error);
  });
};

this.updateSelectStates = function () {
  var $country = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var country = document.getElementById("country").value;

  if ($country) {
    country = $country;
  }

  console.log(country);
  axios.get('/states?country=' + country).then(function (response) {
    document.getElementById("state_id").innerHTML = self.buildSelectOptionsById(response.data, 'state');
    self.updateSelectWorldCities(country, document.getElementById("state_id").value);
  })["catch"](function (error) {
    // handle error
    console.log(error);
  });
};

this.updateSelectCountries = function () {
  var $subregion = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  console.log('here');
  var subregion = document.getElementById("subregion").value;

  if ($subregion) {
    subregion = $subregion;
  }

  axios.get('/countries?subregion=' + subregion).then(function (response) {
    document.getElementById("country_id").innerHTML = self.buildSelectOptionsById(response.data, 'country');
    self.updateSelectStates(document.getElementById("country_id").value);
  })["catch"](function (error) {
    // handle error
    console.log(error);
  });
};

this.updateSelectCountries();
this.updateSelectStates();
this.updateSelectWorldCities();

document.getElementById("subregion").onchange = function () {
  self.updateSelectCountries();
};

document.getElementById("country_id").onchange = function () {
  self.updateSelectStates(this.value);
};

document.getElementById("state_id").onchange = function () {
  self.updateSelectWorldCities(null, this.value);
};

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/globallocation.js"]();
/******/ 	
/******/ })()
;