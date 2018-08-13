<?php $this->load->view('layout/admin/head_default') ?>
<?php $this->load->view('layout/admin/nav_default') ?>

<link rel="stylesheet" href="<?= base_url('resource/js/dropzone/basic.css') ?>">
<link rel="stylesheet" href="<?= base_url('resource/js/dropzone/dropzone.css') ?>">

<?php echo form_open('#',array('id' => 'form_ajax')); ?>

<div class="col-md-2" style="margin-top: 20px">Link 1</div>
<div class="col-md-10" style="margin-top: 20px">
	<?php 
		$paramFormInput = array(
			'name'        => 'link_1',
			'id'          => 'link_1',
			'value'       => (isset($link_1)) ? $link_1 : null,					
			'class'			=> 'form-control',
	        'style'         => 'width:50%',
	        'placeholder'	=> ''
		);

		echo form_input($paramFormInput);
	?>
</div>

<div class="col-md-2" style="margin-top: 20px">Link 2</div>
<div class="col-md-10" style="margin-top: 20px">
	<?php 
		$paramFormInput = array(
			'name'        => 'link_2',
			'id'          => 'link_2',
			'value'       => (isset($link_2)) ? $link_2 : null,					
			'class'			=> 'form-control',
	        'style'         => 'width:50%',
	        'placeholder'	=> ''
		);

		echo form_input($paramFormInput);
	?>
</div>

<div class="col-md-2" style="margin-top: 20px">Video 1</div>
<div class="col-md-12" style="margin-top: 20px">
	<input type="hidden" name="prodimg" id="prodimg" value="<?php echo $home_video_1; ?>">
	<span>Video Di Database : <?php echo $home_video_1; ?></span>
	<input type="file" id="file-image" class="video_post" name="video_post" required>
</div>

<div class="col-md-2" style="margin-top: 20px">Video 2</div>
<div class="col-md-12" style="margin-top: 20px">
	<input type="hidden" name="prodimgthumb" id="prodimgthumb" value="<?php echo $home_video_2; ?>">
	<span>Video Di Database : <?php echo $home_video_2; ?></span>
	<input type="file" id="imagethumb" class="video_post_thumb" name="video_post_thumb" required>
</div>

<?php echo form_close() ?>

<div class="col-md-6">
	<h3>Image Video</h3>
	<form action="<?= site_url('ctrhomepage/upload_image_1')?>" id="upload_image_1" class="dropzone" enctype="multipart/form-data">
      	<?php if(isset($home_image_1)):?>
      		<center>
      			<small><i>image pada database</i></small>
      			<img class="img-responsive" width="100px" src="<?= base_url('resource/uploaded/img/homepage').'/'.$home_image_1 ?>">
      		</center>
      	<?php endif ?>
  	</form>
</div>

<div class="col-md-6">
	<h3>Homepage Image</h3>
	<form action="<?= site_url('ctrhomepage/upload_image_2')?>" id="upload_image_2" class="dropzone" enctype="multipart/form-data">
      	<?php if(isset($home_image_2)):?>
      		<center>
      			<small><i>image pada database</i></small>
      			<img class="img-responsive" width="100px" src="<?= base_url('resource/uploaded/img/homepage').'/'.$home_image_2 ?>">
      		</center>
      	<?php endif ?>
  	</form>
</div>

<div class="col-md-12" style="margin-top: 20px">
	<center><small>
		Saat upload file, harap tunggu sampai proses upload selesai, sebelum klik tombol simpan
	</small></center>
</div>

<div class="col-md-12" style="margin-top: 20px">
	<center>
		<a href="<?= site_url('ctrdepo')?>"><button class="btn">Kembali</button></a>
		<button class="btn btn-primary" id="simpan">Simpan</button>
	</center>
</div>

<script src="<?= base_url('resource/js/dropzone/dropzone.js') ?>"></script>

<script type="text/javascript">

	Dropzone.autoDiscover = false;
	new Dropzone("#upload_image_1",
		{
			init: function() {
				this.on("processing", function(file,status) {toastr['info']('harap tunggu sampai upload selesai')});
				this.on("success", function(file,status) { 
					if(status == '1'){
						toastr['success']('Sukses');							
					}else{
						toastr['warning']('Gagal');
					}
				});
				this.on("error", function(file) { toastr['warning']('Gagal') });
			},
			paramName: "image_1", // The name that will be used to transfer the file
			maxFilesize: 2, // MB
			acceptedFiles: '.jpg,.jpeg,.png'
		}
	);

	Dropzone.autoDiscover = false;
	new Dropzone("#upload_image_2",
		{
			init: function() {
				this.on("processing", function(file,status) {toastr['info']('harap tunggu sampai upload selesai')});
				this.on("success", function(file,status) { 
					if(status == '1'){
						toastr['success']('Sukses');							
					}else{
						toastr['warning']('Gagal');
					}
				});
				this.on("error", function(file) { toastr['warning']('Gagal') });
			},
			paramName: "image_2", // The name that will be used to transfer the file
			maxFilesize: 2, // MB
			acceptedFiles: '.jpg,.jpeg,.png'
		}
	);

	$('.video_post').change(function(e){
		var fileName = e.target.files[0].name;
		$('#prodimg').val(fileName);
	});

	$('.video_post_thumb').change(function(e){
		var fileName = e.target.files[0].name;
		$('#prodimgthumb').val(fileName);
	});
	
	$('#simpan').click(function(){
		add();		
	})

	function add(){
		form_serialize = $('#form_ajax').serialize();
		var formData = new FormData();
	    formData.append('video', $('input[name=video_post]')[0].files[0]); 
	    formData.append('videothhumb', $('input[name=video_post_thumb]')[0].files[0]); 
	    formData.append('forms', form_serialize);

		$.ajax(
			{
				url : '<?= site_url('ctrhomepage/add')?>',
				type: 'post',
				data : formData,
				contentType: false,
    			processData: false,
				beforeSend : function( xhr ){
					toastr['info']('harap tunggu');
				},
				success: function(result,status,xhr){
					console.log(result);
					/*hasil = JSON.parse(result);
					if(hasil.status == '0'){
						toastr['warning'](hasil.message);
					}else{
						toastr['success'](hasil.message);
						setTimeout(function(){
							window.location.replace('<?= site_url('ctrhomepage') ?>');
						}, 1000);
					}*/	
				},
				complete : function(xhr,status){
				
				},
				error : function(xhr,status,error)	{
	
				}
			}
		)	
	}
</script>

<?php $this->load->view('layout/admin/nav_end_default') ?>
<?php $this->load->view('layout/admin/js_default') ?>
<?php $this->load->view('layout/admin/footer_default') ?>