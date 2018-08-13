<!-- PAGE CONTENT-->
<header class="tentang-header">
	<img class="img-fluid d-none d-lg-block" src="<?php echo base_url(); ?>resource/indaco/img/tentang-kami-header.jpg">
	<img class="img-fluid d-block d-lg-none" src="<?php echo base_url(); ?>resource/indaco/img/tentang-kami-header-mobile.jpg">
</header>
<div class="container-fluid text-white mt-0 mt-lg-4 px-0">
	<div class="container px-0 px-lg-3">
		<div class="row py-5 mx-0">
    	<div class="col-12 col-lg-6 text-justify">
    		<div class="container">
		    	<h3 class="d-none d-lg-block mb-5"><strong><?php echo $sejarah->title ?></strong></h3>
		    	<h4 class="text-center mb-3 d-block d-lg-none"><strong><?php echo $sejarah->title ?></strong></h4>
		    	<?php echo $sejarah->content ?>
		    	<!-- mobile -->
		    	<div class="col px-0 mt-4 pt-4 d-block d-lg-none">
					<h3 class="d-none d-lg-block mb-3"><strong>Visi &amp; Misi</strong></h3>
					<?php echo $visimisi->content ?>

					<div class="pt-3"></div>
					<h3 class="my-3 d-none d-lg-block"><strong>Hymne</strong></h3>
					<h4 class="my-3 text-center d-block d-lg-none"><strong>Hymne</strong></h4>
					<figure class="video-popup video-btn" data-toggle="modal" data-src="<?php echo $hymne->video_url; ?>" data-target="#video-modal">
								<img src="<?php echo $img_url.'/uploaded/img/postcontent/'.$hymne->image; ?>" class="img-fluid">
								<figcaption>
									<img src="<?php echo $img_url.'/indaco/img/play.png' ?>">
								</figcaption>
							</figure>
				</div><!-- /mobile -->
	    	<div class="py-2"></div>
	    	<h3 class="my-5 d-none d-lg-block"><strong>TVC Indaco</strong></h3>
	    	<h4 class="my-3 text-center d-block d-lg-none"><strong>TVC Indaco</strong></h4>
	    	<div id="tvc-slider" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
	    		<?php //print_r($tvc_indaco); ?>
    			<div class="carousel-inner" role="listbox">
    				<?php foreach ($tvc_indaco as $index => $tvc) : ?>
    					<div class="carousel-item <?php echo ($index == 0) ? 'active' : '' ?>">
	    					<figure class="video-popup video-btn" data-toggle="modal" data-src="<?php echo $tvc->video_url ?>" data-target="#video-modal">
								<img src="<?php echo $img_url.'/uploaded/img/postcontent/'.$tvc->image; ?>" class="img-fluid">
								<figcaption>
									<img src="<?php echo $img_url.'/indaco/img/play.png' ?>">
								</figcaption>
							</figure>
	    				</div>
    				<?php endforeach; ?>
    			</div>
    			<div class="tvc-slider-control">
    				<a href="#tvc-slider" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
    			</div>
    		</div>
	    	<h3 class="my-5 d-none d-lg-block text-left">Berikut<strong><br>beberapa proyek</strong><br>yang telah kami kerjakan.</h3>
	    	<h4 class="my-3 text-center d-block d-lg-none">Berikut<br><strong>beberapa proyek</strong><br>yang telah kami kerjakan.</h4>
	    	<div class="py-0 py-lg-2"></div>
	    	<p>Beberapa daftar konstruksi yang telah menggunakan produk-produk Indaco, ada di halaman ini. Temukan semuanya lebih lanjut di sini.</p>
    		</div>
    	</div>
    	<div class="col-12 col-lg-6 text-justify">
    		<div class="container">
					<div class="col d-none d-lg-block">
						<h3 class="mb-5"><strong>Visi &amp; Misi</strong></h3>
						<?php echo $visimisi->content ?>
						<div class="pt-3"></div>
						<h3 class="my-5"><strong>Hymne</strong></h3>							
						<figure class="video-popup video-btn" data-toggle="modal" data-src="<?php echo $hymne->video_url; ?>" data-target="#video-modal">
								<img src="<?php echo $img_url.'/uploaded/img/postcontent/'.$hymne->image; ?>" class="img-fluid">
								<figcaption>
									<img src="<?php echo $img_url.'/indaco/img/play.png' ?>">
								</figcaption>
							</figure>
						
					</div>
				</div>
				<div class="pt-2 pt-lg-5"></div>
				<figure class="lihat-projek ml-2 ml-lg-4 pl-1 pl-lg-2 mt-lg-4">
					<img src="<?php echo base_url(); ?>resource/indaco/img/tentang-proyek-button-bg.png" class="img-fluid">
					<figcaption class="pl-5"><a href="<?php echo site_url( 'proyek' ) ?>"><i class="fa fa-angle-right mr-4"></i> <strong>Lihat Proyek</strong></a></figcaption>
				</figure>
    	</div>
    </div>
	</div>
</div><!-- /container-fluid -->

<!-- VIDEO MODAL -->
<div class="modal fade" id="video-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>        
				<!-- 16:9 aspect ratio -->
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always">></iframe>
				</div>
			</div>
		</div>
	</div>
</div><!-- /video modal -->