<!-- PAGE CONTENT-->
<div class="container-fluid modal-bg bg-white px-3 px-lg-5 mt-80">
	<div class="container">
		<div class="row pt-80 pb-5">
			<div class="col-12 col-lg-3 ml-0 ml-lg-4">
				<div class="list-group cara-kami" id="list-tab" role="tablist">
					<?php 
						foreach ($data as $key => $value) { ?>
							<a class="list-group-item list-group-item-action <?php echo $value['active']; ?>" id="list-eksterior-list" data-toggle="list" href="#list-<?php echo strtolower(str_replace(" ", "", $value['name'])) ?>" role="tab" aria-controls="<?php echo strtolower(str_replace(" ", "", $value['name'])) ?>"><?php echo $value['name']?></a>
					<?php } ?>
				</div>
				<div class="cara-kami-desc mt-lg-5">
					<p>Pelajari cara profesional mengecat perabot dengan tips pakar di halaman ini untuk hasil akhir menakjubkan.</p>
				</div>
			</div>
			<div class="col-12 col-lg-8 mx-auto">
				<div class="tab-content" id="nav-tabContent">
					<?php
						foreach ($data as $key => $value) { ?>
							<div class="tab-pane fade <?php echo $value['active']; ?>" id="list-<?php echo strtolower(str_replace(" ", "", $value['name'])) ?>" role="tabpanel">
								<?php
								$total = count($value['kat']);
								$i = $key + 1;							
									if ($i % 2 || $total <= 2) {
										echo "<div class='card-deck artikel'>";
									}
									foreach ($value['kat'] as $index => $val) { ?>
										<div class="card" data-toggle="modal" data-target="#<?php echo strtolower(str_replace(" ", "", $value['name'])) ?><?php echo $val['id']; ?>">
											<img class="card-img" src="<?php echo base_url(); ?>resource/uploaded/img/postcontent/<?php echo $val['image']?>" alt="Card image cap">
											<div class="card-img-overlay d-flex flex-column">
												<div style="visibility:hidden" class="card-header">Month, Date and Year</div>
												<div class="card-body"><h2 class="caption"><?php echo $val['title']; ?></h2></div>
												<div class="card-footer align-content-end">Tips & Tricks</div>
											</div>
										</div>
									<?php }
									if ($i % 2 || $total <= 2) {
										echo "</div>";
									}
								?>
							</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div><!-- /container-fluid -->

<?php foreach ($data as $key => $value) { ?>
		<?php 
			if ($value['name'] == "Video Tutorial") { ?>				
				<?php foreach ($value['kat'] as $kunci => $nilai) { ?>
					<div class="modal fade" id="<?php echo strtolower(str_replace(" ", "", $value['name'])) ?><?php echo $nilai['id']; ?>" tabindex="-1" role="dialog">
						<div class="modal-dialog video-tutorial" role="document">
							<div class="modal-content artikel-popup">
								<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<div class="popup-top pb-2">     		
										<!--      				<p>Month, Date and Year</p> -->
										<div class="embed-responsive embed-responsive-16by9">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $nilai['video_url']; ?>?rel=0&amp;autoplay=0&amp;controls=0&amp;showinfo=0&amp;html5=true"></iframe>
										</div> 
										<!-- 						<h2 class="modal-title" id="contoh-popupLabel">Penyebab <i>Nailhead Rusting</i></h2> -->
										<div class="row mt-4">

											<div class="col-1">
												<div class="bagikan dropdown">
													<button class="btn btn-link dropdown-toggle" type="button" id="social-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-share-alt"></i></button>
													<div class="dropdown-menu" aria-labelledby="social-dropdown">
														<a class="dropdown-item" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=no,resizable=no,width=560,height=250'); return false;" href="https://www.facebook.com/sharer.php?u=http://indaco.hostingiix.net/cara-kami.html"><i class="fab fa-facebook"></i></a>
														<a class="dropdown-item" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=no,resizable=no,width=560,height=450'); return false;" href="https://twitter.com/intent/tweet?text=Pelajari+cara+profesional+mengecat+untuk+hasil+akhir+menakjubkan&url=http://indaco.hostingiix.net/cara-kami.html&via=indaco_wd"><i class="fab fa-twitter"></i></a>
														<a class="dropdown-item" href="mailto:?subject=Indaco Tips & Trik&amp;body=Pelajari%20cara%20profesional%20mengecat%20untuk%20hasil%20akhir%20menakjubkan http://indaco.hostingiix.net/cara-kami.html"><i class="fa fa-envelope"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
		<?php	}
			else { ?>
				<?php foreach ($value['kat'] as $index => $val) { ?>
					<div class="modal fade" id="<?php echo strtolower(str_replace(" ", "", $value['name'])) ?><?php echo $val['id']; ?>" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content artikel-popup">
								<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<div class="popup-top">
										<img class="img-fluid" src="<?php echo base_url(); ?>resource/uploaded/img/postcontent/<?php echo $val['image']?>"> 
										<h2 class="modal-title" id="contoh-popupLabel"><?php echo $val['title']; ?></h2>
										<div class="row">
											<div class="col excerpt">
												<p>Oleh: <?php echo $val['author']; ?><br>
													Sumber: <a href="<?php echo $val['source']; ?>" target="_blank"><?php echo $val['source']; ?></a>
												</p>
											</div>
											<div class="col-2">
												<div class="bagikan dropdown">
													<button class="btn btn-link dropdown-toggle" type="button" id="social-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-share-alt"></i></button>
													<div class="dropdown-menu" aria-labelledby="social-dropdown">
														<a class="dropdown-item" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=no,resizable=no,width=560,height=250'); return false;" href="https://www.facebook.com/sharer.php?u=http://indaco.hostingiix.net/cara-kami.html"><i class="fab fa-facebook"></i></a>
														<a class="dropdown-item" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=no,resizable=no,width=560,height=450'); return false;" href="https://twitter.com/intent/tweet?text=Pelajari+cara+profesional+mengecat+untuk+hasil+akhir+menakjubkan&url=http://indaco.hostingiix.net/cara-kami.html&via=indaco_wd"><i class="fab fa-twitter"></i></a>
														<a class="dropdown-item" href="mailto:?subject=Indaco Tips & Trik&amp;body=Pelajari%20cara%20profesional%20mengecat%20untuk%20hasil%20akhir%20menakjubkan http://indaco.hostingiix.net/cara-kami.html"><i class="fa fa-envelope"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<div class="popup-bottom">
										<p><?php echo $val['content']; ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
		<?php } ?>
<?php } ?>
<!-- eksterior 1 -->