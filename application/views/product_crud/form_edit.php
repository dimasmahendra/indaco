<link rel="stylesheet" href="<?= base_url('resource/js/dropzone/basic.css') ?>">

<!-- Large Size -->
<div class="modal fade" id="editBahan" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Edit Colour Image</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <form id="form_editcolor" enctype="multipart/form-data" method="post">
            	<div class="modal-body">
        			<input type="hidden" name="id_color" id="id_color" value="">
        			<input type="hidden" name="id_product" id="id_product" value="">
        			<div class="form-group">
        				<input class="form-control" type="text" id="name_color" name="name_color">
        			</div>
        			<div class="form-group">
        				<input class="form-control" type="text" id="code_color" name="code_color">
        			</div>
        			<div class="form-group">
        				<img src="" id="image_show" style="max-height: 100px; max-width: 100px;">
        				<input type="hidden" id="image_color" name="image_color">
        				<input type="file" id="image_upload" name="image_upload">
        			</div>            
            	</div>
            	<div class="modal-footer">
            		<button id="simpancolor" class="btn btn-primary">
            			Simpan
            		</button>
            	</div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editFiles" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Edit Files</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <form id="form_editfiles" enctype="multipart/form-data" method="post">
            	<div class="modal-body">
        			<input type="hidden" name="id_file" id="id_file" value="">
        			<input type="hidden" name="id_products" id="id_products" value="">
        			<div class="form-group">
        				<input class="form-control" type="text" id="name_file" name="name_file">
        			</div>
        			<div class="form-group">
        				<input type="hidden" id="file_name" name="file_name">
        				<span id="filename_show"></span>
        				<input type="file" id="file_upload" name="file_upload">
        			</div>           
            	</div>
            	<div class="modal-footer">
            		<button id="simpancolor" class="btn btn-primary">
            			Simpan
            		</button>
            	</div>
            </form>
        </div>
    </div>
</div>

<?php echo form_open('#',array('id' => 'form_ajax','enctype'=>'multipart/form-data')); ?>
<input type="hidden" name="product_id" id="product_id" value="<?php echo $id; ?>">
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

<div class="col-md-2" style="margin-top: 20px">Type</div>
<div class="col-md-10"  style="margin-top: 20px">
	<?php
		$options = $typeOptions;
		$optionsSelected = (isset($type_id)) ? $type_id : null;
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
			'value'       => (isset($type_title))?$type_title:null,					
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
						'value'       => (isset($ind_description))?$ind_description:null,					
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

<div class="col-md-2" style="margin-top: 20px"><b>Product Images</b></div>
<div class="col-md-10" style="margin-top: 20px">
	<img src="<?php echo $img = (isset($image)) ? base_url() .'resource/uploaded/img/product_images/'.$image : null ?>" style="max-width: 200px;">
	<input type="hidden" name="prodimg" id="prodimg" value="<?php echo $image; ?>">
	<input type="file" class="product_images" name="product_images[]">
</div>

<div class="col-md-12" style="margin-top: 20px"><b>Features</b></div>
<div class="col-md-12" style="margin-top: 20px">
	<?php 
		$check = json_decode($features_id, true);
		if (empty($check)) {
			$check = array();
		}
	?>
	<?php if(count($features) > 0): ?>
		<?php foreach($features as $key => $value): ?>
			<div class="col-md-3" style="margin-top: 5px">
				<input type="checkbox" value="<?= $key ?>" class="feature" name="feature[]" <?php echo $retVal = (in_array($key, $check)) ? "checked" : "" ; ?>><?= $value ?>
			</div>
		<?php endforeach ?>
	<?php else: ?>
		No feature data
	<?php endif ?>
</div>

