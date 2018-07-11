function dosearchview(xAwal) {
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
            url: getBaseURL() + "index.php/ctrview/searchview/",
            data: "xAwal=" + xAwal + "&xSearch=" + xSearch,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                $("#tabledataview").html(json.tabledataview);
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga" + xmlHttpRequest.responseText);
            }
        });
    });
}


function doeditview(edidx) {
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrview/editrecview/",
            data: "edidx=" + edidx,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                $("#edidx").val(json.idx);
                $("#edidproduk").val(json.idproduk);
                $("#edview").val(json.view);
                $("#edip").val(json.ip);
                $("#edfilter").val(json.filter);
                $("#edtanggal").val(json.tanggal);

            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga " + xmlHttpRequest.responseText);
            }
        });
    });
}

function doClearview() {
    $(document).ready(function () {
        $("#edidx").val("0");
        $("#edidproduk").val("");
        $("#edview").val("");
        $("#edip").val("");
        $("#edfilter").val("");
        $("#edtanggal").val("");

    });
}

function dosimpanview() {
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrview/simpanview/",
            data: "edidx=" + $("#edidx").val() + "&edidproduk=" + $("#edidproduk").val() + "&edview=" + $("#edview").val() + "&edip=" + $("#edip").val() + "&edfilter=" + $("#edfilter").val() + "&edtanggal=" + $("#edtanggal").val(),
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (msg) {
                doClearview();
                dosearchview('-99');
                alert("Data Berhasil Disimpan.... ");
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga " + xmlHttpRequest.responseText);
            }
        });
    });
}

function dohapusview(edidx) {
    if (confirm("Anda yakin Akan menghapus data ?"))
    {
        $(document).ready(function () {
            $.ajax({
                url: getBaseURL() + "index.php/ctrview/deletetableview/",
                data: "edidx=" + edidx,
                cache: false,
                dataType: 'json',
                type: 'POST',
                success: function (json) {
                    doClearview();
                    dosearchview('-99');
                },
                error: function (xmlHttpRequest, textStatus, errorThrown) {
                    alert("Error juga " + xmlHttpRequest.responseText);
                }
            });
        });
    }
}


dosearchview(0);

  