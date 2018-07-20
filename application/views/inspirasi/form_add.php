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

<div class="col-md-12" style="margin-top: 20px" id="dom_color">
	<div class="col-md-">
		<?php 
		$paramFormInput = array(
			'name'        => 'inspiration_name[]',
			'id'          => 'inspiration_name[]',
			'value'       => null,					
			'class'			=> 'form-control inspiration_name',
			'placeholder'	=> 'inspiration Name',
			'required'		=> 'required'
		);

		echo form_input($paramFormInput);
		?>
	</div>
	<div class="row" style="margin-top: 20px">
		
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

<div class="col-md-12" style="margin-top: 20px"><b>Files</b></div>
<div class="col-md-12" style="margin-top: 20px" id="dom_files">
	<div class="row" style="margin-top: 20px">
		<div class="col-md-3">
			<?php 
			$paramFormInput = array(
				'name'        => 'docs_name[]',
				'id'          => 'docs_name[]',
				'value'       => null,					
				'class'			=> 'form-control',
				'placeholder'	=> 'Files name'
			);

			echo form_input($paramFormInput);
			?>
		</div>
		<div class="col-md-3">
			<input type="file" class="docs" name="docs[]" required>
		</div>
		<div class="col-md-3"><button type="button" class="btn btn-sm btn-danger">Delete</button></div>
	</div>
</div>

<div id="add_new_files" class="col-md-12" style="margin-top: 20px"><button type="button" class="btn btn-primary">Add new files</button></div>

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

	$('#add_new_files').click(function(){
		$('#dom_files').append(
			'<div class="row" style="margin-top:5px">'
			+'<div class="col-md-3"><input class="form-control" type="text" name="docs_name[]" placeholder="Files name"></div>'
			+'<div class="col-md-3"><input type="file" class="docs" name="docs[]" placeholder="Files name" required></div>'
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
					if(result){
						toastr['success']('input berhasil');
						setTimeout(function(){
							window.location.replace('<?= site_url('product_crud') ?>');
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