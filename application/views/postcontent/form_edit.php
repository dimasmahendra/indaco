<!-- Large Size -->
<div class="modal fade" id="addKategori" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Add Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <form id="form_addkategori" enctype="multipart/form-data" method="post">
            	<div class="modal-body">
        			<div class="form-group">
        				<label>Nama Kategori</label>
        				<input class="form-control" type="text" id="add_kategori" name="add_kategori">
        			</div>
            	</div>
            	<div class="modal-footer">
            		<button id="simpancolor" class="btn btn-primary">Simpan</button>
            	</div>
            </form>
        </div>
    </div>
</div>

<?php echo form_open('#',array('id' => 'form_ajax','enctype'=>'multipart/form-data')); ?>
<input type="hidden" name="post_id" id="post_id" value="<?php echo $id; ?>">

<div class="col-md-2">Title</div>
<div class="col-md-10">
	<?php 
		$paramFormInput = array(
			'name'        => 'name_post',
			'id'          => 'name_post',
			'value'       =>  (isset($title))?$title:null,					
			'class'			=> 'form-control',
	        'style'         => 'width:50%',
	        'placeholder'	=> ''
		);
		echo form_input($paramFormInput);
	?>
</div>

<div class="col-md-2">Author</div>
<div class="col-md-10">
	<?php 
		$paramFormInput = array(
			'name'        => 'author_post',
			'id'          => 'author_post',
			'value'       =>  (isset($author))?$author:null,					
			'class'			=> 'form-control',
	        'style'         => 'width:50%',
	        'placeholder'	=> ''
		);
		echo form_input($paramFormInput);
	?>
</div>

<div class="col-md-2">Source</div>
<div class="col-md-10">
	<?php 
		$paramFormInput = array(
			'name'        => 'source_post',
			'id'          => 'source_post',
			'value'       =>  (isset($source))?$source:null,					
			'class'			=> 'form-control',
	        'style'         => 'width:50%',
	        'placeholder'	=> ''
		);
		echo form_input($paramFormInput);
	?>
</div>

<div class="col-md-2" style="margin-top: 20px">Content</div>
<div class="col-md-12" style="margin-top: 20px">
	<?php 
	$paramFormInput = array(
		'name'        => 'content_post',
		'id'          => 'content_post',
		'value'       => (isset($content))?$content:null,					
		'class'			=> 'tinymce',
		'placeholder'	=> 'description'
	);

	echo form_textarea($paramFormInput);
	?>
</div>

<div class="col-md-2" style="margin-top: 20px">Image</div>
<div class="col-md-12" style="margin-top: 20px">
	<img src="<?php echo $img = (!empty($image)) ? base_url() .'resource/uploaded/img/postcontent/'.$image : null ?>" style="max-width: 200px;">
	<input type="hidden" name="prodimg" id="prodimg" value="<?php echo $image; ?>">
	<input type="file" id="file-image" class="image_post" name="image_post" required>
</div>

<div class="col-md-2" style="margin-top: 20px">Image Thumbnails</div>
<div class="col-md-12" style="margin-top: 20px">
	<img src="<?php echo $image_popup = (!empty($image_popup)) ? base_url() .'resource/uploaded/img/postcontent/'.$image_popup : null ?>" style="max-width: 200px;">
	<input type="hidden" name="prodimgthumb" id="prodimgthumb" value="<?php echo $image_popup; ?>">
	<input type="file" id="imagethumb" class="image_post_thumb" name="image_post_thumb" required>
</div>

<div class="col-md-2" style="margin-top: 20px">Video URL</div>
<div class="col-md-6">
	<?php 
	$paramFormInput = array(
		'name'        => 'video_post',
		'id'          => 'video_post',
		'value'       => (isset($video_url))?$video_url:null,					
		'class'			=> 'form-control',
		'required'		=> 'required'
	);

	echo form_input($paramFormInput);
	?>
</div>

