<!-- PAGE CONTENT-->
<div class="container-fluid modal-bg bg-white mt-80">
    <div class="container">
    	<div class="row py-5 px-lg-4">
    		<div class="col-12">
    			<div class="proyek-title mb-4">
    				<img class="mr-2 pb-1" src="<?php echo $img_url2 ?>/img/caret.png"><span>CSR</span>
    			</div>
    			<?php $i = 0; ?>
				<?php foreach ($csr as $cs) : ?>
					<?php 
                        if (empty($cs->image_popup)) {
                            $img = $cs->image;
                        }
                        else {
                            $img = $cs->image_popup;
                        }
                    ?>
					<?php $i++ ?>
					<?php if ($i == 1) : ?>
						<div class="card-deck artikel">
					<?php endif; ?>

						<div class="card" data-toggle="modal" data-target="<?php echo '#csr_'.$cs->id ?>">
							<img class="card-img" src="<?php echo $img_url.'/'.$img ?>" alt="Card image cap">
							<div class="card-img-overlay d-flex flex-column">
								<div style="visibility:hidden" class="card-header">Month, Date and Year</div>
								<div class="card-body"><h2 class="caption"><?php echo $cs->title ?></h2></div>
								<div class="card-footer align-content-end">Tips & Tricks</div>
							</div>
						</div>

					<?php if ($i == 3) : ?>
						</div>
						<?php $i = 0; ?>
					<?php endif; ?>
				<?php endforeach; ?>

				<?php if (($i > 0) && ($i < 3)) : ?>
					</div>
				<?php endif; ?>

    		</div>    	
    	</div>	    
    </div>
</div><!-- /container-fluid -->

<!-- POPUP ARTIKEL -->
<?php foreach ($csr as $cs) : ?>
	<!-- proyek 1 -->
	<?php 
        if (empty($cs->image)) {
            $img = $cs->image_popup;
        }
        else {
            $img = $cs->image;
        }
    ?>
	<div class="modal fade" id="<?php echo 'csr_'.$cs->id ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content artikel-popup">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="popup-top">
						<img class="img-fluid" src="<?php echo $img_url.'/'.$img ?>">
						<h2 class="modal-title" id="contoh-popupLabel"><?php echo $cs->title ?></h2>
						<div class="row">
							<div class="col excerpt"></div>
							<div class="col-2">
								<div class="bagikan dropdown">
									<button class="btn btn-link dropdown-toggle" type="button" id="social-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-share-alt"></i>
									</button>
									<div class="dropdown-menu" aria-labelledby="social-dropdown">
										<a class="dropdown-item" href="#">
											<i class="fab fa-facebook"></i>
										</a>
										<a class="dropdown-item" href="#">
											<i class="fab fa-twitter"></i>
										</a>
										<a class="dropdown-item" href="#">
											<i class="fab fa-whatsapp"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="popup-bottom">
						<?php echo $cs->content ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
