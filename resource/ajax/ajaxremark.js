function dosearchremark(xAwal) {
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
            url: getBaseURL() + "index.php/ctrremark/searchremark/",
            data: "xAwal=" + xAwal + "&xSearch=" + xSearch,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                $("#tabledataremark").html(json.tabledataremark);
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga" + xmlHttpRequest.responseText);
            }
        });
    });
}


function doeditremark(edidx) {
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrremark/editrecremark/",
            data: "edidx=" + edidx,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                $("#edidx").val(json.idx);
                $("#edtanggal").val(json.tanggal);
                $("#edremark").val(json.remark);
                $("#edketerangan").val(json.keterangan);

            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga " + xmlHttpRequest.responseText);
            }
        });
    });
}

function doClearremark() {
    $(document).ready(function () {
        $("#edidx").val("0");
        $("#edtanggal").val("");
        $("#edremark").val("");
        $("#edketerangan").val("");

    });
}

function dosimpanremark() {
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrremark/simpanremark/",
            data: "edidx=" + $("#edidx").val() + "&edtanggal=" + $("#edtanggal").val()+ "&edremark=" + $("#edremark").val() + "&edketerangan=" + $("#edketerangan").val(),
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (msg) {
                doClearremark();
                dosearchremark('-99');
                alert("Data Berhasil Disimpan.... ");
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga " + xmlHttpRequest.responseText);
            }
        });
    });
}

function dohapusremark(edidx) {
    if (confirm("Anda yakin Akan menghapus data ?"))
    {
        $(document).ready(function () {
            $.ajax({
                url: getBaseURL() + "index.php/ctrremark/deletetableremark/",
                data: "edidx=" + edidx,
                cache: false,
                dataType: 'json',
                type: 'POST',
                success: function (json) {
                    doClearremark();
                    dosearchremark('-99');
                },
                error: function (xmlHttpRequest, textStatus, errorThrown) {
                    alert("Error juga " + xmlHttpRequest.responseText);
                }
            });
        });
    }
}


dosearchremark(0);

function strpad(val) {
    return (!isNaN(val) && val.toString().length == 1) ? "0" + val : val;
}
function settanggal() {

    $(document).ready(function () {


        var currentTimeAndDate = new Date();
        var Date30 = new Date();
        var date = new Date();
        Date30.setDate(Date30.getDate() - 30);



        var dd = date.getDate();
        var mm = date.getMonth();
        var yy = date.getYear();

        var hh = date.getHours();
        var mnt = date.getMinutes();

        var dd30 = Date30.getDate();


        var mm30 = Date30.getMonth();
        var yy30 = Date30.getYear();

        yy = (yy < 1000) ? yy + 1900 : yy;
        yy30 = (yy30 < 1000) ? yy30 + 1900 : yy30;



        $(".tanggal").datepicker({
            //dateFormat: 'yy-mm-dd'
            dateFormat: 'dd-mm-yy'
        });

        $(".tanggal").val(strpad(dd) + "-" + strpad(mm + 1) + "-" + yy);


    });
}

settanggal();