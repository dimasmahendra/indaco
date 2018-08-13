function dosearchevent(xAwal) {
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
            url: getBaseURL() + "index.php/ctrevent/searchevent/",
            data: "xAwal=" + xAwal + "&xSearch=" + xSearch,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                $("#tabledataevent").html(json.tabledataevent);
                $("#edSearch").val(xSearch);
                $("#edHalaman").html(json.halaman);
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga" + xmlHttpRequest.responseText);
            }
        });
    });
}


function doeditevent(edidx) {
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrevent/editrecevent/",
            data: "edidx=" + edidx,
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                var val = json.artist.split(',');
                $("#edidx").val(json.idx);
                $("#edtitleindo").val(json.title_ind);
                $("#edtitleeng").val(json.title_eng);
                $("#eddescriptionindo").val(json.description_ind);
                $("#eddescriptioneng").val(json.description_eng);
                $("#edidkategori").val(json.kategori);
                $('#edidartist').select2().val(val).trigger('change');
                $('.select2').css("width", "");
                $("#edtanggal").val(json.tanggal);
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga " + xmlHttpRequest.responseText);
            }
        });
    });
}

function doClearevent() {
    $(document).ready(function () {
        $("#edidx").val("");
        $("#edtitleindo").val("");
        $("#edtitleeng").val("");
        $("#eddescriptionindo").val("");
        $("#eddescriptioneng").val("");
        $("#edidkategori").val("");
        $('#edidartist').select2().val("").trigger('change');
        $("#edtanggal").val("");
    });
}

function dosimpanthread() {
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrevent/simpanthread/",
            data: 
                "edidx=" + $("#edidx").val() + 
                "&edtitleindo=" + $("#edtitleindo").val() + 
                "&edtitleeng=" + $("#edtitleeng").val() + 
                "&eddescriptionindo=" + $("#eddescriptionindo").val() + 
                "&eddescriptioneng=" + $("#eddescriptioneng").val() + 
                "&edidkategori=" + $("#edidkategori").val() +
                "&edidartist=" + $("#edidartist").val() +
                "&edtanggal=" + $("#edtanggal").val(),
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (response) {
                console.log(response);
                doClearevent();
                alert("Data Berhasil Disimpan.... ");
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga " + xmlHttpRequest.responseText);
            }
        });
    });
}

function dohapusevent(edidx) {
    if (confirm("Anda yakin Akan menghapus data ?"))
    {
        $(document).ready(function () {
            $.ajax({
                url: getBaseURL() + "index.php/ctrevent/deletetableevent/",
                data: "edidx=" + edidx,
                cache: false,
                dataType: 'json',
                type: 'POST',
                success: function (json) {
                    doClearevent();
                    dosearchevent('-99');
                },
                error: function (xmlHttpRequest, textStatus, errorThrown) {
                    alert("Error juga " + xmlHttpRequest.responseText);
                }
            });
        });
    }
}


dosearchevent(0);
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
                url: getBaseURL() + "index.php/ctrcategoryevent/getlistkategorieventcombo/",
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