<div class="col-md-12" style="margin-top: 20px"><b>Colours</b></div>
<div class="col-md-12" style="margin-top: 20px" id="dom_color">	
	<div class="row" style="margin-top: 20px">
		<table class="dataTable table" style="width:100%">
			<thead>
				<tr>
					<th>Name</th>
					<th>Code</th>
					<th>Image</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;            
				foreach ($color_images as $row)
					{ ?>
						<tr>                               
							<td><?php echo $row['name']; ?></td>                                
							<td><?php echo $row['code']; ?></td>
							<td>
								<img src="<?php echo base_url() ?>resource/uploaded/img/<?php echo $row['image']; ?>" style="max-height: 80px; max-width: 80px;">
							</td>
							<td>                               
								<a class="edit-colorimage" href="#" data-toggle="modal" data-target="#editBahan" 
									data-id = "<?php echo $row['id']; ?>"
									data-product_id = "<?php echo $row['product_id']; ?>"
									data-name = "<?php echo $row['name']; ?>"
									data-code = "<?php echo $row['code']; ?>"
									data-image = "<?php echo $row['image']; ?>"
									data-imageurl = "<?php echo base_url(); ?>resource/uploaded/img/<?php echo $row['image']; ?>"
								>
								<button type="button" class="btn btn-primary">
									Edit
								</button>
							</a>
							<a href="<?php echo base_url(); ?>product_crud/delete_color/<?php echo $row['id']; ?>">
								<button type="button" class="btn btn-danger">
									Delete	
								</button>
							</a>
						</td>
					</tr>
				<?php } ?>            
			</tbody>              
		</table>
	</div>
</div>
<div id="add_new_color" class="col-md-12" style="margin-top: 20px"><button type="button" class="btn btn-primary">Add new colour</button></div>

<div class="col-md-12" style="margin-top: 20px"><b>Files</b></div>
<div class="col-md-12" style="margin-top: 20px" id="dom_files">
	<table class="dataTable table" style="width:100%">
		<thead>
			<tr>
				<th>Name</th>
				<th>Filename</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;            
			foreach ($docs_product as $row)
				{ ?>
					<tr>                               
						<td><?php echo $row['name']; ?></td>                                
						<td><?php echo $row['filename']; ?></td>
						<td>                               
							<a class="edit-files" href="#" data-toggle="modal" data-target="#editFiles" 
							data-id = "<?php echo $row['id']; ?>"
							data-product_id = "<?php echo $row['product_id']; ?>"
							data-name = "<?php echo $row['name']; ?>"
							data-filename = "<?php echo $row['filename']; ?>"
							>
							<button type="button" class="btn btn-primary">
								Edit
							</button>
						</a>
						<a href="<?php echo base_url(); ?>product_crud/delete_file/<?php echo $row['id']; ?>">
							<button type="button" class="btn btn-danger">
								Delete	
							</button>
						</a>
					</td>
				</tr>
			<?php } ?>            
		</tbody>              
	</table>
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

	$('.edit-files').click(function(){
        var id = $(this).data('id');
        var product_id = $(this).data('product_id');
        var name = $(this).data('name');
        var filename = $(this).data('filename');
        if (id) {
	            $('#id_file').val(id);
	            $('#id_products').val(product_id);
	            $('#name_file').val(name);
	            $('#file_name').val(filename);       
	            $("#filename_show").text(filename);       
            }
        else{
            alert('Data tidak ditemukan !!!');
        }
    });

    $('form#form_editfiles').submit(function(e){
    	e.preventDefault();
		var formData = new FormData(this);
		$.ajax(
			{
				url : '<?= site_url('product_crud/editfiles')?>',
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
	})

	$('.edit-colorimage').click(function(){
        var id = $(this).data('id');
        var product_id = $(this).data('product_id');
        var name = $(this).data('name');
        var code = $(this).data('code');
        var image = $(this).data('image');
        var imageurl = $(this).data('imageurl');
        if (id) {
	            $('#id_color').val(id);
	            $('#id_product').val(product_id);
	            $('#name_color').val(name);
	            $('#code_color').val(code);            
	            $('#image_color').val(image);  
	            $("#image_show").attr("src",imageurl);         
            }
        else{
            alert('Data tidak ditemukan !!!');
        }
    });

    $('form#form_editcolor').submit(function(e){
    	e.preventDefault();
		var formData = new FormData(this);
		$.ajax(
			{
				url : '<?= site_url('product_crud/editcolor')?>',
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
	})
	
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