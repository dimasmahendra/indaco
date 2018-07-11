  function dosearchmenuutama(xAwal){ 
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
          url: getBaseURL()+"index.php/ctrmenuutama/searchmenuutama/", 
          data: "xAwal="+xAwal+"&xSearch="+xSearch, 
          cache: false, 
          dataType: 'json', 
          type: 'POST', 
       success: function(json){ 
           $("#tabledatamenuutama").html(json.tabledatamenuutama); 
		    $("#edSearch").val(xSearch);
                    $("#edHalaman").html(json.halaman);
          }, 
        error: function (xmlHttpRequest, textStatus, errorThrown) { 
              alert("Error juga"+xmlHttpRequest.responseText);  
         } 
         }); 
       }); 
 } 

    
 function doeditmenuutama(edidx){ 
 $(document).ready(function(){ 
 $.ajax({ 
    url: getBaseURL()+"index.php/ctrmenuutama/editrecmenuutama/", 
   data: "edidx="+edidx, 
  cache: false, 
 dataType: 'json', 
     type: 'POST', 
  success: function(json){ 
       $("#edidx").val(json.idx); 
       $("#edmenu").val(json.menu);
$("#edslug").val(json.slug);
$("#edidparent").val(json.idparent);
$("#edidbahasa").val(json.idbahasa);
$("#edcustomlink").val(json.customlink);
$("#edpenghubungcontent").val(json.penghubungcontent);
$("#edidcontent").val(json.idcontent);

     }, 
 error: function (xmlHttpRequest, textStatus, errorThrown) { 
 alert("Error juga "+xmlHttpRequest.responseText); 
 } 
 }); 
 }); 
 } 
    
function doClearmenuutama(){ 
 $(document).ready(function(){ 
 $("#edidx").val("0"); 
 $("#edmenu").val(""); 
$("#edslug").val(""); 
$("#edidparent").val(""); 
$("#edidbahasa").val(""); 
$("#edcustomlink").val(""); 
$("#edpenghubungcontent").val(""); 
$("#edidcontent").val(""); 
 
  }); 
 } 
 
function dosimpanmenuutama(){ 
         $(document).ready(function(){ 
           $.ajax({ 
                 url: getBaseURL()+"index.php/ctrmenuutama/simpanmenuutama/", 
   data: "edidx="+$("#edidx").val()+"&edmenu="+$("#edmenu").val()+"&edslug="+$("#edslug").val()+"&edidparent="+$("#edidparent").val()+"&edidbahasa="+$("#edidbahasa").val()+"&edcustomlink="+$("#edcustomlink").val()+"&edpenghubungcontent="+$("#edpenghubungcontent").val()+"&edidcontent="+$("#edidcontent").val(), 
                 cache: false, 
                 dataType: 'json', 
                 type: 'POST', 
                 success: function(msg){ 
                     doClearmenuutama(); 
                     dosearchmenuutama('-99'); 
                         alert("Data Berhasil Disimpan.... "); 
                 }, 
               error: function (xmlHttpRequest, textStatus, errorThrown) { 
                         alert("Error juga "+xmlHttpRequest.responseText); 
               } 
           }); 
         }); 
         } 
  
function dohapusmenuutama(edidx){ 
         if (confirm("Anda yakin Akan menghapus data ?")) 
     { 
         $(document).ready(function(){ 
           $.ajax({ 
                 url: getBaseURL()+"index.php/ctrmenuutama/deletetablemenuutama/", 
                 data: "edidx="+edidx, 
                 cache: false, 
                 dataType: 'json', 
                 type: 'POST', 
                 success: function(json){ 
                    doClearmenuutama(); 
                    dosearchmenuutama('-99'); 
                 }, 
               error: function (xmlHttpRequest, textStatus, errorThrown) { 
                         alert("Error juga "+xmlHttpRequest.responseText); 
               } 
           }); 
         }); 
        } 
        } 


     dosearchmenuutama(0); 
function queryParams() {
    return {
        type: 'owner',
        sort: 'idx',
        direction: 'desc',
        per_page: 1000,
        page: 1
    };
}
  