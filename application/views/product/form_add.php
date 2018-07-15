<link rel="stylesheet" href="<?= base_url('resource/js/dropzone/basic.css') ?>">
<link rel="stylesheet" href="<?= base_url('resource/js/dropzone/dropzone.css') ?>">

<?php echo form_open('#',array('id' => 'form_ajax')); ?>

<div class="col-md-2">Name</div>
<div class="col-md-10">
	<?php 
		$paramFormInput = array(
			'name'        => 'name',
			'id'          => 'name',
			'value'       => (isset($name))?$name:null,					
			'class'			=> 'form-control',
	        'style'         => 'width:50%',
	        'placeholder'	=> ''
		);

		echo form_input($paramFormInput);
	?>
</div>



<div class="col-md-12" style="margin-top: 20px">
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#indonesia">Indonesia</a></li>
		<li><a data-toggle="tab" href="#english">English</a></li>
	</ul>

	<div class="tab-content" style="margin-top: 20px">
		<div id="indonesia" class="tab-pane fade in active">
			<div class="col-md-2">
				Judul
			</div>
			<div class="col-md-10">
				<?php 
					$paramFormInput = array(
						'name'        => 'ind_title',
						'id'          => 'ind_title',
						'value'       => (isset($ind_title))?$ind_title:null,					
						'class'			=> 'form-control',
				        'style'         => 'width:50%',
				        'placeholder'	=> ''
					);
				
					echo form_input($paramFormInput);
				?>
			</div>

			<div class="col-md-12" style="margin-top: 20px">
				<?php 
					$paramFormInput = array(
						'name'        => 'ind_description',
						'id'          => 'ind_description',
						'value'       => (isset($ind_description))?$ind_description:null,					
						'class'			=> '',
				        'placeholder'	=> 'description'
					);
				
					echo form_textarea($paramFormInput);
				?>
			</div>	
		</div>
		<div id="english" class="tab-pane fade">
			<div class="col-md-2">
				Title
			</div>
			<div class="col-md-10">
				<?php 
					$paramFormInput = array(
						'name'        => 'eng_title',
						'id'          => 'eng_title',
						'value'       => (isset($eng_title))?$eng_title:null,					
						'class'			=> 'form-control',
				        'style'         => 'width:50%',
				        'placeholder'	=> ''
					);
				
					echo form_input($paramFormInput);
				?>
			</div>

			<div class="col-md-12" style="margin-top: 20px">
				<?php 
					$paramFormInput = array(
						'name'        => 'eng_description',
						'id'          => 'eng_description',
						'value'       => (isset($eng_description))?$eng_description:null,					
						'class'			=> 'tinymce',
				        'placeholder'	=> 'description'
					);
				
					echo form_textarea($paramFormInput);
				?>
			</div>
		</div>
	</div>
</div>

<?php echo form_close() ?>

<div class="col-md-6">
	<h3>Image</h3>
	<form action="<?= site_url('Product/upload_image')?>" id="upload_image" class="dropzone" enctype="multipart/form-data">
      	
  	</form>
</div>

<div class="col-md-6">
	<h3>Background image</h3>
	<form action="<?= site_url('Product/upload_background_image')?>" id="upload_background_image" class="dropzone" enctype="multipart/form-data">
      	
  	</form>
</div>

<div class="col-md-12" style="margin-top: 20px">
	<center>
		<button class="btn btn-primary" id="simpan">Simpan</button>
	</center>
</div>


<script src="<?= base_url('resource/js/tiny_mce/tiny_mce.js') ?>"></script>
<script src="<?= base_url('resource/js/tiny_mce/jquery.tinymce.js') ?>"></script>
<script src="<?= base_url('resource/js/tiny_mce/plugins/insertdatetime/editor_plugin_src.js') ?>"></script>
<script src="<?= base_url('resource/js/dropzone/dropzone.js') ?>"></script>

<script type="text/javascript">
	tinymce.init({
	  selector: 'textarea',  // change this value according to your HTML
	  width : "100%"

	});

	Dropzone.autoDiscover = false;
	new Dropzone("#upload_background_image",
		{
			init: function() {
				this.on("success", function(file,status) { 
					if(status == '1'){
						toastr['success']('Sukses');
					}else{
						toastr['warning']('Gagal');
					}
				});
				this.on("error", function(file) { toastr['warning']('Gagal') });
			},
			paramName: "file", // The name that will be used to transfer the file
			maxFilesize: 2, // MB
			acceptedFiles: '.jpg,.jpeg,.png',
		}
	);

	new Dropzone("#upload_image",
		{
			init: function() {
				this.on("success", function(file,status) { 
					if(status == '1'){
						toastr['success']('Sukses');
					}else{
						toastr['warning']('Gagal');
					}
				});
				this.on("error", function(file) { toastr['warning']('Gagal') });
			},
			paramName: "file", // The name that will be used to transfer the file
			maxFilesize: 2, // MB
			acceptedFiles: '.jpg,.jpeg,.png',
		}
	);
	
	
	$('#simpan').click(function(){
		add();
		
	})

	function add(){
		$.ajax(
			{
				url : '<?= site_url('Product/add')?>',
				type: 'post',
				data : {
					'name' : $('#name').val(),
					'ind_title' : $('#ind_title').val(),
					'eng_title' : $('#eng_title').val(),
					'ind_description' : tinyMCE.get('ind_description').getContent(),
					'eng_description' : tinyMCE.get('eng_description').getContent()
				},
				beforeSend : function( xhr ){
					
				},
				success: function(result,status,xhr){
					hasil = JSON.parse(result);
					if(hasil.status == '0'){
						toastr['warning'](hasil.message);
					}else{
						toastr['success'](hasil.message);
						setTimeout(function(){
							window.location.replace('<?= site_url('Product') ?>');
						}, 2000);
					}	
				},
				complete : function(xhr,status){
				
				},
				error : function(xhr,status,error)	{
	
				}
			}
		)	
	}
</script>

