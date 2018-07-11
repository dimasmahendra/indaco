function dosearchcategoryevent(xAwal) {
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
            url: getBaseURL() + "index.php/ctrcategoryevent/searchcategoryevent/",
            data: "xAwal=" + xAwal + "&xSearch=" + xSearch,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                $("#tabledatacategoryevent").html(json.tabledatacategoryevent);
                $("#edSearch").val(xSearch);
                $("#edHalaman").html(json.halaman);
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga" + xmlHttpRequest.responseText);
            }
        });
    });
}


function doeditcategoryevent(edidx) {
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrcategoryevent/editreccategoryevent/",
            data: "edidx=" + edidx,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                $("#edidx").val(json.idx);
                $("#edcategoryevent").val(json.categoryevent);
                $("#eddescription").val(json.description);
                $("#edimage").val(json.image);
                $("#edslug").val(json.slug);
                $("#edidparent").val(json.idparent);
                $("#edidbahasa").val(json.idbahasa);

            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga " + xmlHttpRequest.responseText);
            }
        });
    });
}

function doClearcategoryevent() {
    $(document).ready(function () {
        $("#edidx").val("0");
        $("#edcategoryevent").val("");
        $("#eddescription").val("");
        $("#edimage").val("");
        $("#edslug").val("");
        $("#edidparent").val("");
        $("#edidbahasa").val("");

    });
}

function dosimpancategoryevent() {
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrcategoryevent/simpancategoryevent/",
            data: "edidx=" + $("#edidx").val() + "&edcategoryevent=" + $("#edcategoryevent").val() + "&eddescription=" + $("#eddescription").val() + "&edimage=" + $("#edimage").val() + "&edslug=" + $("#edslug").val() + "&edidparent=" + $("#edidparent").val() + "&edidbahasa=" + $("#edidbahasa").val(),
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (msg) {
                doClearcategoryevent();
                dosearchcategoryevent('-99');
                alert("Data Berhasil Disimpan.... ");
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga " + xmlHttpRequest.responseText);
            }
        });
    });
}

function dohapuscategoryevent(edidx) {
    if (confirm("Anda yakin Akan menghapus data ?"))
    {
        $(document).ready(function () {
            $.ajax({
                url: getBaseURL() + "index.php/ctrcategoryevent/deletetablecategoryevent/",
                data: "edidx=" + edidx,
                cache: false,
                dataType: 'json',
                type: 'POST',
                success: function (json) {
                    doClearcategoryevent();
                    dosearchcategoryevent('-99');
                },
                error: function (xmlHttpRequest, textStatus, errorThrown) {
                    alert("Error juga " + xmlHttpRequest.responseText);
                }
            });
        });
    }
}


dosearchcategoryevent(0);
function queryParams() {
    return {
        type: 'owner',
        sort: 'idx',
        direction: 'desc',
        per_page: 1000,
        page: 1
    };
}
$(document).ready(function () {
    $("#loading").css('display', 'none');
    $("#edimage").myupload();
    
});  