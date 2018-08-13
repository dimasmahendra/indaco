<link rel="stylesheet" href="<?= base_url('resource/js/dropzone/basic.css') ?>">

<?php echo form_open('#',array('id' => 'form_ajax','enctype'=>'multipart/form-data')); ?>

<div class="col-md-2">Name</div>
<div class="col-md-10">
	<?php 
		$paramFormInput = array(
			'name'        => 'name',
			'id'          => 'name',
			'value'       =>  null,					
			'class'			=> 'form-control',
	        'style'         => 'width:50%',
	        'placeholder'	=> ''
		);

		echo form_input($paramFormInput);
	?>
</div>

<div class="col-md-2" style="margin-top: 20px">Type</div>
<div class="col-md-10"  style="margin-top: 20px">
	<?php
		$options = $typeOptions;
		$optionsSelected = null;
		$extra = 'style="width:50%"';
		echo form_dropdown('typeOptionsSelected', $options, $optionsSelected, $extra);
	?>
</div>

<div class="col-md-2" style="margin-top: 20px">Type name</div>
<div class="col-md-10" style="margin-top: 20px">
	<?php 
		$paramFormInput = array(
			'name'        => 'type_title',
			'id'          => 'type_title',
			'value'       => null,					
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
			<div class="col-md-12" style="margin-top: 20px">
				<?php 
					$paramFormInput = array(
						'name'        => 'ind_description',
						'id'          => 'ind_description',
						'value'       => null,					
						'class'			=> '',
				        'placeholder'	=> 'description'
					);
				
					echo form_textarea($paramFormInput);
				?>
			</div>	
		</div>
		<div id="english" class="tab-pane fade">
			<div class="col-md-12" style="margin-top: 20px">
				<?php 
					$paramFormInput = array(
						'name'        => 'eng_description',
						'id'          => 'eng_description',
						'value'       => null,					
						'class'			=> 'tinymce',
				        'placeholder'	=> 'description'
					);
				
					echo form_textarea($paramFormInput);
				?>
			</div>
		</div>
	</div>
</div>

<div class="col-md-2" style="margin-top: 20px"><b>Product Images</b></div>
<div class="col-md-10" style="margin-top: 20px">
	<input type="hidden" name="prodimg" id="prodimg" value="">
	<input type="file" class="product_images" name="product_images[]">
</div>

<div class="col-md-12" style="margin-top: 20px"><b>Features</b></div>
<div class="col-md-12" style="margin-top: 20px">
	<?php if(count($features) > 0): ?>
		<?php foreach($features as $key => $value): ?>
			<div class="col-md-3" style="margin-top: 5px">
				<input type="checkbox" value="<?= $key ?>" class="feature" name="feature[]"><?= $value ?>
			</div>
		<?php endforeach ?>
	<?php else: ?>
		No feature data
	<?php endif ?>
</div>

<div class="col-md-12" style="margin-top: 20px"><b>Colours</b></div>
<div class="col-md-12" style="margin-top: 20px" id="dom_color">
	<div class="row" style="margin-top: 20px">
		<div class="col-md-3">
			<?php 
			$paramFormInput = array(
				'name'        => 'color_name[]',
				'id'          => 'color_name[]',
				'value'       => null,					
				'class'			=> 'form-control color_name',
				'placeholder'	=> 'color name',
				'required'		=> 'required'
			);

			echo form_input($paramFormInput);
			?>
		</div>
		<div class="col-md-3">
			<?php 
			$paramFormInput = array(
				'name'        => 'color_code[]',
				'id'          => 'color_code[]',
				'value'       => null,					
				'class'			=> 'form-control color_code',
				'placeholder'	=> 'color code'
			);

			echo form_input($paramFormInput);
			?>
		</div>
		<div class="col-md-3">
			<input type="file" id="file-select" class="color" name="color[]" required>
		</div>
		<div class="col-md-3"><button type="button" class="btn btn-sm btn-danger">Delete</button></div>
	</div>
</div>
<div id="add_new_color" class="col-md-12" style="margin-top: 20px"><button type="button" class="btn btn-primary">Add new colour</button></div>

<div class="col-md-12" style="margin-top: 20px"><b>Color Card</b></div>
<div class="col-md-12" style="margin-top: 20px">
	<div class="row" style="margin-top: 20px">
		<div class="col-md-3">
			<?php 
			$paramFormInput = array(
				'name'        => 'docs_name[]',
				'id'          => 'docs_name[]',
				'value'       => 'Color Card',					
				'class'			=> 'form-control',
				'placeholder'	=> 'Files name'
			);

			echo form_input($paramFormInput);
			?>
		</div>
		<div class="col-md-3">
			<input type="file" class="docs" name="docs[]" required>
		</div>
	</div>
</div>

<div class="col-md-12" style="margin-top: 20px"><b>Data Teknis</b></div>
<div class="col-md-12" style="margin-top: 20px">
	<div class="row" style="margin-top: 20px">
		<div class="col-md-3">
			<?php 
			$paramFormInput = array(
				'name'        => 'docs_name[]',
				'id'          => 'docs_name[]',
				'value'       => 'Data Teknis',					
				'class'			=> 'form-control',
				'placeholder'	=> 'Files name'
			);

			echo form_input($paramFormInput);
			?>
		</div>
		<div class="col-md-3">
			<input type="file" class="docs" name="docs[]" required>
		</div>
	</div>
</div>

<div class="col-md-12" style="margin-top: 20px"><b>MSDS</b></div>
<div class="col-md-12" style="margin-top: 20px">
	<div class="row" style="margin-top: 20px">
		<div class="col-md-3">
			<?php 
			$paramFormInput = array(
				'name'        => 'docs_name[]',
				'id'          => 'docs_name[]',
				'value'       => 'MSDS',					
				'class'			=> 'form-control',
				'placeholder'	=> 'Files name'
			);

			echo form_input($paramFormInput);
			?>
		</div>
		<div class="col-md-3">
			<input type="file" class="docs" name="docs[]" required>
		</div>
	</div>
</div>

<?php echo form_close() ?>

<div class="col-md-12" style="margin-top: 20px">
	<center>
		<a href="<?= site_url('product_crud')?>"><button class="btn">Kembali</button></a>
		<button class="btn btn-primary" id="simpan">Simpan</button>
	</center>
</div>


<script src="<?= base_url('resource/js/tiny_mce/tiny_mce.js') ?>"></script>
<script src="<?= base_url('resource/js/tiny_mce/jquery.tinymce.js') ?>"></script>
<script src="<?= base_url('resource/js/tiny_mce/plugins/insertdatetime/editor_plugin_src.js') ?>"></script>

<script type="text/javascript">
	tinymce.init({
	  selector: 'textarea',  // change this value according to your HTML
	  width : "100%"

	});

	$('#add_new_color').click(function(){
		$('#dom_color').append(
			'<div class="row" style="margin-top:5px">'
			+'<div class="col-md-3"><input class="form-control" type="text" class="color_name" name="color_name[]" placeholder="color name"></div>'
			+'<div class="col-md-3"><input class="form-control" type="text" class="color_code" name="color_code[]" placeholder="color code"></div>'
			+'<div class="col-md-3"><input type="file" id="file-select" class="color" name="color[]" placeholder="color name" required></div>'
			+'<div class="col-md-3"><button type="button" class="btn btn-sm btn-danger" onclick="$(this).parent().parent().remove();" >Delete</button></div>'
			+'</div>'
			);
	})

	$('.product_images').change(function(e){
		var fileName = e.target.files[0].name;
		$('#prodimg').val(fileName);
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
		$('.color').each(function() {
		    files = this.files;
		    if (this.files && this.files[0]) {
		    	formData.append('color[]', this.files[0]);
		    }		    
		});

		$('.docs').each(function() {
		    files = this.files;
		    if (this.files && this.files[0]) {
		    	formData.append('docs[]', this.files[0]);
		    }		    
		});

		$('.product_images').each(function() {
		    files = this.files;
		    if (this.files && this.files[0]) {
		    	formData.append('product_images[]', this.files[0]);
		    }    
		});
		$('input[name^="color_name"]').each(function() {
		    formData.append('color_name[]', $(this).val());		    
		});
		$('input[name^="color_code"]').each(function() {
		    formData.append('color_code[]', $(this).val());		    
		});
		$('input[name^="docs_name"]').each(function() {
		    formData.append('docs_name[]', $(this).val());		    
		});
		formData.append('forms', form_serialize);
		formData.append('feature', featval);

		$.ajax(
			{
				url : '<?= site_url('product_crud/add')?>',
				type: 'post',
				data : formData,
				contentType: false,
    			processData: false,
				beforeSend : function( xhr ){
					toastr['info']('harap tunggu');
				},
				success: function(result,status,xhr){
					//hasil = JSON.parse(result);
					console.log(result);
					/*if(result){
						toastr['success']('input berhasil');
						setTimeout(function(){
							window.location.replace('<?= site_url('product_crud') ?>');
						}, 1000);
					}else{
						toastr['warning']('input gagal');
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