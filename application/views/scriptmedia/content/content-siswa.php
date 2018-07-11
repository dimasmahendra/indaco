
<div id="list-siswa" >
<div class="list-siswa" >
<div class="col-md-12">
   
   
    <h3><?php echo $kelas; ?></h3>
    <table class="table table-striped">
        <tr>
        <th>No</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        </tr>
    <?php
    foreach ($modules->result() as $row) {
        ?>
        <tr>
            <td><?php echo $row->NoInduk; ?></td>
            <td><?php echo $row->NamaSiswa; ?></td>
<!--            <td><?php echo $row->Alamat; ?></td>-->
            <td><?php echo $row->namakelas; ?></td>
        </tr>
    <?php } ?>

</table>
        
</div>
</div>
<div id="pagination" class="row col-md-12">
<?php if(isset($pagination))echo $pagination; ?>
</div>
<script>
function dosearchbykelas(){
   // alert($("#edidkelas").val());
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrview/searchbykelas/"+$("#edidkelas").val(),
            data: "",
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                //alert(html(json.tabledatasiswa));
                //$("#list-siswa").html();
                $("#list-siswa").html(json.tabledatasiswa);
                //$("#pagination").html();
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga" + xmlHttpRequest.responseText);
            }
        });
    });
}
</script>
</div>