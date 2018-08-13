<!-- PAGE CONTENT-->
	<div class="container">
		<section id="temukan" class="container text-center text-lg-left text-white mx-lg-3">
			<div class="row py-2 py-lg-5">
	    	<div class="col px-0 px-lg-3">
	    		<h2 class="mt-80"><strong>Temukan Kami</strong><br>Di Depo Cat Terdekat</h2>
					<p class="mt-4 d-none d-lg-block">Di mana pun Anda berada, kami ada di depo cat terdekat.<br>Temukan kami di wilayah Anda melalui peta di bawah ini.</p>
					<p class="mt-2 d-block d-lg-none">Di mana pun Anda berada, kami ada di depo cat terdekat. Temukan kami di wilayah Anda melalui peta di bawah ini.</p>
				</div>
	    
	    <div class="col-1 d-none d-lg-block">
				<div class="btn-group-vertical hubungi-section-nav">
					<a class="btn btn-link text-right js-scroll-trigger" href="#temukan" role="button"><span class="text-white callout">TEMUKAN KAMI</span><b class="notch"></b><i class="fa fa-circle text-white circle"></i></a>
					<a class="btn btn-link text-right js-scroll-trigger" href="#tanya" role="button"><span class="text-white callout">TANYA BROSOLIN</span><b class="notch"></b><i class="fa fa-circle text-white circle"></i></a>
					<a class="btn btn-link text-right js-scroll-trigger" href="#unduh" role="button"><span class="text-white callout">UNDUH</span><b class="notch"></b><i class="fa fa-circle text-white circle"></i></a>
				</div> 

	    <nav id="myScrollspy">
				<ul class="nav nav-pills flex-column text-center">
					<li class="nav-item">
						<!-- <a class="nav-link active" href="#temukan">TEMUKAN KAMI</a> -->
						<a class="nav-link active js-scroll-trigger" href="#temukan" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="TEMUKAN KAMI"><i class="fa fa-circle text-white"></i></a>
					</li>
					<li class="nav-item">
						<!-- <a class="nav-link" href="#tanya">TANYA PADA AHLI</a> -->
						<a class="nav-link js-scroll-trigger" href="#tanya" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="TANYA BROSOLIN"><i class="fa fa-circle text-white"></i></a>
					</li>
					<li class="nav-item">
						<!-- <a class="nav-link" href="#unduh">UNDUH</a> -->
						<a class="nav-link js-scroll-trigger" href="#unduh" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="UNDUH"><i class="fa fa-circle text-white"></i></a>
					</li>
				</ul>
			</nav>
	    </div>
		</div>	
	</section>
	</div>
	
	<!-- MAP -->
	<div class="container-fluid">
		<div class="row bg-white">
				<div class="col px-0">
					
					<div id="map" data-depos='<?php echo json_encode($depos) ?>'></div>
					
					<div class="container-fluid depo-search">					
						<div class="row depo-search-inner">
							<div class="col-12 depo-search-left d-block d-lg-none" style="background-image: url(<?php echo site_url( 'resource/uploaded/img/depo/'.$depo_utama['image'] ) ?>)">
								<div class="input-group cari-depo mt-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-search"></i></span>
									</div>
									<input id="address_map2" class="depo-input-search form-control" type="search" value="">
								</div>
								<div class="mt-5 pt-5">
									<h2 class="text-white depo-name"><?php echo $depo_utama['nama_depo'] ?></h2> 
									<p class="depo-detil mt-4 pt-3 depo-alamat"><?php echo $depo_utama['alamat_depo'] ?></p>
									<div class="row pb-2">
									<div class="col-7">
										<p class="depo-detil"><strong>BM</strong><br><span class="depo-bm"><?php echo $depo_utama['nama_bm'] ?></span><br><br><strong>Admin</strong><br><span class="depo-admin"><?php echo $depo_utama['nama_admin'] ?></span></p>
									</div>
									<div class="col-5">
										<p class="depo-detil"><strong>Telepon BM</strong><br><span class="depo-tel-bm"><?php echo $depo_utama['tel_bm'] ?></span><strong><br><br>Telepon Admin</strong><br><span class="depo-tel-admin"><?php echo $depo_utama['tel_admin'] ?></span></p>
									</div>
									</div>
								</div>
							</div>	
							<div class="col-7 depo-search-left p-4 d-none d-lg-block" style="background-image: url(<?php echo site_url( 'resource/uploaded/img/depo/'.$depo_utama['image'] ) ?>)">
								<div class="input-group cari-depo">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-search"></i></span>
									</div>
									<input id="address_map1" class="depo-input-search form-control" type="search" value="">
								</div>
								<div class="mt-5 pt-4">
									<h2 class="text-white mb-5 pl-4 depo-name"><?php echo $depo_utama['nama_depo'] ?></h2> 
									<p class="depo-detil pl-4">
										<span class="depo-alamat"><?php echo $depo_utama['alamat_depo'] ?></span><br><br><strong>BM</strong><br><span class="depo-bm"><?php echo $depo_utama['nama_bm'] ?></span><br><br><strong>Admin</strong><br><span class="depo-admin"><?php echo $depo_utama['nama_admin'] ?></span><br><br><strong>Tepefon BM</strong><br><span class="depo-tel-bm"><?php echo $depo_utama['tel_bm'] ?></span><strong><br><br>Telepon Admin</strong><br><span class="depo-tel-admin"><?php echo $depo_utama['tel_admin'] ?></span>
									</p>
								</div>
							</div>	
							<div class="col-5 p-lg-4">
								<?php /*
								<div class="mCustomScrollbar ui-widget cari-kota">
									<select id="combobox" title="KOTA">
										<option value="">KOTA</option>
										<option value="Aceh">ACEH</option>
										<option value="Medan">MEDAN</option>
										<option value="Yogyakarta">YOGYAKARTA</option>
										<option value="Jakarta">JAKARTA</option>
										<option value="Bandung">BANDUNG</option>
										<option value="Bekasi">BEKASI</option>
										<option value="Depok">DEPOK</option>
										<option value="Semarang">SEMARANG</option>
										<option value="Solo">SOLO</option>
										<option value="Palembang">PALEMBANG</option>
										<option value="Batam">BATAM</option>
										<option value="Padang">PADANG</option>
										<option value="Pekanbaru">PEKANBARU</option>
										<option value="Malang">MALANG</option>
										<option value="Samarinda">SAMARINDA</option>
										<option value="Pontianak">PONTIANAK</option>
										<option value="Banjarmasin">BANJARMASIN</option>
										<option value="Balikpapan">BALIKPAPAN</option>
										<option value="Surakarta">SURAKARTA</option>
										<option value="Palu">PALU</option>
										<option value="Kendari">KENDARI</option>
										<option value="Sorong">SORONG</option>
									</select>
								</div>
								*/ ?>
							</div>
						</div>			
					</div>
				</div>
			</div>
	</div>
	
	<div class="container">	
	<section id="tanya" class="container pt-5 px-0">
			<div class="row-fluid py-2 py-lg-5">
				<div class="col-12 col-lg-11 mx-auto tanya text-white text-lg-right px-2 px-lg-0">
					<h2 class="d-none d-lg-block">Solusikan<br>Masalah Cat Anda<br>Bersama <strong>Brosolin</strong>!</h2>
					<h2 class="d-block d-lg-none pt-4">Solusikan<br>Masalah<br>Cat Anda<br>Bersama<br><strong>Brosolin</strong>!</h2>

					<div class="my-5">
						<form id="brosolin_form" class="form-inline">
							<p>Halo, saya <input type="text" class="form-control" id="brosolin_nama" placeholder="Nama"><br>ingin bertanya ke Brosolin tentang cat saya yang<br><input type="text" class="form-control" id="brosolin_masalah" placeholder="Deskripsikan masalah Anda" style="width:80%"><br>Bagi solusinya dong, Bro.<br><br><button id="brosolin_submit" type="submit" class="btn btn-tanya mt-3 mt-lg-5">KIRIM PERTANYAAN</button></p>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
	
	<div class="container">	
		<section id="unduh" class="container pt-5">
			<div class="row">
				<div class="col-12 mx-auto unduh-aplikasi text-white text-left px-0 px-lg-3">
					<div class="col-12 col-lg-5 pt-0 pt-lg-5 pb-0 pb-lg-5">
					<h2>Unduh Aplikasi<br><strong>INDACO Colourize</strong></h2>
					<p class="my-3 my-lg-5 mb-5 mb-lg-0 pb-4 pb-lg-0 pt-2">Segera unduh aplikasi <strong>INDACO Colourize</strong> untuk membantu Anda dalam menciptakan nuansa dalam rumah melalui fitur visualizer.<br>Nikmati beragam fitur lainnya dan akses informasi terkini secara mudah.</p>
					<button type="submit" class="btn btn-tanya"><img class="mr-2 mr-lg-4" src="<?php echo site_url( 'resource/indaco/img/playstore.png' ) ?>">UNDUH SEKARANG</button>
					</div>
				</div>
			</div>
		</section>
	</div>