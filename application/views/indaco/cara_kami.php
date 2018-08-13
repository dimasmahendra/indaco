<!-- PAGE CONTENT-->
<div class="container-fluid modal-bg bg-white px-3 px-lg-5 mt-80">
	<div class="container">
	<div class="row pt-80 pb-5">
			<div class="col-12 col-lg-3 ml-0 ml-lg-4">
				<div class="list-group cara-kami" id="list-tab" role="tablist">
					<a class="list-group-item list-group-item-action active" id="list-eksterior-list" data-toggle="list" href="#list-eksterior" role="tab" aria-controls="eksterior">Eksterior</a>
					<a class="list-group-item list-group-item-action" id="list-interior-list" data-toggle="list" href="#list-interior" role="tab" aria-controls="interior">Interior</a>
					<a class="list-group-item list-group-item-action" id="list-tutorial-list" data-toggle="list" href="#list-tutorial" role="tab" aria-controls="messages">Video Tutorial</a>
				</div>
				<div class="cara-kami-desc mt-lg-5">
					<p>Pelajari cara profesional mengecat perabot dengan tips pakar di halaman ini untuk hasil akhir menakjubkan.</p>
				</div>
			</div>
			<div class="col-12 col-lg-8 mx-auto">
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="list-eksterior" role="tabpanel">
						<?php $i = 0; ?>
						<?php foreach ($eksterior as $ekst) : ?>
							<?php $i++ ?>
							<?php if ($i == 1) : ?>
								<div class="card-deck artikel">
							<?php endif; ?>

								<div class="card" data-toggle="modal" data-target="<?php echo '#eksterior_'.$ekst->id ?>">
									<img class="card-img" src="<?php echo $img_url.'/'.$ekst->image ?>" alt="Card image cap">
									<div class="card-img-overlay d-flex flex-column">
										<div style="visibility:hidden" class="card-header">Month, Date and Year</div>
										<div class="card-body"><h2 class="caption"><?php echo $ekst->title ?></h2></div>
										<div class="card-footer align-content-end">Tips & Tricks</div>
									</div>
								</div>

							<?php if ($i == 2) : ?>
								</div>
								<?php $i = 0; ?>
							<?php endif; ?>
						<?php endforeach; ?>

						<?php if (($i > 0) && ($i < 2)) : ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="tab-pane fade" id="list-interior" role="tabpanel">
						<?php $i = 0; ?>
						<?php foreach ($interior as $int) : ?>
							<?php $i++ ?>
							<?php if ($i == 1) : ?>
								<div class="card-deck artikel">
							<?php endif; ?>

								<div class="card" data-toggle="modal" data-target="<?php echo '#interior_'.$int->id ?>">
									<img class="card-img" src="<?php echo $img_url.'/'.$int->image ?>" alt="Card image cap">
									<div class="card-img-overlay d-flex flex-column">
										<div style="visibility:hidden" class="card-header">Month, Date and Year</div>
										<div class="card-body"><h2 class="caption"><?php echo $int->title ?></h2></div>
										<div class="card-footer align-content-end">Tips & Tricks</div>
									</div>
								</div>

							<?php if ($i == 2) : ?>
								</div>
								<?php $i = 0; ?>
							<?php endif; ?>
						<?php endforeach; ?>

						<?php if (($i > 0) && ($i < 2)) : ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="tab-pane fade" id="list-tutorial" role="tabpanel">
						<?php $i = 0; ?>
						<?php foreach ($video as $vid) : ?>
							<?php $i++ ?>
							<?php if ($i == 1) : ?>
								<div class="card-deck artikel">
							<?php endif; ?>

								<div class="card" data-toggle="modal" data-target="<?php echo '#video_'.$vid->id ?>">
									<img class="card-img" src="<?php echo $img_url.'/'.$vid->image ?>" alt="Card image cap">
									<div class="card-img-overlay d-flex flex-column">
										<div style="visibility:hidden" class="card-header">Month, Date and Year</div>
										<div class="card-body"><h2 class="caption"><?php echo $vid->title ?></h2></div>
										<div class="card-footer align-content-end">Tips & Tricks</div>
									</div>
								</div>

							<?php if ($i == 2) : ?>
								</div>
								<?php $i = 0; ?>
							<?php endif; ?>
						<?php endforeach; ?>

						<?php if (($i > 0) && ($i < 2)) : ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
    
	</div>
</div><!-- /container-fluid -->

