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

<div id="dom_color">
	<div class="col-md-12" style="margin-top: 20px">
		<div class="row" style="margin-top: 20px">
			<div class="col-md-6">
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
		</div>
		<div class="row" style="margin-top: 20px">
			<div class="col-md-4">
				<input type="file" id="file-image" class="image_inspirasi" name="image_inspirasi[]" required>
			</div>
			<div class="col-md-4">
				<input type="file" id="file-background" class="background_inspirasi" name="background_inspirasi[]" required>
			</div>
			<div class="col-md-3"><button type="button" class="btn btn-sm btn-danger">Delete</button></div>
		</div>
	</div>
</div>

<div id="add_new_color" class="col-md-12" style="margin-top: 20px"><button type="button" class="btn btn-primary">Add Image</button></div>

<?php echo form_close() ?>

<div class="col-md-12" style="margin-top: 20px">
	<center>
		<a href="<?= site_url('ctrinspirasi')?>"><button class="btn">Kembali</button></a>
		<button class="btn btn-primary" id="simpan">Simpan</button>
	</center>
</div>

<script type="text/javascript">

	$('#add_new_color').click(function(){
		$('#dom_color').append(
			'<div class="col-md-12" style="margin-top:20px">'
			+'<div class="row" style="margin-top:20px">'
			+'<div class="col-md-6"><input class="form-control" type="text" class="inspiration_name" name="inspiration_name[]" placeholder="Inspiration Name" required></div>'
			+'</div>'
			+'<div class="row" style="margin-top: 20px">'
			+'<div class="col-md-4"><input type="file" id="file-image" class="image_inspirasi" name="image_inspirasi[]" required></div>'
			+'<div class="col-md-4"><input type="file" id="file-background" class="background_inspirasi" name="background_inspirasi[]" required></div>'
			+'<div class="col-md-3"><button type="button" class="btn btn-sm btn-danger" onclick="$(this).parent().parent().parent().remove();">Delete</button></div>'
			+'</div>'
			+'</div>'
			);
	})
	
	$('#simpan').click(function(){
		add();
	})

	function add(){
		form_serialize = $('#form_ajax').serialize();
		var formData = new FormData();		
		$('.image_inspirasi').each(function() {
		    files = this.files;
		    if (this.files && this.files[0]) {
		    	formData.append('image_inspirasi[]', this.files[0]);
		    }		    
		});

		$('.background_inspirasi').each(function() {
		    files = this.files;
		    if (this.files && this.files[0]) {
		    	formData.append('background_inspirasi[]', this.files[0]);
		    }		    
		});

		$('input[name^="inspiration_name"]').each(function() {
		    formData.append('inspiration_name[]', $(this).val());		    
		});

		formData.append('forms', form_serialize);

		$.ajax(
			{
				url : '<?= site_url('ctrinspirasi/add')?>',
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
							window.location.replace('<?= site_url('ctrinspirasi') ?>');
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