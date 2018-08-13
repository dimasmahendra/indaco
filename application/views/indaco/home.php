<!-- HOMEPAGE -->
	<div id="landing" class="scrollsections landing-page">
		<video autoplay preload poster="<?php echo base_url(); ?>resource/uploaded/img/homepage/<?php echo $home_image_1; ?>" style="width:100%;height:100%;object-fit:cover;position:absolute;z-index:1000" id="myvideo" class="embed-responsive">
			<source class="embed-responsive-item" src="<?php echo base_url(); ?>resource/uploaded/img/homepage/<?php echo $home_video_1; ?>" type="video/mp4">
			Your browser does not support HTML5 video.
		</video>
		<video loop preload style="width:100%;height:100%;object-fit:cover;position:absolute;z-index:1000" id="myvideo2" class="embed-responsive">
			<source class="embed-responsive-item" src="<?php echo base_url(); ?>resource/uploaded/img/homepage/<?php echo $home_video_2; ?>" type="video/mp4">
			Your browser does not support HTML5 video.
		</video>
		<div class="splashvid-scroll-button mt-80">
			<a class="btn btn-sm btn-link text-white js-scroll-trigger" href="#belazo"><small>SCROLL KE BAWAH</small><br><i class="fa fa-angle-down bounce"></i></a>
		</div>

		<div class="text-center splashvid-overlay" id="video-content">
			<img class="mb-5" src="<?php echo base_url(); ?>resource/uploaded/img/homepage/<?php echo $home_image_2; ?>">
			<div class="container splashvid-buttons mt-80">
				<div class="row mt-5 d-lg-flex">
					<div class="col d-flex justify-content-center justify-content-lg-start pb-3 pb-lg-0">
						<a href="<?php echo site_url( $link_1 ) ?>" class="btn-indaco">TEMUKAN WARNA ANDA<i class="fa fa-angle-right ml-3"></i></a>
					</div>
					<div class="col d-flex justify-content-center justify-content-lg-end pb-4 pb-lg-0">
						<a href="<?php echo site_url( $link_2 ) ?>" class="btn btn-white float-right">LIHAT <strong>BERITA TERKINI</strong><i class="fa fa-angle-right ml-3"></i></a>
					</div>
				</div>
			</div>
		</div>
    </div>
	
	<section id="top" class="scrollsections" style="height:0px"></section>

	<?php $i = 0; ?>
	<?php foreach ($data as $key => $value) { ?>
		<?php $i++; ?>
    <section id="<?php echo strtolower(str_replace(" ", "", $value['name'])) ?>" class="scrollsections">
        <div class="container pt-80">
            <div class="row">
                <div class="col-lg-4 mx-auto produk-heading produk-txt<?php echo $i ?>">
                    <h1><?php echo strtoupper($value['name']) ?></h1>
                </div>
                <div class="col-lg-4">
                    <img class="produk-img<?php echo $i ?>" src="<?php echo base_url(); ?>resource/uploaded/product_type_img/<?php echo $value['image']; ?>">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 produk-txt<?php echo $i ?> pt-1 pt-lg-0">
                    <h2><?php echo $value['ind_title'] ?></h2>
                    <p class="mt-lg-4"><?php echo $value['ind_description'] ?></p>
                </div>
                <div class="col-lg-4 d-flex">
                    <div class="ml-auto align-self-end">
                        <a class="btn btn-produk<?php echo $i ?> btn-<?php echo strtolower(str_replace(" ", "", $value['name'])) ?>" href="<?php echo base_url(); ?>productDetail/<?php echo $value['id']; ?>">PELAJARI<i class="fa fa-angle-right ml-3"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php  } ?>