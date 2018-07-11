<?php
    $_controller = [];
    $_controller[] = $this->router->fetch_class();
    $_controller[] = $this->router->fetch_method();
    $controller_name = implode("/", $_controller);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php echo $title ?></title>
	<link rel="shortcut icon" href="<?php echo site_url( 'resource/indaco/img/favicon.ico' ) ?>">
	<link href="<?php echo site_url( 'resource/indaco/css/bootstrap.min.css' ) ?>" rel="stylesheet">
	<link href="<?php echo site_url( 'resource/indaco/css/style.css' ) ?>" rel="stylesheet">
	<link href="<?php echo site_url( 'resource/indaco/css/font-face.css' ) ?>" rel="stylesheet">
	<link href="<?php echo site_url( 'resource/indaco/css/font-awesome.min.css' ) ?>" rel="stylesheet">
	<?php
		if (isset($css))
		{
			if (is_array($css))
			{
				foreach ($css as $item)
				{
					echo '<link href="'.$item.'" rel="stylesheet">'."\r\n";
				}
			}
			else
				echo '<link href="'.$css.'" rel="stylesheet">'."\r\n";
		}

		if (isset($inline_css))
		{
			echo $inline_css;
		}
	?>
	<script type="text/javascript">
		var siteurl = '<?php echo site_url() ?>';
	</script>
