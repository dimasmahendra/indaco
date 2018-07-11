(function (e) {
    e(window.jQuery, window, document);
})(function ($) {
    $(function () {
        'use strict';
        var app = {
            config: {},
            init: function (conf) {
                app.general();
            },
            general: function (e) {
              $(".navbar-toggler").on("click", function () {
                $(this).toggleClass("active");
              });

              $('.scrollsections').scrollSections();
            },
        };
        app.init();
    });
});
