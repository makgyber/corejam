/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/sharedlocation.js":
/*!****************************************!*\
  !*** ./resources/js/sharedlocation.js ***!
  \****************************************/
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

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/sharedlocation.js"]();
/******/ 	
/******/ })()
;