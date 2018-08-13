<section id="top" class="scrollsections" style="height:0px"></section>

<?php 

foreach ($data as $key => $value) { ?>
    <section id="<?php echo strtolower(str_replace(" ", "", $value['name'])) ?>" class="scrollsections">
        <div class="container pt-80">
            <div id="panel-<?php echo strtolower(str_replace(" ", "", $value['name'])) ?>" class="row">
                <div class="col-lg-4 mx-auto produk-heading produk-txt<?php echo $key + 1 ?>a">
                    <h1 class="mt-5 mt-lg-0"><?php echo strtoupper($value['name']) ?></h1>
                </div>
                <div class="col-lg-4">
                    <img class="produk-img<?php echo ($key == 0 ? '' : ($key + 1).'a') ?>" src="<?php echo base_url(); ?>resource/uploaded/product_type_img/<?php echo $value['image']; ?>">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 pt-1 pt-lg-0 produk-txt<?php echo $key + 1 ?>a">
                    <h2><?php echo $value['ind_title'] ?></h2>
                    <p class="mt-lg-4"><?php echo $value['ind_description'] ?></p>
                </div>
                <div class="col-lg-4 d-flex">
                    <div class="ml-auto align-self-end">
                        <a class="btn btn-produk btn-produk<?php echo $key + 1 ?>a btn-<?php echo strtolower(str_replace(" ", "", $value['name'])) ?>" href="<?php echo base_url(); ?>productDetail/<?php echo $value['id']; ?>">PELAJARI<i class="fa fa-angle-right ml-3"></i></a></div>
                    </div>
                </div>
            </div>
        </section>
    <?php  } ?>