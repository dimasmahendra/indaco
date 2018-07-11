<div id="list-guru">
<div class="list-guru">

    <?php
    foreach ($modules->result() as $module) {
        ?>

        <article class="col-md-6">
            <div class="row entry-box-guru ">
                <?php if (isset($module->foto)) {
                    if (!empty($module->foto)) { ?><a href="<?php echo '/'; ?>" title="">
                            <img class="img-thumbnail img-fluid" src="<?php echo base_url() . 'resource/uploaded/img/' . $module->foto; ?>" width="150" alt=""/></a><!-- .entry-asset -->
        <?php }
    } ?>

                <section class="entry-summary clearfix">
                    <p>
                        Nama : <?php echo $module->NamaGuru; ?><br />
                        <!--Email : <?php // echo $module->Email; ?><br />-->
                        Bidang Studi : <?php echo $module->idmapel; ?><br />
                        Jabatan : <?php echo $module->jabatanstruktural; ?><br />
                        
                    </p>
                </section>
            </div>

        </article>


        <?php
        //}
    }
    ?>

</div>
<div class="row col-md-12">
<?php echo $pagination; ?>
</div>
<script>
function dosearchbystaf(){
   // alert($("#edidkelas").val());
    $(document).ready(function () {
        $.ajax({
            url: getBaseURL() + "index.php/ctrview/searchbystaf/"+$("#edidstaf").val(),
            data: "",
            cache: false,
            dataType: 'json',
            type: 'POST',
            success: function (json) {
                //alert(html(json.tabledatasiswa));
                //$("#list-siswa").html();
                $("#list-guru").html(json.tabledatasiswa);
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