<!-- PAGE CONTENT-->
<div class="container-fluid mt-80 bg-indaco faq-wrapper">
	<div class="container">
	<div class="row">
		<div class="col-12 mx-auto text-center text-white">
			<h1 class="faq ml-5 ml-lg-0">FAQ</h1>
			<h4 class="faq-sub mt-0 mt-lg-4 ml-5 ml-lg-0">Frequently Asked <strong>Questions</strong></h4>
			<p class="lead col-12 col-lg-7 mx-lg-auto mt-4 mt-lg-5 ml-4 ml-lg-0">Kumpulan FAQ yang bisa Anda simak untuk mengetahui tentang kegiatan pengecatan.</p>
			<div class="mx-auto mt-5">
	    		<i class="fa fa-angle-down"></i>
				</div>
			</div>
		</div>
    	<?php foreach ($faq as $fa) : ?>
    		<div class="col-12 text-white mx-0 mx-lg-3 px-0 px-lg-3">
    			<?php echo $fa->content ?>
    		</div>
    	<?php endforeach; ?>
	</div>
</div><!-- /container-fluid -->