function dosimpanabout() {
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrabout/simpanabout/",
            data:
            	"edidx=" + $("#edidx").val() + 
            	"&eddescriptionindonesia=" + $("#eddescriptionindonesia").val() + 
	            "&eddescriptionenglish=" + $("#eddescriptionenglish").val(),
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (response) {
                console.log(response);
                alert("Data Berhasil Disimpan.... ");
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga " + xmlHttpRequest.responseText);
            }
        });
    });
}