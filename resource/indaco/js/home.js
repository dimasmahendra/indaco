$(document).ready(function () {
  $(".navbar-toggler").on("click", function () {
    $(this).toggleClass("active");
  });
});

$(function() {
  $('.scrollsections').scrollSections();
});
if(screen.width >= 720) {
  document.write('<script src="http://localhost/indaco/resource/indaco/js/jquery.scrollSections.js"><'+'/script>');
}

(function (e) {
    e(window.jQuery, window, document);
})(function ($) {
    $(function () {
        'use strict';
        var app = {
            config: {},
            init: function (conf) {
                app.home();
            },
            home: function (e) {
              var videosekarang = $('#myvideo');

              $(document).ready(function(){
                videosekarang[0].play();
                $('#landing').show();
                $('#myvideo2').hide();

                videosekarang.on("play",function(event){
                  var videotime=setInterval(function() {
                    if(typeof(videosekarang[0])=='undefined'){
                      window.clearInterval( videotime); 
                      return false;
                    }

                    //console.log(videosekarang[0].currentTime);
                    if ((videosekarang[0].currentTime) >= videosekarang[0].duration - 5){
                      window.clearInterval( videotime);
                      //alert('sdfsdfs')
                      $('#myvideo2').get(0).play();
                      $('#myvideo').fadeOut(3000,function(){
                        $('#video-content').fadeIn(2000);
                      });
                      $('#myvideo2').fadeIn(3000);
                    }
                  });
                });
              });

              $(window).scroll(function() {
                $('#landing').show();
                var y = $(this).scrollTop();
                if(y ==0){
                  $('#top').hide('fast');
                  $('#top').remove();
                }
                /* belazo */
                if (y > $('#belazo').offset().top-5 ) {
                  $('.produk-txt1, .produk-txt2a').addClass('in-left');
                  $('.produk-img1, .produk-img2a, .btn-produk1, .btn-produk2a').addClass('in-right');     
                }     
                /* envi */
                if (y > $('#envi').offset().top-5 ) {
                  $('.produk-txt2, .produk-txt3a').addClass('in-left');
                  $('.produk-img2, .produk-img3a, .btn-produk2, .btn-produk3a').addClass('in-right');
                }     
                /* top seal */
                if (y > $('#topseal').offset().top-5 ) {
                  $('.produk-txt3, .produk-txt4a').addClass('in-left');
                  $('.produk-img3, .produk-img4a, .btn-produk3, .btn-produk4a').addClass('in-right');
                }
                /* hot seal */
                if (y > $('#hotseal').offset().top-5 ) {
                  $('.produk-txt4, .produk-txt5a').addClass('in-left');
                  $('.produk-img4, .produk-img5a, .btn-produk4, .btn-produk5a').addClass('in-right');
                }
                /* tinting */
                if (y > $('#tinting').offset().top-5 ) {
                  $('.produk-txt5, .produk-txt6a').addClass('in-left');
                  $('.produk-img5, .produk-img6a, .btn-produk5, .btn-produk6a').addClass('in-right');
                }
                /* modacon */
                if (y > $('#modacon').offset().top-5 ) {
                  $('.produk-txt6, .produk-txt7a').addClass('in-left');
                  $('.produk-img6, .produk-img7a, .btn-produk6, .btn-produk7a').addClass('in-right');
                }
                /* nusatex */
                if (y > $('#nusatex').offset().top-5 ) {
                  $('.produk-txt7').addClass('in-left');
                  $('.produk-img7, .btn-produk7').addClass('in-right');
                }
              });
            },
        };
        app.init();
    });
});
