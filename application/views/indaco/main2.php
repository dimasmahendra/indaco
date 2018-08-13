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
    <title>BERITA - INDACO</title>
    <link href="<?php echo site_url( 'resource/indaco/css/bootstrap.min.css' ) ?>" rel="stylesheet">
    <link href="<?php echo site_url( 'resource/indaco/css/style.css' ) ?>" rel="stylesheet">
    <link href="<?php echo site_url( 'resource/indaco/css/font-face.css' ) ?>" rel="stylesheet">
    <link href="<?php echo site_url( 'resource/indaco/css/fontawesome-all.min.css' ) ?>" rel="stylesheet">
    <link href="<?php echo site_url( 'resource/indaco/css/jquery.mCustomScrollbar.css' ) ?>" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo site_url( 'resource/indaco/img/favicon.ico' ) ?>">
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
    <nav class="navbar fixed-top navbar-expand-lg bg-white">
      <div class="container">
      	<a class="navbar-brand news-logo mx-auto d-block" href="<?php echo site_url() ?>"><img src="<?php echo site_url( 'resource/indaco/img/indaco-news.png' ) ?>" alt="INDACO"></a>
        <button class="navbar-toggler news-nav" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-left">
          <ul class="navbar-nav news-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url() ?>">BERANDA</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-none d-lg-block" href="#" onclick="javascript:location.href='<?php echo site_url('product') ?>'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUK</a>
              <a class="nav-link dropdown-toggle d-block d-lg-none" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUK</a>
              <div class="dropdown-menu produk dropdown-triangle">
              	<?php
                  foreach ($data as $key => $value) { ?>
                    <a class="dropdown-item" href="<?php echo site_url('product'); ?>#<?php echo strtolower(str_replace(" ", "", $value['name'])) ?>"><?php echo $value['name']; ?></a>
                <?php }
                ?>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('inspirasi') ?>">INSPIRASI</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('cara-kami') ?>">CARA KAMI</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-none d-lg-block" href="#" onclick="javascript:location.href='<?php echo site_url('tentang-kami') ?>'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TENTANG KAMI</a>
              <a class="nav-link dropdown-toggle d-block d-lg-none" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TENTANG KAMI</a>
              <div class="dropdown-menu tentang dropdown-triangle">
              	<a class="dropdown-item" href="<?php echo site_url('tentang-kami') ?>">TENTANG INDACO</a>
                <a class="dropdown-item" href="<?php echo site_url('hubungi-kami') ?>">HUBUNGI KAMI</a>
                <a class="dropdown-item" href="<?php echo site_url('proyek') ?>">PROYEK</a>
                <a class="dropdown-item" href="<?php echo site_url('csr') ?>">CSR</a>
                <a class="dropdown-item" href="<?php echo site_url('faq') ?>">FAQ</a>
              </div>
            </li>
            <li class="nav-item d-block d-lg-none">
              <a class="nav-link" href="<?php echo site_url('berita') ?>">BERITA TERKINI</a>
            </li>
            <li class="nav-item nav-cari d-block d-lg-none bg-white">
              <a class="nav-link" href="#cari-modal" data-toggle="modal"><i class="fa fa-search mr-2"></i> SEARCH</a>
            </li>
            <li class="nav-item dropdown search d-none d-lg-block">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
              <div class="dropdown-menu dropdown-search-triangle">
              	<form action="<?php echo site_url( 'search' ) ?>" method="GET" class="form-inline">
                  <input name="key" class="form-control form-control-sm" type="text" placeholder="CARI" aria-label="CARI">
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
								<form action="<?php echo site_url( 'search' ) ?>" role="search" method="get" class="search-form cari-modal-form">
									<label class="sr-only">Search</label>
									<div class="input-group golek">
										<i class="fa fa-search" aria-hidden="true"></i>
										<input type="text" name="key" class="search-field form-control" placeholder="Search">
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
	<footer>
		<!-- TOP FOOTER -->
		<div class="container-fluid py-4 top-footer">
      <div class="container">
      	<div class="row mx-lg-3">
      		<div class="col-12 col-lg-6 align-self-center">
      			<span class="lead text-white d-none d-lg-block">Tidak mau ketinggalan berita? Jadilah pelanggan surel kami.</span>
      			<span class="small text-white text-center mb-3 d-block d-lg-none">Tidak mau ketinggalan berita?<br>Jadilah pelanggan surel kami.</span>
      		</div>
      		<div class="col-12 col-lg-6">
      			<form id="form-subscriber" class="form-inline float-md-right">
              <div class="input-group">
                <input name="subs_email" type="text" class="form-control form-control-subscribe" placeholder="EMAIL ANDA" aria-label="EMAIL ANDA">
                <div class="input-group-append">
                  <button class="btn btn-white" type="submit">KIRIM</button>
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
      				<a href="<?php echo site_url() ?>">BERANDA</a> | <a href="<?php echo site_url('product') ?>">PRODUK</a> | <a href="<?php echo site_url('inspirasi') ?>">INSPIRASI</a><br><a href="<?php echo site_url('cara-kami') ?>">CARA KAMI</a> | <a href="<?php echo site_url('tentang-kami') ?>">TENTANG KAMI</a><br><a href="javascript:void(0)">BERGABUNG</a> | <a href="<?php echo site_url('faq') ?>">FAQ</a> | <a href="<?php echo site_url('berita') ?>">BERITA</a> | <a href="<?php echo site_url('csr') ?>">CSR</a>
      			</div>
      			<div class="float-left d-none d-lg-block mt-4">
	      			<ul class="footer-nav">
                <li><a href="<?php echo site_url() ?>">BERANDA</a></li>
              <li><a href="<?php echo site_url('product') ?>">PRODUK</a></li>
              <li><a href="<?php echo site_url('inspirasi') ?>">INSPIRASI</a></li>
              <li><a href="<?php echo site_url('cara-kami') ?>">CARA KAMI</a></li>
              <li><a href="<?php echo site_url('tentang-kami') ?>">TENTANG KAMI</a></li>
              </ul>
      			</div>
      			<div class="float-right d-none d-lg-block mt-4">
	      			<ul class="footer-nav">
                <li><a href="javascript:void(0)">BERGABUNG</a></li>
                <li><a href="<?php echo site_url('faq') ?>">FAQ</a></li>
                <li><a href="<?php echo site_url('berita') ?>">BERITA</a></li>
                <li><a href="<?php echo site_url('csr') ?>">CSR</a></li>
              </ul>
      			</div>
      		</div>
      		<div class="col-12 col-lg-4 pl-md-5 mt-4 mt-lg-0">
      			<h5>Hubungi Kami</h5>
      			<hr class="footer-hr footer-hr-mobile-2">
      			<p class="small d-block d-lg-none mt-0">Jl. Raya Solo - Sragen Km. 13,2 Desa Pulosari, Kec. Kebakkramat, Karanganyar<br>Solo - 57762, Indonesia<br><br>Phone: +62 271 - 8200872 (Hunting)<br>Fax: +62 271 - 8200875<br>Email: info@indaco.id<br>Website: www.indaco.id</p>
      			<p class="d-none d-lg-block mt-5">Jl. Raya Solo - Sragen Km. 13,2<br>Desa Pulosari, Kec. Kebakkramat,<br>Karanganyar, Solo - 57762, Indonesia</p>
      			<table class="table borderless d-none d-lg-block">
      				<tbody>
      					<tr>
      						<td>Phone</td>
      						<td>:&nbsp;&nbsp;+62 271 - 8200872 (Hunting)</td>
      					</tr>
      					<tr>
      						<td>Fax</td>
      						<td>:&nbsp;&nbsp;+62 271 - 8200875</td>
      					</tr>
      					<tr>
      						<td>Email</td>
      						<td>:&nbsp;&nbsp;info@indaco.id</td>
      					</tr>
      					<tr>
      						<td>Website</td>
      						<td>:&nbsp;&nbsp;www.indaco.id</td>
      					</tr>
      				</tbody>
      			</table>
      		</div>
      		<div class="col-12 col-lg-1">
      			<div class="icon-bar mt-4">
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
    <script src="<?php echo site_url( 'resource/indaco/js/jquery.mCustomScrollbar.concat.min.js' ) ?>"></script>
    <script src="<?php echo site_url( 'resource/indaco/js/indaco.js' ) ?>"></script>

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

  <script type="text/javascript">
    $(function() {
      $('body').on('submit', '#form-subscriber', function(){
        $.post(siteurl+'ctrpublic/subscriber_save', $(this).serialize(), function(){
          $('#form-subscriber').find('button[type="submit"]').text('Email disimpan').attr('type', 'button');
          $('#form-subscriber').find('input[name="subs_email"]').val('');
        });
        return false;
      });
    });
  </script>

	<script>
	$(document).ready(function () {
	  $(".navbar-toggler").on("click", function () {
	  $(this).toggleClass("active");
		});
	});
	</script>

</body>
</html>