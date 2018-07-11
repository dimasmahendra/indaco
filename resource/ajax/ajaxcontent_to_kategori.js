  function dosearchcontent_to_kategori(xAwal){ 
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
          url: getBaseURL()+"index.php/ctrcontent_to_kategori/searchcontent_to_kategori/", 
          data: "xAwal="+xAwal+"&xSearch="+xSearch, 
          cache: false, 
          dataType: 'json', 
          type: 'POST', 
       success: function(json){ 
           $("#tabledatacontent_to_kategori").html(json.tabledatacontent_to_kategori); 
		    $("#edSearch").val(xSearch);
                    $("#edHalaman").html(json.halaman);
          }, 
        error: function (xmlHttpRequest, textStatus, errorThrown) { 
              alert("Error juga"+xmlHttpRequest.responseText);  
         } 
         }); 
       }); 
 } 

    
 function doeditcontent_to_kategori(edidx){ 
 $(document).ready(function(){ 
 $.ajax({ 
    url: getBaseURL()+"index.php/ctrcontent_to_kategori/editreccontent_to_kategori/", 
   data: "edidx="+edidx, 
  cache: false, 
 dataType: 'json', 
     type: 'POST', 
  success: function(json){ 
       $("#edidx").val(json.idx); 
       $("#edidcontent").val(json.idcontent);
$("#edidkategori").val(json.idkategori);
$("#edurut").val(json.urut);

     }, 
 error: function (xmlHttpRequest, textStatus, errorThrown) { 
 alert("Error juga "+xmlHttpRequest.responseText); 
 } 
 }); 
 }); 
 } 
    
function doClearcontent_to_kategori(){ 
 $(document).ready(function(){ 
 $("#edidx").val("0"); 
 $("#edidcontent").val(""); 
$("#edidkategori").val(""); 
$("#edurut").val(""); 
 
  }); 
 } 
 
function dosimpancontent_to_kategori(){ 
         $(document).ready(function(){ 
           $.ajax({ 
                 url: getBaseURL()+"index.php/ctrcontent_to_kategori/simpancontent_to_kategori/", 
   data: "edidx="+$("#edidx").val()+"&edidcontent="+$("#edidcontent").val()+"&edidkategori="+$("#edidkategori").val()+"&edurut="+$("#edurut").val(), 
                 cache: false, 
                 dataType: 'json', 
                 type: 'POST', 
                 success: function(msg){ 
                     doClearcontent_to_kategori(); 
                     dosearchcontent_to_kategori('-99'); 
                         alert("Data Berhasil Disimpan.... "); 
                 }, 
               error: function (xmlHttpRequest, textStatus, errorThrown) { 
                         alert("Error juga "+xmlHttpRequest.responseText); 
               } 
           }); 
         }); 
         } 
  
function dohapuscontent_to_kategori(edidx){ 
         if (confirm("Anda yakin Akan menghapus data ?")) 
     { 
         $(document).ready(function(){ 
           $.ajax({ 
                 url: getBaseURL()+"index.php/ctrcontent_to_kategori/deletetablecontent_to_kategori/", 
                 data: "edidx="+edidx, 
                 cache: false, 
                 dataType: 'json', 
                 type: 'POST', 
                 success: function(json){ 
                    doClearcontent_to_kategori(); 
                    dosearchcontent_to_kategori('-99'); 
                 }, 
               error: function (xmlHttpRequest, textStatus, errorThrown) { 
                         alert("Error juga "+xmlHttpRequest.responseText); 
               } 
           }); 
         }); 
        } 
        } 


     dosearchcontent_to_kategori(0); 
function queryParams() {
    return {
        type: 'owner',
        sort: 'idx',
        direction: 'desc',
        per_page: 1000,
        page: 1
    };
}
  