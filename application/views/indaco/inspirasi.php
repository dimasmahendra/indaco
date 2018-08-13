<!-- PAGE CONTENT -->
<div class="container-fluid bg-white px-0 px-lg-3 py-5 mt-80">

	<?php 
		foreach ($data as $key => $value) { ?>
			<!-- Homey Belazo -->
			<section id="<?php echo $value['class']; ?>">
				<div class="row inspirasi-holder px-lg-5 py-4">
					<div class="col ml-lg-4 d-none d-lg-block">		
						<div id="inspirasi-icon-carousel<?php echo $key ?>" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
							<div class="carousel-inner inspirasi-icon-carousel" role="listbox">
								<?php
									foreach ($value['detail'] as $index => $val) { ?>
										<div class="carousel-item <?php echo $val['active'];  ?>">
											<div class="inspirasi-leftpanel">
												<h4><strong><?php echo $val['name']; ?></strong></h4>
												<div class="inspirasi-icon text-white mt-3">
													<figure>
														<img src="<?php echo base_url(); ?>resource/uploaded/img/inspirasi/<?php echo $val['image1']; ?>">
													</figure>
												</div>
											</div>
										</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="col col-lg-8 px-0 mr-lg-5">
						<!-- mobile -->
						<div class="3d-carousel-mobile d-block d-lg-none" id="slider1">
							<ul>
								<?php 
									foreach ($value['detail'] as $kunci => $isi) { ?>
										<li>
											<h6 class="judul"><strong><?php echo $isi['name']; ?></strong></h6>
											<img class="rounded" src="<?php echo base_url(); ?>resource/uploaded/img/inspirasi/<?php echo $isi['image2']; ?>" alt="" />
										</li>
								<?php } ?>

								<a class="carousel-control-prev" href="#inspirasi-icon-carousel<?php echo $key ?>" role="button" data-slide="prev"><span class="left fa fa-angle-left"></span></a>
								<a class="carousel-control-next" href="#inspirasi-icon-carousel<?php echo $key ?>" role="button" data-slide="next"><span class="right fa fa-angle-right"></span></a>
							</ul>
						</div>
						<!-- desktop -->
						<div class="3d-carousel-desktop d-none d-lg-block" id="slider1">
							<ul>
								<?php
									foreach ($value['detail'] as $angka => $harga) { ?>
										<li><img class="rounded" src="<?php echo base_url(); ?>resource/uploaded/img/inspirasi/<?php echo $harga['image2']; ?>" alt="" /></li>
								<?php } ?>
								
								<a class="carousel-control-prev" href="#inspirasi-icon-carousel<?php echo $key ?>" role="button" data-slide="prev"><span class="left fa fa-angle-left"></span></a>
								<a class="carousel-control-next" href="#inspirasi-icon-carousel<?php echo $key ?>" role="button" data-slide="next"><span class="right fa fa-angle-right"></span></a>
							</ul>
						</div>
					</div>
				</div>
			</section>
	<?php	}
	?>	
</div><!-- /container-fluid -->