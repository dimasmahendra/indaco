$(document).ready(function(){   
    $("ul.tabs li").click(function(){
        var tab_id = $(this).attr("data-tab");

        $("ul.tabs li").removeClass("current");
        $(".tab-content").removeClass("current");

        $(this).addClass("current");
        $("#"+tab_id).addClass("current");
    })

    $("#btAddEvent").click(function(){
        $('div.tabs-area').css("display", "block");
        $('div#tabledataevent').css("display", "none");
        $('button#btAddEvent').css("display", "none");
        $("button[name = 'btSimpan']").css("display", "block");
    })

    $('body').on('click','.bteditevent',function(){
        $('div.tabs-area').css("display", "block");
        $('div#tabledataevent').css("display", "none");
        $('button#btAddEvent').css("display", "none");
        $("button[name = 'btSimpan']").css("display", "block");
    })

    $("#btAddArtist").click(function(){
        $('div.tabs-area').css("display", "block");
        $('div#tabledataartist').css("display", "none");
        $('button#btAddArtist').css("display", "none");
        $("button[name = 'btSimpan']").css("display", "block");
    })

    $('body').on('click','.bteditaartis',function(){
        $('div.tabs-area').css("display", "block");
        $('div#tabledataartist').css("display", "none");
        $('button#btAddArtist').css("display", "none");
        $("button[name = 'btSimpan']").css("display", "block");
    })

    $("#btAddThread").click(function(){
        $('div.tabs-area').css("display", "block");
        $('div#tabledatathread').css("display", "none");
        $('button#btAddThread').css("display", "none");
        $("button[name = 'btSimpan']").css("display", "block");
    })

    $('body').on('click','.bteditthread',function(){
        $('div.tabs-area').css("display", "block");
        $('div#tabledatathread').css("display", "none");
        $('button#btAddThread').css("display", "none");
        $("button[name = 'btSimpan']").css("display", "block");
    })

    $('.artist-multiple').select2();
    $('.thread-multiple').select2();
})