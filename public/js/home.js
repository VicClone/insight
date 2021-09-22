/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
$(document).ready(function () {
  $('.staff').slick({
    infinite: true,
    slidesToShow: 6,
    slidesToScroll: 1,
    prevArrow: $('.staff__btn-prev'),
    nextArrow: $('.staff__btn-next'),
    responsive: [{
      breakpoint: 1400,
      settings: {
        slidesToShow: 5
      }
    }, {
      breakpoint: 990,
      settings: {
        slidesToShow: 4
      }
    }, {
      breakpoint: 800,
      settings: {
        slidesToShow: 3
      }
    }, {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        arrows: false
      }
    }]
  });
});
/******/ })()
;