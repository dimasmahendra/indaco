<!-- PAGE CONTENT-->
<div class="container-fluid mt-80 bg-indaco">
	<div class="container">
		<div class="row">
    		<div class="col-12 mx-auto text-center text-white">
    			<h4 class="mt-0 mt-lg-4 ml-5 ml-lg-0">Hasil Pencarian</h4>
    		</div>
    	</div>
		<div class="row">
			<div class="col-12 text-white mx-0 mx-lg-3 px-0 px-lg-3">
				<?php foreach ($results as $result) : ?>
					<p class="lead">
						<strong>
							<?php if ($result['type'] == 'post') : ?>
								<a href="javascript:void(0)" data-toggle="modal" data-target="<?php echo '#modal_post'.$result['full_data']->id ?>"><?php echo $result['title'] ?></a>
							<?php else: ?>
								<a href="<?php echo $result['link'] ?>"><?php echo $result['title'] ?></a>
							<?php endif; ?>
						</strong>
					</p>
					<p><?php echo $result['content'] ?></p>
					<p>
						<?php
							if ($result['type'] == 'post')
								echo 'Categories: '.$result['categories'];
							else if ($result['type'] == 'product')
								echo 'Type: '.$result['categories'];
						?>
					</p>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div><!-- /container-fluid -->

<?php foreach ($results as $result) : ?>
	<?php if ($result['type'] == 'post') : ?>
		<?php $full_data = $result['full_data'] ?>
		<div class="modal fade" id="<?php echo 'modal_post'.$full_data->id ?>" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content artikel-popup">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<div class="popup-top">
							<img class="img-fluid" src="<?php echo $img_url.'/'.$full_data->image ?>">
							<h2 class="modal-title" id="contoh-popupLabel"><?php echo $full_data->title ?></h2>
							<div class="row">
								<div class="col excerpt">
									<p><?php echo !empty($full_data->author) ? 'Oleh: '.$full_data->author : '' ?>
									<?php if (!empty($full_data->source)) : ?>
										<br>Sumber:
										<a href="http://<?php echo $full_data->source ?>" target="_blank"><?php echo $full_data->source ?></a>
									<?php endif; ?>
									</p>
								</div>
								<div class="col-2">
									<div class="bagikan dropdown">
										<button class="btn btn-link dropdown-toggle" type="button" id="social-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-share-alt"></i>
										</button>
										<div class="dropdown-menu" aria-labelledby="social-dropdown">
											<a class="dropdown-item" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=no,resizable=no,width=560,height=250'); return false;" href="https://www.facebook.com/sharer.php?u=http://indaco.hostingiix.net/cara-kami.html">
												<i class="fab fa-facebook"></i>
											</a>
											<a class="dropdown-item" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=no,resizable=no,width=560,height=450'); return false;" href="https://twitter.com/intent/tweet?text=Pelajari+cara+profesional+mengecat+untuk+hasil+akhir+menakjubkan&url=http://indaco.hostingiix.net/cara-kami.html&via=indaco_wd">
												<i class="fab fa-twitter"></i>
											</a>
											<a class="dropdown-item" href="mailto:?subject=Indaco Tips & Trik&amp;body=Pelajari%20cara%20profesional%20mengecat%20untuk%20hasil%20akhir%20menakjubkan http://indaco.hostingiix.net/cara-kami.html">
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
							<?php echo $full_data->content ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
		
<?php endforeach; ?>