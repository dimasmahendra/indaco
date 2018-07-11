<div class="list-group">

    <?php
    if(!empty($datatugas)){
     foreach ($datatugas as $xdata) {
        //foreach ($fields as $field){
        ?>

        <div class="well clearfix">
            <div class="row ">
                 <label class="col-sm-4 control-label">Judul Tugas</label><span  class="col-sm-8">: <?php echo $xdata['judultugas']; ?></span>
              </div>
            <div class="row ">
            <label class="col-sm-4 control-label">Nama Guru      </label><span  class="col-sm-8">: <?php echo $xdata['nmguru']; ?></span>
            </div>
            <div class="row ">
                <label class="col-sm-4 control-label">Tanggal Tugas  </label><span  class="col-sm-8">: <?php echo $xdata['tgltugas']; ?></span>
            </div>
            <div class="row ">
                <label class="col-sm-4 control-label">Tanggal Kumpul </label><span  class="col-sm-8">: <?php echo $xdata['tglkumpul']; ?></span>
            </div>
            <div class="row ">
                <label class="col-sm-4 control-label">Keterangan     </label><span  class="col-sm-8">: <?php echo $xdata['keterangan']; ?></span>
            </div>
            <div class="file col-sm-8 col-sm-offset-4 ">
                <a href="<?php echo base_url() . 'resource/uploaded/file/' . $xdata['linkfile']; ?>" width="250" alt="" target="_blank" class="btn btn-danger"/>Downlod File Tugas</a>
            </div>        
            

        </div>


        <?php
        //}
    }
    
     } else {
         
     ?>
        <article class="col-md-4">
            <div class="row entry-box-guru ">
                <section class="entry-summary clearfix">
                    <p>
                       BELUM ADA DATA TUGAS
                    </p>
                </section>
            </div>

        </article>
    <?php }
    
    ?>

</div>
<div class="row col-md-12">
<?php //echo $pagination; ?>
</div>