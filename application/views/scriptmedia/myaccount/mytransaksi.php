<div class="entry-list">
<h3> Transaksi </h3>
<div class="content"><?php echo $data;?></div>
 
</div>
<script>
function dosearchtransaksibyNIK(xAwal){ 
   $(document).ready(function(){ 
  $.ajax({ 
          url: "<?php echo base_url();?>index.php/ctrmytransaksi/searchtransaksibyNIK/", 
          data: "xAwal="+xAwal+"&xSearch="+ $("#edSearch").val()+"&xtglmulai="+$('#edtglmulai').val()+"&xtglakhir="+$('#edtglakhir').val(), 
          cache: false, 
          dataType: 'json', 
          type: 'POST', 
       success: function(json){ 
           $("#tabledatatransaksi").html(json.tabledatatransaksi); 
          }, 
        error: function (xmlHttpRequest, textStatus, errorThrown) { 
              alert("Error juga"+xmlHttpRequest.responseText);  
         } 
         }); 
       }); 
 } 

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