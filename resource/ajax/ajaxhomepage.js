function kabupatenselect() {
//      alert($('#edidkabupaten').val());
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrkecamatan/kecamatanbykabupaten/",
            data: "edidkabupaten=" + $('#edidkabupaten').val() + "&edidkota=" + $('#edidkota').val(),
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                if (json) {
                    $("#edidkecamatan").html(json.combokecamatan);
                } else {
                    $("#edidkecamatan").html('');
                }

            }
        });
    });
}



 function dosearchproduk(xAwal) {
     $("#loading").css("display","block");
                
    xSearch = '';
    try
    {
        if ($('#edSearch').val() != '') {
            xSearch = $('#edSearch').val();
        }
    } catch (err) {
        xSearch = '';
    }
    if (typeof (xSearch) == 'undefined') {
        xSearch = '';
    }
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + 'index.php/show/listproperti/',
            data: "xAwal=" + xAwal + "&edidluas=" + $("#edidluas").val() + "&edidharga=" + $("#edidharga").val() + "&edidtipe=" + $("#edidtipe").val() + "&edidkecamatan=" + $("#edidkecamatan").val() + "&edidkabupaten=" + $("#edidkabupaten").val()  + "&edidjenisproperti=" + $("#edidjenisproperti").val() + "&edshort=" + $("#edshort").val(),
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                $('#content').html(json.listproduk);
                $("#loading").css('display','none');
                
            }
        });
    });
}
 function dosearchprodukkabupaten(xAwal,xkabupaten) {
     $("#loading").css("display","block");
   $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + 'index.php/show/listpropertikabupaten/',
            data: "xAwal=" + xAwal + "&edidkabupaten=" + xkabupaten ,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                $('#content').html(json.listproduk);
                $("#loading").css('display','none');
                
            }
        });
    });
}
 function dosearchprodukjenisproperti(xAwal,xjenisproperti) {
     $("#loading").css("display","block");
   $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + 'index.php/show/listpropertijenis/',
            data: "xAwal=" + xAwal + "&edidjenisproperti=" + xjenisproperti ,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                $('#content').html(json.listproduk);
                $("#loading").css('display','none');
                
            }
        });
    });
}
 
function detailproduk(xidx){
    $("#loading").css("display","block");
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + 'index.php/show/detailproperti/',
            data: "xidx=" + xidx ,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                doview(xidx);
                $('#content').html(json.detailproduk);
                $("#loading").css('display','none');
                
            }
        });
    });
}
function formsubmit(){
//    alert( "edidx=" + $("#edidx").val() + "&edtanggal=" + $("#edtanggal").val() + "&edjam=" + $("#edjam").val() + "&edEmail=" + $("#edEmail").val() + "&edTelpon=" + $("#edTelpon").val()+ "&edNama=" + $("#edNama").val() + "&edidproduk=" + $("#edidproduk").val()),
            
    $("#loading").css("display","block");
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + 'index.php/show/formsubmit/',
            data: "edidx=" + $("#edidx").val() + "&edtanggal=" + $("#edtanggal").val() + "&edjam=" + $("#edjam").val() + "&edEmail=" + $("#edEmail").val() + "&edTelpon=" + $("#edTelpon").val()+ "&edNama=" + $("#edNama").val() + "&edidproduk=" + $("#edidproduk").val(),
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                alert(json.pesan);
                $("#loading").css('display','none');
                
            }
        });
    });
}
function doview(xidx) {
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrview/doview/",
            data: "edidproduk=" + xidx ,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (msg) {
//                doClearview();
//                dosearchview('-99');
//                alert("Data Berhasil Disimpan.... ");
            }
        });
    });
}


$(document).ready(function () {
    $("#loading").css('display','none');
    $('#edidluas').css('display', 'none');
    
    $('#edidjenisproperti').change(function () {
        if ($('#edidjenisproperti').val() == '2') {
            $('#edidtipe').css('display', 'none');
            $('#edidluas').css('display', 'inline-block');
        } else {
            $('#edidtipe').css('display', 'inline-block');
            $('#edidluas').css('display', 'none');
        }
    });
});
