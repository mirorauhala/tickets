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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 52);
/******/ })
/************************************************************************/
/******/ ({

/***/ 52:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(53);


/***/ }),

/***/ 53:
/***/ (function(module, exports) {

jQuery(document).ready(function () {

    var scanner = new Instascan.Scanner({
        video: document.getElementById('qr-feed'),
        mirror: false
    });

    scanner.addListener('scan', function (barcode) {
        console.log(barcode);

        axios.get('/api/v1/order_item/' + barcode).then(function (response) {
            console.log(response);
            var response = response.data.data;
            seatingCode = null;

            // determine seating code
            if (response.ticket.data.is_seatable) {
                seatingCode = response.seat.data.name;
            } else {
                seatingCode = "N/A";
            }

            $(".data-body").fadeIn();
            $("#scanner-ticket-barcode").text(response.barcode);
            $("#scanner-ticket-type").text(response.ticket.data.name);
            $("#scanner-ticket-scan").text(response.scanned);
            $("#scanner-ticket-seating-code").text(seatingCode);
            $("#scanner-ticket-value").text(response.value_pretty);
        }).catch(function (error) {
            console.log(error);
        });
    });

    $(".data-close").on("click", function () {
        console.log("clicked");
        $(".data-body").fadeOut();
    });

    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {

            console.log(cameras);

            // hide
            $(".camera-permissions").hide();
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });
});

/***/ })

/******/ });