  function dosearchimagemanager(xAwal){ 
   xSearch =""; 
    try 
        {             if ($("#edSearch").val()!=""){ 
              xSearch = $("#edSearch").val();
        } 
         }catch(err){ 
          xSearch =""; 
         } 
   if (typeof(xSearch) =="undefined"){ 
     xSearch =""; 
    } 
  $(document).ready(function(){ 
  $.ajax({ 
          url: getBaseURL()+"index.php/ctrimagemanager/searchimagemanager/", 
          data: "xAwal="+xAwal+"&xSearch="+xSearch, 
          cache: false, 
          dataType: 'json', 
          type: 'POST', 
       success: function(json){ 
           $("#tabledataimagemanager").html(json.tabledataimagemanager); 
		    $("#edSearch").val(xSearch);
                    $("#edHalaman").html(json.halaman);
          }, 
        error: function (xmlHttpRequest, textStatus, errorThrown) { 
              alert("Error juga"+xmlHttpRequest.responseText);  
         } 
         }); 
       }); 
 } 

    
 function doeditimagemanager(edidx){ 
 $(document).ready(function(){ 
 $.ajax({ 
    url: getBaseURL()+"index.php/ctrimagemanager/editrecimagemanager/", 
   data: "edidx="+edidx, 
  cache: false, 
 dataType: 'json', 
     type: 'POST', 
  success: function(json){ 
       $("#edidx").val(json.idx); 
       $("#edimage").val(json.image);
$("#edtitle").val(json.title);
$("#eddescription").val(json.description);
$("#edalt").val(json.alt);
$("#edupdate").val(json.update);

     }, 
 error: function (xmlHttpRequest, textStatus, errorThrown) { 
 alert("Error juga "+xmlHttpRequest.responseText); 
 } 
 }); 
 }); 
 } 
    
function doClearimagemanager(){ 
 $(document).ready(function(){ 
 $("#edidx").val("0"); 
 $("#edimage").val(""); 
$("#edtitle").val(""); 
$("#eddescription").val(""); 
$("#edalt").val(""); 
$("#edupdate").val(""); 
 
  }); 
 } 
 
function dosimpanimagemanager(){ 
         $(document).ready(function(){ 
           $.ajax({ 
                 url: getBaseURL()+"index.php/ctrimagemanager/simpanimagemanager/", 
   data: "edidx="+$("#edidx").val()+"&edimage="+$("#edimage").val()+"&edtitle="+$("#edtitle").val()+"&eddescription="+$("#eddescription").val()+"&edalt="+$("#edalt").val()+"&edupdate="+$("#edupdate").val(), 
                 cache: false, 
                 dataType: 'json', 
                 type: 'POST', 
                 success: function(msg){ 
                     doClearimagemanager(); 
                     dosearchimagemanager('-99'); 
                         alert("Data Berhasil Disimpan.... "); 
                 }, 
               error: function (xmlHttpRequest, textStatus, errorThrown) { 
                         alert("Error juga "+xmlHttpRequest.responseText); 
               } 
           }); 
         }); 
         } 
  
function dohapusimagemanager(edidx){ 
         if (confirm("Anda yakin Akan menghapus data ?")) 
     { 
         $(document).ready(function(){ 
           $.ajax({ 
                 url: getBaseURL()+"index.php/ctrimagemanager/deletetableimagemanager/", 
                 data: "edidx="+edidx, 
                 cache: false, 
                 dataType: 'json', 
                 type: 'POST', 
                 success: function(json){ 
                    doClearimagemanager(); 
                    dosearchimagemanager('-99'); 
                 }, 
               error: function (xmlHttpRequest, textStatus, errorThrown) { 
                         alert("Error juga "+xmlHttpRequest.responseText); 
               } 
           }); 
         }); 
        } 
        } 


     dosearchimagemanager(0); 
function queryParams() {
    return {
        type: 'owner',
        sort: 'idx',
        direction: 'desc',
        per_page: 1000,
        page: 1
    };
}
  