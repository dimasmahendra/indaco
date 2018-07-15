<?php $this->load->view('layout/admin/head_default') ?>
<?php $this->load->view('layout/admin/nav_default') ?>

<?php echo form_open('#',array('id' => 'form_ajax','enctype'=>'multipart/form-data')); ?>

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
		$optionsSelected = (isset($typeOptionsSelected))?$typeOptionsSelected:null;
		$extra = 'style="width:50%"';
		echo form_dropdown('typeOptionsSelected', $options, $optionsSelected,$extra);
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

<div class="col-md-12" style="margin-top: 20px"><b>Features</b></div>
<div class="col-md-12" style="margin-top: 20px">
	<?php if(count($features) > 0): ?>
		<?php foreach($features as $key => $value): ?>
			<div class="col-md-3" style="margin-top: 5px">
				<input type="checkbox"><?= $value ?>
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
					'value'       => (isset($color_name))?$color_name:null,					
					'class'			=> 'form-control',
			        'placeholder'	=> 'color name'
				);
			
				echo form_input($paramFormInput);
			?>
		</div>
		<div class="col-md-3">
			<?php 
				$paramFormInput = array(
					'name'        => 'color_code[]',
					'id'          => 'color_code[]',
					'value'       => (isset($color_code))?$color_code:null,					
					'class'			=> 'form-control',
			        'placeholder'	=> 'color code'
				);
			
				echo form_input($paramFormInput);
			?>
		</div>
		<div class="col-md-3">
			<input type="file" name="color[]">
		</div>
		<div class="col-md-3"><button type="button" class="btn btn-sm btn-danger">Delete</button></div>
	</div>
</div>

<div id="add_new_color" class="col-md-12" style="margin-top: 20px"><button type="button" class="btn btn-primary">Add new colour</button></div>

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
			+'<div class="col-md-3"><input class="form-control" type="text" name="color_name[]" placeholder="color name"></div>'
			+'<div class="col-md-3"><input class="form-control" type="text" name="color_code[]" placeholder="color code"></div>'
			+'<div class="col-md-3"><input type="file" class="color" name="color[]" placeholder="color name"></div>'
			+'<div class="col-md-3"><button type="button" class="btn btn-sm btn-danger" onclick="$(this).parent().parent().remove();" >Delete</button></div>'
			+'</div>'
			);
	})
	
	$('#simpan').click(function(){
		add();
	})

	function add(){
		form_serialize=$('#form_ajax').serialize();
		param_data = {
			'ind_description' : tinyMCE.get('ind_description').getContent(),
			'eng_description' : tinyMCE.get('eng_description').getContent()
		};
		
		$.ajax(
			{
				url : '<?= site_url('product_crud/add')?>',
				type: 'post',
				data : form_serialize+'&'+$.param(param_data),
				beforeSend : function( xhr ){
					toastr['info']('harap tunggu');
				},
				success: function(result,status,xhr){
					hasil = JSON.parse(result);
					if(hasil.status == '0'){
						toastr['warning'](hasil.message);
					}else{
						toastr['success'](hasil.message);
						setTimeout(function(){
							window.location.replace('<?= site_url('product_crud') ?>');
						}, 1000);
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


<?php $this->load->view('layout/admin/nav_end_default') ?>
<?php $this->load->view('layout/admin/js_default') ?>
<?php $this->load->view('layout/admin/footer_default') ?>