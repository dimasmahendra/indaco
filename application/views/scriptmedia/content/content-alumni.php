<div id="list-siswa" ><div class="list-siswa">
<div class="col-md-12">

    <table class="table table-striped">
        <tr>
        <th>No.</th>
        <th>Nama Siswa</th>
        <th>Tanggal Lulus</th>
        </tr>
    <?php
    $i=1;
    foreach ($modules->result() as $module) {
        //foreach ($fields as $field){

        ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $module->NamaSiswa; ?></td>
            <td><?php echo $module->TglLulus; ?></td>
        </tr>
    <?php } ?>

</table>
</div>
</div>
<div  id="pagination" class="row col-md-12">
<?php echo $pagination; ?>
</div>
<script>
function dosearchbytahun(){
    //alert($("#edidtahun").val());
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrview/searchbytahun/"+$("#edidtahun").val(),
            data: "",
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                //alert(html(json.tabledatasiswa));
                //$("#list-siswa").html();
                $("#list-siswa").html(json.tabledatasiswa);
                //$("#pagination").html(json.pagination);
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                alert("Error juga" + xmlHttpRequest.responseText);
            }
        });
    });
}
</script>
</div>