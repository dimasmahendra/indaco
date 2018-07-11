function dosearchpage(xAwal) {
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
            url: getBaseURL() + "index.php/ctrpage/searchpage/",
            data: "xAwal=" + xAwal + "&xSearch=" + xSearch,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                $("#tabledatapage").html(json.tabledatapage);
                $("#edSearch").val(xSearch);
                $("#edHalaman").html(json.halaman);
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga" + xmlHttpRequest.responseText);
            }
        });
    });
}


function doeditpage(edidx) {
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrpage/editrecpage/",
            data: "edidx=" + edidx,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                $("#edidx").val(json.idx);
                $("#edtitle").val(json.title);
                $("#eddescription").val(json.description);
                $("#eddate").val(json.date);
                $('.previewimageedimage').attr({"src": getBaseURL() + "resource/uploaded/img/" + json.image});
                $("#edimage").val(json.image);
                $("#edistampil").val(json.istampil);
                $("#edkeyword").val(json.keyword);
                $("#edidmetatag").val(json.idmetatag);
                $("#edidkategoripage").val(json.idkategoripage);
                $("#edidbahasa").val(json.idbahasa);
                $("#edidimage").val(json.idimage);
                $("#edupdate").val(json.update);
                $("#ediduser").val(json.iduser);

            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga " + xmlHttpRequest.responseText);
            }
        });
    });
}

function doClearpage() {
    $(document).ready(function () {
        $("#edidx").val("0");
        $("#edtitle").val("");
        $("#eddescription").val("");
        $("#eddate").val("");
        $('.previewimageedimage').attr({"src": ""});
        
        $("#edimage").val("");
        $("#edistampil").val("");
        $("#edkeyword").val("");
        $("#edidmetatag").val("");
        $("#edidkategoripage").val("");
        $("#edidbahasa").val("");
        $("#edidimage").val("");
        $("#edupdate").val("");
        $("#ediduser").val("");

    });
}

function dosimpanpage() {
    var xcheck = ($("#edistampil").checked)?'Y':'N';
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrpage/simpanpage/",
            data: "edidx=" + $("#edidx").val() + "&edtitle=" + $("#edtitle").val() + "&eddescription=" + $("#eddescription").val() + "&eddate=" + $("#eddate").val() + "&edimage=" + $("#edimage").val() + "&edistampil=" + xcheck + "&edkeyword=" + $("#edkeyword").val() + "&edidmetatag=" + $("#edidmetatag").val() + "&edidkategoripage=" + $("#edidkategoripage").val() + "&edidbahasa=" + $("#edidbahasa").val() + "&edidimage=" + $("#edidimage").val() + "&edupdate=" + $("#edupdate").val() + "&ediduser=" + $("#ediduser").val(),
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (msg) {
                doClearpage();
                dosearchpage('-99');
                alert("Data Berhasil Disimpan.... ");
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga " + xmlHttpRequest.responseText);
            }
        });
    });
}

function dohapuspage(edidx) {
    if (confirm("Anda yakin Akan menghapus data ?"))
    {
        $(document).ready(function () {
            $.ajax({
                url: getBaseURL() + "index.php/ctrpage/deletetablepage/",
                data: "edidx=" + edidx,
                cache: false,
                dataType: 'json',
                type: 'POST',
                success: function (json) {
                    doClearpage();
                    dosearchpage('-99');
                },
                error: function (xmlHttpRequest, textStatus, errorThrown) {
                    alert("Error juga " + xmlHttpRequest.responseText);
                }
            });
        });
    }
}


dosearchpage(0);
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
    $('#edkeyword').tagsinput({
        tagClass: function (item) {
            return (item.length > 10 ? 'big' : 'small');
        }
    });
});
function autotag() {
    $(document).ready(function () {
        $("#edkeyword").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: getBaseURL() + "index.php/ctrmetatag/getArraylistmetatag/",
//                    term: extractLast( request.term ),
                    data: "edkeyword=" + extractLast($("#edkeyword").val()),
                    dataType: "json",
                    cache: false,
                    type: "POST",
                    success: function (json) {
                        response($.map(json.data, function (item) {

                            return {
                                label: item.label,
                                value: item.label,
                                idx: item.value
                            }
                        }))
                    },
                    error: function (xmlHttpRequest, textStatus, errorThrown) {
                        alert("Error juga " + xmlHttpRequest.responseText);
                    }
                });
            },
            search: function () {
                // custom minLength
                var term = extractLast(this.value);
                if (term.length < 2) {
                    return false;
                }
            },
            focus: function () {
                // prevent value inserted on focus
                return false;
            },
            select: function (event, ui) {
                var terms = split(this.value);
                // remove the current input
                terms.pop();
                // add the selected item
                terms.push(ui.item.value);
                // add placeholder to get the comma-and-space at the end
                terms.push("");
                this.value = terms.join(", ");
                return false;
            },
            change: function (event, ui) {
            }
        });
    });
}
function split(val) {
    return val.split(/,\s*/);
}
function extractLast(term) {
    return split(term).pop();
}
function loadkategori(){
    $(document).ready(function () {
            $.ajax({
                url: getBaseURL() + "index.php/ctrkategori/getlistkategoricombo/",
                data: "",
                cache: false,
                dataType: 'json',
                type: 'POST',
                success: function (json) {
                    $("#showkategori").html(json.data);
                },
                error: function (xmlHttpRequest, textStatus, errorThrown) {
                    alert("Error juga " + xmlHttpRequest.responseText);
                }
            });
        });
   
}
loadkategori();
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



        $(".date").datepicker({
            //dateFormat: 'yy-mm-dd'
            dateFormat: 'dd-mm-yy'
        });

        $(".date").val(strpad(dd) + "-" + strpad(mm + 1) + "-" + yy);


    });
}

settanggal();
function preview(xurl) {
    $("#loading").css('display', 'block');
    $(document).ready(function () {
        $('#showmodal img').attr('src', getBaseURL() + 'resource/uploaded/img/' + xurl + '?' + new Date().getTime());
        $('#showmodal').modal('show');
        $("#loading").css('display', 'none');
    });
}