<div class="container-fluid bg-white mt-80">
	<!-- produk -->
	<div class="row produk-wrapper pt-4 pb-3">
   		<div class="col-12 col-lg-11 mx-auto mt-1 mt-lg-4">
   		<!-- produk-slider -->
	   	<div id="produk-slider" class="carousel slide" data-ride="carousel" data-interval="false">	    	
	   		<!-- indicators -->
	   		<div class="col-3 text-center d-none d-lg-block">
	   			<div class="produk-indicator">
	   				<button type="button" id="scroll-up-0" class="btn btn-link seri-produk-up"><span class="fa fa-angle-up"></span></button>
	   				<div class="seri-produk scrolly-0">
	   					<ul class="list-group carousel-indicators">
	   						<?php 
	   							foreach ($data as $key => $value) { ?>
	   								<li data-target="#produk-slider" data-slide-to="0" class="list-group-item borderless row active">
			   							<img src="<?php echo base_url(); ?>resource/uploaded/img/product_images/<?php echo $value['image']; ?>">
			   						</li>
	   						<?php	}
	   						?>
	   					</ul>
	   				</div>
	   				<button type="button" id="scroll-down-0" class="btn btn-link seri-produk-down"><span class="fa fa-angle-down"></span></button>
	   			</div>
	   		</div>
				  
			<div class="carousel-inner">				  
				<?php 
					$zx = 0;
					foreach ($data as $key => $value) { ?>
						<?php $zx++ ?>
						<?php
							$keunggulanicons_class = '';
							if ($value['name'] == 'Alkali Sealer')
								$keunggulanicons_class = 'alkali';
						?>
						<div class="carousel-item <?php echo ($zx == 1) ? "active" : null ;  ?>">
							<div class="produk-caption-holder <?php echo $value['class']; ?>">
								<img class="kemasan d-none d-lg-block" src="<?php echo base_url(); ?>resource/uploaded/img/product_images/<?php echo $value['image']; ?>">
								<div class="carousel-caption mCustomScrollbar">
									<p class="lead mt-lg-4"><?php echo $value['type_title']; ?></p>
									<img class="kemasan d-block d-lg-none" src="<?php echo base_url(); ?>resource/uploaded/img/product_images/<?php echo $value['image']; ?>">
									<h2 class="produk-title"><strong><?php echo $value['name']; ?></strong><br></h2>
									<p class="text-justify mt-3 mt-lg-5"><?php echo $value['ind_description']; ?></p>
								</div>
							</div>
							<div class="keunggulan-icons <?php echo $keunggulanicons_class ?>">
								<div class="row text-center text-white mx-2 mx-lg-5 px-lg-4">
									<?php 
										foreach ($value['features_id'] as $index => $val) { ?>
											<div class="col px-0">
												<figure class="keunggulan">
													<img src="<?php echo base_url(); ?>resource/uploaded/img/feature/<?php echo $val['image']; ?>">
													<figcaption>
														<p><strong><?php echo $val['ind_name']; ?></strong><br><?php echo $val['ind_description']; ?></p>
													</figcaption>
												</figure>
											</div>
									<?php } ?>
								</div>
							</div>

							<div class="container px-0 px-lg-3">
								<div class="col-12 col-lg-9 float-none float-lg-right my-5 palet-container">

									<?php if(!empty($value['color'])) { ?>
										<div class="palet-wrapper">    			
										<div class="container px-0">
											<div class="row justify-content-center mt-4 mt-lg-5 mb-3 mb-lg-4">
												<div class="col-12 col-lg-6 px-0 text-center text-lg-right">
													<h2 class="mr-lg-5">Pilihan <strong>Warna</strong></h2>
												</div>
												<div class="col-12 col-lg-6 px-0">
													<a href="<?php echo site_url( 'inspirasi' ) ?>" class="btn-indaco mt-2 mt-lg-0">TEMUKAN INSPIRASI ANDA<i class="fa fa-angle-right ml-2"></i></a>
												</div>
											</div>

											<button type="button" id="scroll-up-1" class="btn btn-link palet-scroll-up"><span class="fa fa-angle-up"></span></button>

											<div class="palet-holder scrolly-1">
												<ul class="list-group warna">
													<?php
													$i = 0;
														foreach ($value['color'] as $kunci => $nilai) { ?>
															<?php $i++ ?>
															<?php if ($i == 1) : ?>
																<li class="list-group-item borderless row">
															<?php endif; ?>
															<a class="col px-0 px-lg-1" href="javascript:void(0)">
																<img src="<?php echo base_url(); ?>resource/uploaded/img/<?php echo $nilai['image']; ?>">
																<div class="detil-warna">
																	<p class="nama"><?php echo $nilai['name']; ?></p>
																	<p class="tipe"><?php echo $nilai['product']; ?></p>
																	<p class="kode"><?php echo $nilai['code']; ?></p>
																</div>
															</a>
															<?php if ($i == 6) : ?>
																</li>
																<?php $i = 0; ?>
															<?php endif; ?>
													<?php } ?>													
												</ul>
											</div>

											<button type="button" id="scroll-down-1" class="btn btn-link palet-scroll-down"><span class="fa fa-angle-down"></span></button>

										</div><!-- /container -->
									</div><!-- /palet-wrapper -->

									<?php } ?>
									
									<div class="row palet-footer pt-5">
										<div class="col-12 col-lg-6 px-0 kidzdream">
											<?php
												if (!empty($value['file'][0])) {
													$link1 = base_url() . "resource/uploaded/docs/" . $value['file'][0]['filename'];
													$download1 = "download";
												}
												else {
													$link1 = "";
													$download1 = "download";
												}
												if (!empty($value['file'][1])) {
													$link2 = base_url() . "resource/uploaded/docs/" . $value['file'][1]['filename'];
													$download2 = "download";
												}
												else {
													$link2 = "";
													$download2 = "";
												}
												if (!empty($value['file'][2])) {
													$link3 = base_url() . "resource/uploaded/docs/" . $value['file'][2]['filename'];
													$download3 = "download";
												}
												else {
													$link3 = "";
													$download3 = "";
												}
											?>
											<?php if ($link1) : ?>
												<a href="<?php echo $link1; ?>" <?php echo $download1; ?>>
													<img src="<?php echo base_url(); ?>resource/uploaded/unduh-colorcard.png">
												</a>
											<?php endif; ?>
											<?php if ($link2) : ?>
												<a href="<?php echo $link2; ?>" <?php echo $download2; ?>>
													<img src="<?php echo base_url(); ?>resource/uploaded/unduh-datateknis.png">
												</a>
											<?php endif; ?>
											<?php if ($link3) : ?>
												<a href="<?php echo $link3; ?>" <?php echo $download3; ?>>
													<img src="<?php echo base_url(); ?>resource/uploaded/unduh-msds.png">
												</a>
											<?php endif; ?>
										</div>
										<div class="col-12 col-lg-6 px-0 align-self-center text-center pt-3 pt-lg-0">
											<span class="float-lg-right">SERTA LEBIH DARI <strong>1200 WARNA</strong> DENGAN MESIN TINTING</span>
										</div>
									</div><!-- /palet-footer -->

								</div>
							</div>	
						</div>
					<?php } ?>
			    
			</div>
		</div>
		<?php if (count($data) > 1) : ?>
			<a class="carousel-control-prev" href="#produk-slider" role="button" data-slide="prev">
				<span class="fa fa-angle-left"></span>
				<span class="sr-only">Prev</span>
			</a>
			<a class="carousel-control-next" href="#produk-slider" role="button" data-slide="next">
				<span class="fa fa-angle-right"></span>
				<span class="sr-only">Next</span>
			</a>
		<?php endif; ?>
	</div><!-- /produk-slider -->

</div>		
</div><!-- /produk -->    	

</div><!-- /container-fluid -->