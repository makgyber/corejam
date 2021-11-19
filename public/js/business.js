/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/business.js":
/*!**********************************!*\
  !*** ./resources/js/business.js ***!
  \**********************************/
/***/ (function() {

var self = this;

this.toggleOther = function () {
  var value = document.getElementById("position").value;

  if (value === 'Other') {
    document.getElementById('position_other').value = '';
    document.getElementById('position_other').classList.remove('d-none');
  } else {
    document.getElementById('position_other').value = value;
    document.getElementById('position_other').classList.add('d-none');
  }
};

this.toggleBusiness = function () {
  var _document$querySelect;

  var value = (_document$querySelect = document.querySelector("input[name=bizowner]:checked")) === null || _document$querySelect === void 0 ? void 0 : _document$querySelect.value;
  console.log(value);

  if (value == 'yes') {
    document.getElementById('biznes_card').classList.remove('d-none');
  } else {
    document.getElementById('biznes_card').classList.add('d-none');
  }
};

this.toggleOther();

document.getElementById("position").onchange = function () {
  self.toggleOther();
};

this.toggleBusiness();

document.getElementById("bizowner_yes").onchange = function () {
  self.toggleBusiness();
};

document.getElementById("bizowner_no").onchange = function () {
  self.toggleBusiness();
};

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/business.js"]();
/******/ 	
/******/ })()
;