  function dosearchpublishing(xAwal){ 
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
          url: getBaseURL()+"index.php/ctrpublishing/searchpublishing/", 
          data: "xAwal="+xAwal+"&xSearch="+xSearch, 
          cache: false, 
          dataType: 'json', 
          type: 'POST', 
       success: function(json){ 
           $("#tabledatapublishing").html(json.tabledatapublishing); 
		    $("#edSearch").val(xSearch);
                    $("#edHalaman").html(json.halaman);
          }, 
        error: function (xmlHttpRequest, textStatus, errorThrown) { 
              alert("Error juga"+xmlHttpRequest.responseText);  
         } 
         }); 
       }); 
 } 

    
 function doeditpublishing(edidx){ 
 $(document).ready(function(){ 
 $.ajax({ 
    url: getBaseURL()+"index.php/ctrpublishing/editrecpublishing/", 
   data: "edidx="+edidx, 
  cache: false, 
 dataType: 'json', 
     type: 'POST', 
  success: function(json){ 
       $("#edidx").val(json.idx); 
       $("#edtitle").val(json.title);
$("#eddescription").val(json.description);
$("#edkeyword").val(json.keyword);
$("#edidmetatag").val(json.idmetatag);
$("#edimage").val(json.image);
$("#edvideo").val(json.video);
$("#edaudio").val(json.audio);
$("#edpdf").val(json.pdf);
$("#edupdate").val(json.update);
$("#ediduser").val(json.iduser);
$("#edidimage").val(json.idimage);

     }, 
 error: function (xmlHttpRequest, textStatus, errorThrown) { 
 alert("Error juga "+xmlHttpRequest.responseText); 
 } 
 }); 
 }); 
 } 
    
function doClearpublishing(){ 
 $(document).ready(function(){ 
 $("#edidx").val("0"); 
 $("#edtitle").val(""); 
$("#eddescription").val(""); 
$("#edkeyword").val(""); 
$("#edidmetatag").val(""); 
$("#edimage").val(""); 
$("#edvideo").val(""); 
$("#edaudio").val(""); 
$("#edpdf").val(""); 
$("#edupdate").val(""); 
$("#ediduser").val(""); 
$("#edidimage").val(""); 
 
  }); 
 } 
 
function dosimpanpublishing(){ 
         $(document).ready(function(){ 
           $.ajax({ 
                 url: getBaseURL()+"index.php/ctrpublishing/simpanpublishing/", 
   data: "edidx="+$("#edidx").val()+"&edtitle="+$("#edtitle").val()+"&eddescription="+$("#eddescription").val()+"&edkeyword="+$("#edkeyword").val()+"&edidmetatag="+$("#edidmetatag").val()+"&edimage="+$("#edimage").val()+"&edvideo="+$("#edvideo").val()+"&edaudio="+$("#edaudio").val()+"&edpdf="+$("#edpdf").val()+"&edupdate="+$("#edupdate").val()+"&ediduser="+$("#ediduser").val()+"&edidimage="+$("#edidimage").val(), 
                 cache: false, 
                 dataType: 'json', 
                 type: 'POST', 
                 success: function(msg){ 
                     doClearpublishing(); 
                     dosearchpublishing('-99'); 
                         alert("Data Berhasil Disimpan.... "); 
                 }, 
               error: function (xmlHttpRequest, textStatus, errorThrown) { 
                         alert("Error juga "+xmlHttpRequest.responseText); 
               } 
           }); 
         }); 
         } 
  
function dohapuspublishing(edidx){ 
         if (confirm("Anda yakin Akan menghapus data ?")) 
     { 
         $(document).ready(function(){ 
           $.ajax({ 
                 url: getBaseURL()+"index.php/ctrpublishing/deletetablepublishing/", 
                 data: "edidx="+edidx, 
                 cache: false, 
                 dataType: 'json', 
                 type: 'POST', 
                 success: function(json){ 
                    doClearpublishing(); 
                    dosearchpublishing('-99'); 
                 }, 
               error: function (xmlHttpRequest, textStatus, errorThrown) { 
                         alert("Error juga "+xmlHttpRequest.responseText); 
               } 
           }); 
         }); 
        } 
        } 


     dosearchpublishing(0); 
function queryParams() {
    return {
        type: 'owner',
        sort: 'idx',
        direction: 'desc',
        per_page: 1000,
        page: 1
    };
}
  