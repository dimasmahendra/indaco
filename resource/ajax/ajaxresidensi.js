  function dosearchresidensi(xAwal){ 
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
          url: getBaseURL()+"index.php/ctrresidensi/searchresidensi/", 
          data: "xAwal="+xAwal+"&xSearch="+xSearch, 
          cache: false, 
          dataType: 'json', 
          type: 'POST', 
       success: function(json){ 
           $("#tabledataresidensi").html(json.tabledataresidensi); 
		    $("#edSearch").val(xSearch);
                    $("#edHalaman").html(json.halaman);
          }, 
        error: function (xmlHttpRequest, textStatus, errorThrown) { 
              alert("Error juga"+xmlHttpRequest.responseText);  
         } 
         }); 
       }); 
 } 

    
 function doeditresidensi(edidx){ 
 $(document).ready(function(){ 
 $.ajax({ 
    url: getBaseURL()+"index.php/ctrresidensi/editrecresidensi/", 
   data: "edidx="+edidx, 
  cache: false, 
 dataType: 'json', 
     type: 'POST', 
  success: function(json){ 
       $("#edidx").val(json.idx); 
       $("#edtitle").val(json.title);
$("#eddescription").val(json.description);
$("#eddatestart").val(json.datestart);
$("#eddateend").val(json.dateend);
$("#edimage").val(json.image);
$("#edistampil").val(json.istampil);
$("#edkeyword").val(json.keyword);
$("#edidartist").val(json.idartist);
$("#edidmetatag").val(json.idmetatag);
$("#edidbahasa").val(json.idbahasa);
$("#edidimage").val(json.idimage);
$("#edupdate").val(json.update);
$("#ediduser").val(json.iduser);

     }, 
 error: function (xmlHttpRequest, textStatus, errorThrown) { 
 alert("Error juga "+xmlHttpRequest.responseText); 
 } 
 }); 
 }); 
 } 
    
function doClearresidensi(){ 
 $(document).ready(function(){ 
 $("#edidx").val("0"); 
 $("#edtitle").val(""); 
$("#eddescription").val(""); 
$("#eddatestart").val(""); 
$("#eddateend").val(""); 
$("#edimage").val(""); 
$("#edistampil").val(""); 
$("#edkeyword").val(""); 
$("#edidartist").val(""); 
$("#edidmetatag").val(""); 
$("#edidbahasa").val(""); 
$("#edidimage").val(""); 
$("#edupdate").val(""); 
$("#ediduser").val(""); 
 
  }); 
 } 
 
function dosimpanresidensi(){ 
         $(document).ready(function(){ 
           $.ajax({ 
                 url: getBaseURL()+"index.php/ctrresidensi/simpanresidensi/", 
   data: "edidx="+$("#edidx").val()+"&edtitle="+$("#edtitle").val()+"&eddescription="+$("#eddescription").val()+"&eddatestart="+$("#eddatestart").val()+"&eddateend="+$("#eddateend").val()+"&edimage="+$("#edimage").val()+"&edistampil="+$("#edistampil").val()+"&edkeyword="+$("#edkeyword").val()+"&edidartist="+$("#edidartist").val()+"&edidmetatag="+$("#edidmetatag").val()+"&edidbahasa="+$("#edidbahasa").val()+"&edidimage="+$("#edidimage").val()+"&edupdate="+$("#edupdate").val()+"&ediduser="+$("#ediduser").val(), 
                 cache: false, 
                 dataType: 'json', 
                 type: 'POST', 
                 success: function(msg){ 
                     doClearresidensi(); 
                     dosearchresidensi('-99'); 
                         alert("Data Berhasil Disimpan.... "); 
                 }, 
               error: function (xmlHttpRequest, textStatus, errorThrown) { 
                         alert("Error juga "+xmlHttpRequest.responseText); 
               } 
           }); 
         }); 
         } 
  
function dohapusresidensi(edidx){ 
         if (confirm("Anda yakin Akan menghapus data ?")) 
     { 
         $(document).ready(function(){ 
           $.ajax({ 
                 url: getBaseURL()+"index.php/ctrresidensi/deletetableresidensi/", 
                 data: "edidx="+edidx, 
                 cache: false, 
                 dataType: 'json', 
                 type: 'POST', 
                 success: function(json){ 
                    doClearresidensi(); 
                    dosearchresidensi('-99'); 
                 }, 
               error: function (xmlHttpRequest, textStatus, errorThrown) { 
                         alert("Error juga "+xmlHttpRequest.responseText); 
               } 
           }); 
         }); 
        } 
        } 


     dosearchresidensi(0); 
function queryParams() {
    return {
        type: 'owner',
        sort: 'idx',
        direction: 'desc',
        per_page: 1000,
        page: 1
    };
}
  