<?php foreach ($eksterior as $ekst) : ?>
	<div class="modal fade" id="<?php echo 'eksterior_'.$ekst->id ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content artikel-popup">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="popup-top">
						<img class="img-fluid" src="<?php echo $img_url.'/'.$ekst->image ?>">
						<h2 class="modal-title" id="contoh-popupLabel"><?php echo $ekst->title ?></h2>
						<div class="row">
							<div class="col excerpt">
								<p><?php echo !empty($ekst->author) ? 'Oleh: '.$ekst->author : '' ?>
								<?php if (!empty($ekst->source)) : ?>
									<br>Sumber:
									<a href="http://<?php echo $ekst->source ?>" target="_blank"><?php echo $ekst->source ?></a>
								<?php endif; ?>
								</p>
							</div>
							<div class="col-2">
								<div class="bagikan dropdown">
									<button class="btn btn-link dropdown-toggle" type="button" id="social-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-share-alt"></i>
									</button>
									<div class="dropdown-menu" aria-labelledby="social-dropdown">
										<a class="dropdown-item" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=no,resizable=no,width=560,height=250'); return false;" href="https://www.facebook.com/sharer.php?u=<?php echo site_url( 'cara-kami' ) ?>">
											<i class="fab fa-facebook"></i>
										</a>
										<a class="dropdown-item" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=no,resizable=no,width=560,height=450'); return false;" href="https://twitter.com/intent/tweet?text=Pelajari+cara+profesional+mengecat+untuk+hasil+akhir+menakjubkan&url=<?php echo site_url( 'cara-kami' ) ?>&via=indaco_wd">
											<i class="fab fa-twitter"></i>
										</a>
										<a class="dropdown-item" href="mailto:?subject=Indaco Tips & Trik&amp;body=Pelajari%20cara%20profesional%20mengecat%20untuk%20hasil%20akhir%20menakjubkan <?php echo site_url( 'cara-kami' ) ?>">
											<i class="fa fa-envelope"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="popup-bottom">
						<?php echo $ekst->content ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<?php foreach ($interior as $int) : ?>
	<div class="modal fade" id="<?php echo 'interior_'.$int->id ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content artikel-popup">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="popup-top">
						<img class="img-fluid" src="<?php echo $img_url.'/'.$int->image ?>">
						<h2 class="modal-title" id="contoh-popupLabel"><?php echo $ekst->title ?></h2>
						<div class="row">
							<div class="col excerpt">
								<p><?php echo !empty($int->author) ? 'Oleh: '.$int->author : '' ?>
								<?php if (!empty($ekst->source)) : ?>
									<br>Sumber:
									<a href="http://<?php echo $int->source ?>" target="_blank"><?php echo $int->source ?></a>
								<?php endif; ?>
								</p>
							</div>
							<div class="col-2">
								<div class="bagikan dropdown">
									<button class="btn btn-link dropdown-toggle" type="button" id="social-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-share-alt"></i>
									</button>
									<div class="dropdown-menu" aria-labelledby="social-dropdown">
										<a class="dropdown-item" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=no,resizable=no,width=560,height=250'); return false;" href="https://www.facebook.com/sharer.php?u=<?php echo site_url( 'cara-kami' ) ?>">
											<i class="fab fa-facebook"></i>
										</a>
										<a class="dropdown-item" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=no,resizable=no,width=560,height=450'); return false;" href="https://twitter.com/intent/tweet?text=Pelajari+cara+profesional+mengecat+untuk+hasil+akhir+menakjubkan&url=<?php echo site_url( 'cara-kami' ) ?>&via=indaco_wd">
											<i class="fab fa-twitter"></i>
										</a>
										<a class="dropdown-item" href="mailto:?subject=Indaco Tips & Trik&amp;body=Pelajari%20cara%20profesional%20mengecat%20untuk%20hasil%20akhir%20menakjubkan <?php echo site_url( 'cara-kami' ) ?>">
											<i class="fa fa-envelope"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="popup-bottom">
						<?php echo $int->content ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<?php foreach ($video as $vid) : ?>
	<div class="modal fade" id="<?php echo 'video_'.$vid->id ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog video-tutorial" role="document">
			<div class="modal-content artikel-popup">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="popup-top pb-2">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="<?php echo $vid->video_url ?>"></iframe>
						</div>
						<div class="row mt-4">
							<div class="col-1">
								<div class="bagikan dropdown">
									<button class="btn btn-link dropdown-toggle" type="button" id="social-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-share-alt"></i>
									</button>
									<div class="dropdown-menu" aria-labelledby="social-dropdown">
										<a class="dropdown-item" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=no,resizable=no,width=560,height=250'); return false;" href="https://www.facebook.com/sharer.php?u=<?php echo site_url( 'cara-kami' ) ?>">
											<i class="fab fa-facebook"></i>
										</a>
										<a class="dropdown-item" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=no,resizable=no,width=560,height=450'); return false;" href="https://twitter.com/intent/tweet?text=Pelajari+cara+profesional+mengecat+untuk+hasil+akhir+menakjubkan&url=<?php echo site_url( 'cara-kami' ) ?>&via=indaco_wd">
											<i class="fab fa-twitter"></i>
										</a>
										<a class="dropdown-item" href="mailto:?subject=Indaco Tips & Trik&amp;body=Pelajari%20cara%20profesional%20mengecat%20untuk%20hasil%20akhir%20menakjubkan <?php echo site_url( 'cara-kami' ) ?>">
											<i class="fa fa-envelope"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>