<h1 class="title-content ml-4"><?php echo $detailproduk->Judul; ?></h1>
<input id="edidproduk" type="hidden" value="<?php echo $idproduk;?>" />
<div class="primary-content row">

    <div class="col-md-9 row">
        <div class="col-md-6">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo base_url() . 'resource/uploaded/img/' . $this->basemodel->showimage($detailproduk->image1, 'medium'); ?> " class="image img-fluid" style="float:left;padding:10px"/>

                    </div>

                    <div class="carousel-item">
                        <img src="<?php echo base_url() . 'resource/uploaded/img/' . $this->basemodel->showimage($detailproduk->image1, 'medium'); ?> " class="image img-fluid" style="float:left;padding:10px"/>

                    </div>

                    <div class="carousel-item">
                        <img src="<?php echo base_url() . 'resource/uploaded/img/' . $this->basemodel->showimage($detailproduk->image1, 'medium'); ?> " class="image img-fluid" style="float:left;padding:10px"/>

                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="listthumbdetail d-none d-sm-block px-2">
                <?php if (!empty($detailproduk->image1)) { ?>
                    <div class="w-25 d-inline-block">
                        <a href="#" data-target="#myCarousel" data-slide-to="0" >
                            <img src="<?php echo base_url() . 'resource/uploaded/img/' . $this->basemodel->showimage($detailproduk->image1, 'thumb'); ?> " class="image img-fluid" />
                        </a>
                    </div>
                <?php } ?>
                <?php if (!empty($detailproduk->image2)) { ?>
                    <div class="w-25 d-inline-block">
                        <a href="#" data-target="#myCarousel" data-slide-to="1" >
                            <img src="<?php echo base_url() . 'resource/uploaded/img/' . $this->basemodel->showimage($detailproduk->image2, 'thumb'); ?> " class="image img-fluid" />
                        </a>
                    </div>
                <?php } ?>
                <?php if (!empty($detailproduk->image3)) { ?>
                    <div class="w-25 d-inline-block">
                        <a href="#" data-target="#myCarousel" data-slide-to="2" >
                            <img src="<?php echo base_url() . 'resource/uploaded/img/' . $this->basemodel->showimage($detailproduk->image3, 'thumb'); ?> " class="image img-fluid" />
                        </a>
                    </div>
                <?php } ?>

            </div>
            
        </div>
        <div class="col-md-6 pt-2">
            <div class="btn btn-detail detailharga">Rp. <?php echo number_format($detailproduk->harga, '0', ',', '.') ?></div>
            <div class="deskripsi"><?php echo $detailproduk->Deskripsi; ?></div>
        </div>

    </div>

    <div class="col-md-3">
        <?php echo $sidebar; ?>
    </div>

</div>
<div class="clearfix"></div>
<?php echo $relatedproperti; ?>
<div id="modalform" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pendaftaran Survey Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo $formsurvey; ?>
        </div>
    </div>
</div>


<div class="clearfix"></div>




