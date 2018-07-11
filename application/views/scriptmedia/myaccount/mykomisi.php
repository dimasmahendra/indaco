<div class="entry-list">
<h3> Komisi </h3>
<div class="content"><?php echo $data;?></div>
 
</div>
<script>
function dosearchkomisimember(xAwal){ 
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
          url: "<?php echo base_url();?>index.php/ctrmykomisimember/searchkomisimemberbyNIK/", 
          data: "xAwal="+xAwal+"&xSearch="+ $("#edSearch").val()+"&xtglmulai="+$('#edtglmulai').val()+"&xtglakhir="+$('#edtglakhir').val(), 
          cache: false, 
          dataType: 'json', 
          type: 'POST', 
       success: function(json){ 
           $("#tabledatakomisimember").html(json.tabledatakomisimember); 
          }, 
        error: function (xmlHttpRequest, textStatus, errorThrown) { 
              alert("Error juga"+xmlHttpRequest.responseText);  
         } 
         }); 
       }); 
 } 
 dosearchkomisimember(0);
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

//        $(".tanggal").val(strpad(dd) + "-" + strpad(mm + 1) + "-" + yy);
       
     
    });
}

settanggal();
</script>