$(document).ready(function () {
  $(".navbar-toggler").on("click", function () {
  $(this).toggleClass("active");
  });
});

$('.navbar-nav li a').on('click', function(){
  if(!$( this ).hasClass('dropdown-toggle')){
      $('.navbar-collapse').collapse('hide');
  }
});

(function (e) {
    e(window.jQuery, window, document);
})(function ($) {
    $(function () {
        'use strict';
        var app = {
            config: {},
            init: function (conf) {
                app.product();
            },
            product: function (e) {
              $('.navbar-nav li a').on('click', function(){
                if(!$( this ).hasClass('dropdown-toggle')){
                  $('.navbar-collapse').collapse('hide');
                }
              });

              $(window).scroll(function() {
                var scrolled=0;
      $(document).ready(function(){           
        $("#scroll-down-0").on("click" ,function(){
          scrolled=scrolled+141;        
        $(".scrolly-0").animate({
          scrollTop: scrolled});
        });
        $("#scroll-up-0").on("click" ,function(){
          scrolled=scrolled-141;
        $(".scrolly-0").animate({
          scrollTop: scrolled});
        });
        $("#scroll-down-1").on("click" ,function(){
          scrolled=scrolled+370;        
        $(".scrolly-1").animate({
          scrollTop: scrolled});
        });
        $("#scroll-up-1").on("click" ,function(){
          scrolled=scrolled-370;
        $(".scrolly-1").animate({
          scrollTop: scrolled});
        });
        $("#scroll-down-2").on("click" ,function(){
          scrolled=scrolled+370;        
        $(".scrolly-2").animate({
          scrollTop: scrolled});
        });       
        $("#scroll-up-2").on("click" ,function(){
          scrolled=scrolled-370;
        $(".scrolly-2").animate({
          scrollTop: scrolled});
        });
        $("#scroll-down-3").on("click" ,function(){
          scrolled=scrolled+370;        
        $(".scrolly-3").animate({
          scrollTop: scrolled});
        });       
        $("#scroll-up-3").on("click" ,function(){
          scrolled=scrolled-370;
        $(".scrolly-3").animate({
          scrollTop: scrolled});
        });
        $("#scroll-down-4").on("click" ,function(){
          scrolled=scrolled+370;        
        $(".scrolly-4").animate({
          scrollTop: scrolled});
        });       
        $("#scroll-up-4").on("click" ,function(){
          scrolled=scrolled-370;
        $(".scrolly-4").animate({
          scrollTop: scrolled});
        });   
        $("#scroll-down-5").on("click" ,function(){
          scrolled=scrolled+370;        
        $(".scrolly-5").animate({
          scrollTop: scrolled});
        });       
        $("#scroll-up-5").on("click" ,function(){
          scrolled=scrolled-370;
        $(".scrolly-5").animate({
          scrollTop: scrolled});
        });   
        $("#scroll-down-6").on("click" ,function(){
          scrolled=scrolled+370;        
        $(".scrolly-6").animate({
          scrollTop: scrolled});
        });       
        $("#scroll-up-6").on("click" ,function(){
          scrolled=scrolled-370;
        $(".scrolly-6").animate({
          scrollTop: scrolled});
        });   
      });
              });
            },
        };
        app.init();
    });
});
