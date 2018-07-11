$(document).ready(function () {
  $(".navbar-toggler").on("click", function () {
  $(this).toggleClass("active");
    });
});

(function (e) {
    e(window.jQuery, window, document);
})(function ($) {
    $(function () {
        'use strict';
        var app = {
            config: {},
            init: function (conf) {
                app.inspirasi();
            },
            inspirasi: function (e) {
              $('.3d-carousel-mobile').carousel({
                num: 3,
                maxWidth: 290,
                maxHeight: 189,
                distance: 10,
                scale: 0.8,
                animationTime: 1000,
                autoPlay: false
              });
              $('.3d-carousel-desktop').carousel({
                num: 3,
                maxWidth: 700,
                maxHeight: 457,
                distance: 30,
                scale: 0.8,
                animationTime: 1000,
                autoPlay: false
              });
            },
        };
        app.init();
    });
});
