/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/locations.js":
/*!***********************************!*\
  !*** ./resources/js/locations.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var self = this;

this.buildSelectOptions = function (data, selectedId) {
  var result = '';
  var selectedValue = document.getElementById(selectedId).value;

  for (var i = 0; i < data.length; i++) {
    result += '<option value="' + data[i].code + '"';
    if (selectedValue == data[i].code) result += ' selected  ';
    result += '>' + data[i].name + '</option>';
  }

  return result;
};

this.updateSelectProvince = function () {
  axios.get('/provinces?region=' + document.getElementById("region_code").value).then(function (response) {
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

  axios.get('/cities?province=' + provinceCode).then(function (response) {
    document.getElementById("city_code").innerHTML = self.buildSelectOptions(response.data, 'city');
  })["catch"](function (error) {
    // handle error
    console.log(error);
  });
};

this.updateSelectProvince();
this.updateSelectCities();

document.getElementById("region_code").onchange = function () {
  self.updateSelectProvince();
};

document.getElementById("province_code").onchange = function () {
  self.updateSelectCities();
};

/***/ }),

/***/ 4:
/*!*****************************************!*\
  !*** multi ./resources/js/locations.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/jonm/projects/corejam/resources/js/locations.js */"./resources/js/locations.js");


/***/ })

/******/ });