<div class="col-md-12" style="margin-top: 20px"><b>Categories</b></div>
<div class="col-md-12" style="margin-top: 20px">
	<?php 
		$check = json_decode($categories, true);
		if (empty($check)) {
			$check = array();
		}
	?>
	<?php if(count($kategoriOptions) > 0): ?>
		<?php foreach($kategoriOptions as $key => $value): ?>
			<div class="col-md-3" style="margin-top: 5px">
				<input type="checkbox" value="<?= $key ?>" class="kategori_post" name="kategori_post[]" <?php echo $retVal = (in_array($key, $check)) ? "checked" : "" ; ?>><?= $value ?>
			</div>
		<?php endforeach ?>
	<?php else: ?>
		No feature data
	<?php endif ?>
</div>

<div id="add_new_color" class="col-md-12" style="margin-top: 20px">
	<a class="edit-inspirasi" href="#" data-toggle="modal" data-target="#addKategori" data-backdrop="false">
		<button type="button" class="btn btn-primary">Add Kategories</button>
	</a>
</div>

<?php echo form_close() ?>

<div class="col-md-12" style="margin-top: 20px">
	<center>
		<a href="<?= site_url('ctrpostcontent')?>"><button class="btn">Kembali</button></a>
		<button class="btn btn-primary" id="simpan">Simpan</button>
	</center>
</div>

<script src="<?= base_url('resource/js/tiny_mce/tiny_mce.js') ?>"></script>
<script src="<?= base_url('resource/js/tiny_mce/jquery.tinymce.js') ?>"></script>
<script src="<?= base_url('resource/js/tiny_mce/plugins/insertdatetime/editor_plugin_src.js') ?>"></script>

<script type="text/javascript">

	tinymce.init({
	  selector: 'textarea',  // change this value according to your HTML
	  width : "100%",
	  verify_html : false

	});

	$('form#form_addkategori').submit(function(e){
    	e.preventDefault();
		var nama_kategori = $('#add_kategori').val();
		$.ajax(
			{
				url : '<?= site_url('ctrpostcontent/insertKategori')?>',
				type: 'post',
				data : {
					nama:nama_kategori,
				},
				beforeSend : function( xhr ){
					toastr['info']('harap tunggu');
				},
				success: function(result,status,xhr){
					hasil = JSON.parse(result);
					console.log(hasil);
					if(hasil.status == '0'){
						toastr['warning'](hasil.message);
					}else{
						toastr['success'](hasil.message);
						setTimeout(function(){
							window.location.replace('<?= site_url('ctrpostcontent')?>');
						}, 1000);
					}	
				},
				complete : function(xhr,status){
				
				},
				error : function(xhr,status,error)	{
	
				}
			}
		)
	})

	$('.image_post').change(function(e){
		var fileName = e.target.files[0].name;
		$('#prodimg').val(fileName);
	});

	$('.image_post_thumb').change(function(e){
		var fileName = e.target.files[0].name;
		$('#prodimgthumb').val(fileName);
	});
	
	$('#simpan').click(function(){
		tinyMCE.triggerSave();
		add();
	})

	function add(){
		form_serialize = $('#form_ajax').serialize();

		var featval = [];
		$(':checkbox:checked').each(function(i){
        	featval[i] = $(this).val();
        });

		var formData = new FormData();

	    formData.append('image', $('input[name=image_post]')[0].files[0]); 
	    formData.append('imagethumb', $('input[name=image_post_thumb]')[0].files[0]); 
		formData.append('forms', form_serialize);
		formData.append('feature', featval);

		$.ajax(
			{
				url : '<?= site_url('ctrpostcontent/add')?>',
				type: 'post',
				data : formData,
				contentType: false,
    			processData: false,
				beforeSend : function( xhr ){
					toastr['info']('harap tunggu');
				},
				success: function(result,status,xhr){
					console.log(result);
					if(result){
						toastr['success']('input berhasil');
						setTimeout(function(){
							window.location.replace('<?= site_url('ctrpostcontent') ?>');
						}, 1000);
					}else{
						toastr['warning']('input gagal');
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