function dosearchkategori(xAwal) {
    xSearch = "";
    try
    {
        if ($("#edSearch").val() != "") {
            xSearch = $("#edSearch").val();
        }
    } catch (err) {
        xSearch = "";
    }
    if (typeof (xSearch) == "undefined") {
        xSearch = "";
    }
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrkategori/searchkategori/",
            data: "xAwal=" + xAwal + "&xSearch=" + xSearch,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                $("#tabledatakategori").html(json.tabledatakategori);
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga" + xmlHttpRequest.responseText);
            }
        });
    });
}


function doeditkategori(edidx) {
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrkategori/editreckategori/",
            data: "edidx=" + edidx,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                $("#edidx").val(json.idx);
                $("#edkategori").val(json.kategori);
                $("#edidparent").val(json.idparent);
                $("#eddeskripsi").val(json.deskripsi);
                 $("#edimage").val(json.image);
                $('.previewimageedimage').attr({"src": getBaseURL()+"resource/uploaded/img/"+json.image});

            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga " + xmlHttpRequest.responseText);
            }
        });
    });
}

function doClearkategori() {
    $(document).ready(function () {
        $("#edidx").val("0");
        $("#edkategori").val("");
        $("#edidparent").val("");
        $("#eddeskripsi").val("");
        $("#edimage").val("");

    });
}

function dosimpankategori() {
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrkategori/simpankategori/",
            data: "edidx=" + $("#edidx").val() + "&edkategori=" + $("#edkategori").val() + "&edidparent=" + $("#edidparent").val() + "&eddeskripsi=" + $("#eddeskripsi").val() + "&edimage=" + $("#edimage").val(),
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (msg) {
                doClearkategori();
                dosearchkategori('-99');
                alert("Data Berhasil Disimpan.... ");
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga " + xmlHttpRequest.responseText);
            }
        });
    });
}

function dohapuskategori(edidx) {
    if (confirm("Anda yakin Akan menghapus data ?"))
    {
        $(document).ready(function () {
            $.ajax({
                url: getBaseURL() + "index.php/ctrkategori/deletetablekategori/",
                data: "edidx=" + edidx,
                cache: false,
                dataType: 'json',
                type: 'POST',
                success: function (json) {
                    doClearkategori();
                    dosearchkategori('-99');
                },
                error: function (xmlHttpRequest, textStatus, errorThrown) {
                    alert("Error juga " + xmlHttpRequest.responseText);
                }
            });
        });
    }
}


dosearchkategori(0);

$(document).ready(function () {
    $("#edimage").myupload();

});