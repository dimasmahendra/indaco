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
                app.tentang-kami();
            },
            tentang-kami: function (e) {
              $(document).ready(function() {
              // Gets the video src from the data-src on each button
              var $videoSrc;  
              $('.video-btn').click(function() {
                  $videoSrc = $(this).data( "src" );
              });
              console.log($videoSrc);
              // when the modal is opened autoplay it  
              $('#video-modal').on('shown.bs.modal', function (e) {   
              // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
              $("#video").attr('src',$videoSrc + "?rel=0&showinfo=0&controls=1&modestbranding=1&autoplay=1&html5=true" ); 
              }) 
              // stop playing the youtube video when I close the modal
              $('#video-modal').on('hide.bs.modal', function (e) {
                  // a poor man's stop video
                  $("#video").attr('src',$videoSrc); 
              })
              // document ready  
              });
            },
        };
        app.init();
    });
});