</head>
<body>
	<!-- NAVIGASI -->
	<nav class="navbar fixed-top navbar-expand-lg bg-indaco">
      <div class="container">
      	<a class="navbar-brand d-block d-lg-none" href="<?php echo site_url() ?>"><img src="<?php echo site_url( 'resource/indaco/img/indaco.png' ) ?>" alt="INDACO"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse mobile-collapse justify-content-left">
          <ul class="navbar-nav">
            <li class="nav-item <?php echo in_array($controller_name, array('ctrpublic/index')) ? 'active' : '' ?>">
              <a class="nav-link" href="<?php echo site_url() ?>">BERANDA</a>
            </li>
            <li class="nav-item dropdown <?php echo in_array($controller_name, array('ctrpublic/product')) ? 'active' : '' ?>">
              <a class="nav-link dropdown-toggle d-none d-lg-block" href="#" onclick="javascript:location.href='<?php echo site_url('product') ?>'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUK</a>
              <a class="nav-link dropdown-toggle d-block d-lg-none" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUK</a>
              <div class="dropdown-menu produk dropdown-triangle">
              	<a class="dropdown-item" href="<?php echo site_url('product/belazo') ?>">BELAZO</a>
                <a class="dropdown-item" href="produk.html#panel-envi">ENVI</a>
                <a class="dropdown-item" href="produk.html#panel-topseal">TOP SEAL</a>
                <a class="dropdown-item" href="produk.html#panel-hotseal">HOT SEAL</a>
                <a class="dropdown-item" href="produk.html#panel-tinting">TINTING</a>
                <a class="dropdown-item" href="produk.html#panel-modacon">MODACON</a>
                <a class="dropdown-item" href="produk.html#panel-nusatex">NUSATEX</a>
              </div>
            </li>
            <li class="nav-item <?php echo in_array($controller_name, array('ctrpublic/inspirasi')) ? 'active' : '' ?>">
              <a class="nav-link" href="<?php echo site_url('inspirasi') ?>">INSPIRASI</a>
            </li>
          </ul>
        </div>
        <a class="navbar-brand d-none d-md-none d-lg-block" href="<?php echo site_url() ?>"><img src="<?php echo site_url( 'resource/indaco/img/indaco.png' ) ?>" alt="INDACO"></a>
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item <?php echo in_array($controller_name, array('ctrpublic/cara_kami')) ? 'active' : '' ?>">
              <a class="nav-link" href="<?php echo site_url('cara-kami') ?>">CARA KAMI</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-none d-lg-block" href="#" onclick="javascript:location.href='<?php echo site_url('tentang-kami') ?>'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TENTANG KAMI</a>
              <a class="nav-link dropdown-toggle d-block d-lg-none" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TENTANG KAMI</a>
              <div class="dropdown-menu tentang dropdown-triangle">
              	<a class="dropdown-item" href="tentang-kami.html">TENTANG INDACO</a>
                <a class="dropdown-item" href="hubungi-kami.html">HUBUNGI KAMI</a>
                <a class="dropdown-item" href="proyek.html">PROYEK</a>
                <a class="dropdown-item" href="csr.html">CSR</a>
                <a class="dropdown-item" href="faq.html">FAQ</a>
              </div>
            </li>
            <li class="nav-item d-block d-lg-none">
              <a class="nav-link" href="berita.html">BERITA TERKINI</a>
            </li>
            <li class="nav-item nav-cari d-block d-lg-none">
              <a class="nav-link" href="#cari-modal" data-toggle="modal"><i class="fa fa-search mr-2"></i> SEARCH</a>
            </li>
            <li class="nav-item dropdown search d-none d-lg-block">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
              <div class="dropdown-menu dropdown-search-triangle">
              	<form class="form-inline">
              		<input class="form-control form-control-sm" type="search" placeholder="CARI" aria-label="CARI">
              	</form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

	<!-- SEACH MODAL -->
	<div class="container-fluid">
		<div class="modal fade" id="cari-modal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-cari" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<div class="col-12 px-0">
							<form role="search" method="get" class="search-form cari-modal-form">
								<label class="sr-only">Search</label>
								<div class="input-group golek">
									<i class="fa fa-search" aria-hidden="true"></i>
									<input type="search" name="s" class="search-field form-control" placeholder="Search">
									<span class="input-group-btn">
										<button type="button" class="search-submit close tutup" data-dismiss="modal">
											<span aria-hidden="true">×</span>
										</button>
									</span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php echo $body ?>
    
	<!-- FOOTER -->
	<footer class="scrollsections">
		<!-- TOP FOOTER -->
		<div class="container-fluid py-4 top-footer">
			<div class="container">
				<div class="row mx-lg-3">
					<div class="col-12 col-lg-6 align-self-center">
						<span class="lead text-white d-none d-lg-block">Tidak mau ketinggalan berita? Jadilah pelanggan surel kami.</span>
						<span class="text-white text-center mb-3 d-block d-lg-none">Tidak mau ketinggalan berita?<br>Jadilah pelanggan surel kami.</span>
					</div>
					<div class="col-12 col-lg-6">
						<form class="form-inline float-md-right">
							<div class="input-group">
								<input type="text" class="form-control form-control-subscribe" placeholder="EMAIL ANDA" aria-label="EMAIL ANDA">
								<div class="input-group-append">
									<button class="btn btn-white" type="button">KIRIM</button>
								</div>
							</div>            
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- BOTTOM FOOTER -->
		<div class="container text-white text-center text-lg-left bg-indaco">
			<div class="row mx-0 mx-lg-3 my-5">
				<div class="col-12 col-lg-4 pr-lg-5">
					<img src="<?php echo site_url( 'resource/indaco/img/indaco.png' ) ?>">
					<p class="small mt-4 mt-lg-5"><strong>PT. Indaco Warna Dunia</strong> adalah perusahaan investasi lokal murni yang didirikan oleh orang – orang yang inovatif, kreatif, dan agresif yang melihat peluang dalam industri cat.</p>
					<p class="small">Mereka umumnya memiliki latar belakang teknologi cat yang merupakan bagian dari kunci keunggulan mereka untuk memproduksi dan bersaing dengan produsen cat yang sudah ada.</p>
				</div>
				<div class="col-12 col-lg-3 mt-3 mt-lg-0">
					<h5>Site Map</h5>
					<hr class="footer-hr footer-hr-mobile-1">
					<div class="footer-nav-mobile d-block d-lg-none">
						<a href="index.html">BERANDA</a> | <a href="produk.html">PRODUK</a> | <a href="inspirasi.html">INSPIRASI</a><br><a href="cara-kami.html">CARA KAMI</a> | <a href="tentang-kami.html">TENTANG KAMI</a><br><a href="javascript:void(0)">BERGABUNG</a> | <a href="faq.html">FAQ</a> | <a href="berita.html">BERITA</a> | <a href="csr.html">CSR</a>
					</div>
					<div class="float-left d-none d-lg-block mt-4">
						<ul class="footer-nav">
							<li><a href="index.html">BERANDA</a></li>
							<li><a href="produk.html">PRODUK</a></li>
							<li><a href="inspirasi.html">INSPIRASI</a></li>
							<li><a href="cara-kami.html">CARA KAMI</a></li>
							<li><a href="tentang-kami.html">TENTANG KAMI</a></li>
						</ul>
					</div>
					<div class="float-right d-none d-lg-block mt-4">
						<ul class="footer-nav">
							<li><a href="javascript:void(0)">BERGABUNG</a></li>
							<li><a href="faq.html">FAQ</a></li>
							<li><a href="berita.html">BERITA</a></li>
							<li><a href="csr.html">CSR</a></li>
						</ul>
					</div>
				</div>
				<div class="col-12 col-lg-4 pl-md-5 mt-4 mt-lg-0">
					<h5>Hubungi Kami</h5>
					<hr class="footer-hr footer-hr-mobile-2">
					<p class="d-block d-lg-none mt-0">Jl. Raya Solo - Sragen Km. 13,2 Desa Pulosari, Kec. Kebakkramat, Karanganyar<br>Solo - 57762, Indonesia<br><br>Phone : +62 271 - 8200872 (Hunting)<br>Fax : +62 271 - 8200875<br>Email : info@indaco.id<br>Website : www.indaco.id</p>
					<p class="d-none d-lg-block mt-5">Jl. Raya Solo - Sragen Km. 13,2<br>Desa Pulosari, Kec. Kebakkramat,<br>Karanganyar, Solo - 57762, Indonesia</p>
					<dl class="row d-none d-lg-flex">
						<dt class="col-3">Phone</dt>
						<dd class="col-9">:&nbsp;&nbsp;+62 271 - 8200872 (Hunting)</dd>
						<dt class="col-3">Fax</dt>
						<dd class="col-9">:&nbsp;&nbsp;+62 271 - 8200875</dd>
						<dt class="col-3">Email</dt>
						<dd class="col-9">:&nbsp;&nbsp;info@indaco.id</dd>
						<dt class="col-3">Website</dt>
						<dd class="col-9">:&nbsp;&nbsp;www.indaco.id</dd>
					</dl>
				</div>
				<div class="col-12 col-lg-1">
					<div class="icon-bar mt-3">
						<a class="d-md-block" target="_blank" href="https://www.facebook.com/indaco.warnadunia"><img src="<?php echo site_url( 'resource/indaco/img/facebook.png' ) ?>"></a> 
						<a class="d-md-block" target="_blank" href="https://twitter.com/indaco_wd"><img src="<?php echo site_url( 'resource/indaco/img/twitter.png' ) ?>"></a> 
						<a class="d-md-block" target="_blank" href="https://www.instagram.com/indacowd/"><img src="<?php echo site_url( 'resource/indaco/img/instagram.png' ) ?>"></a> 
						<a class="d-md-block" target="_blank" href="https://www.youtube.com/channel/UCk9w7tYd3XE0olC8mkgHDUw"><img src="<?php echo site_url( 'resource/indaco/img/youtube.png' ) ?>"></a>
						<a class="d-md-block" target="_blank" href="http://www.gbgindonesia.com/en/manufacturing/directory/indaco/introduction.php"><img src="<?php echo site_url( 'resource/indaco/img/gbgindo.png' ) ?>"></a> 
					</div>
				</div>
			</div>
		</div>
    </footer>

	<!-- SCRIPT -->
	<script src="<?php echo site_url( 'resource/indaco/js/jquery.min.js' ) ?>"></script>
	<script src="<?php echo site_url( 'resource/indaco/js/bootstrap.bundle.min.js' ) ?>"></script>
	<script src="<?php echo site_url( 'resource/indaco/js/jquery.easing.min.js' ) ?>"></script>
	<?php
		if (isset($js))
		{
			if (is_array($js))
			{
				foreach ($js as $item)
				{
					echo '<script src="'.$item.'"></script>'."\r\n";
				}
			}
			else
				echo '<script src="'.$js.'"></script>'."\r\n";
		}
	?>

</body>
</html>