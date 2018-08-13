<!-- Large Size -->
<div class="modal fade" id="editInspirasi" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Edit Inspirasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <form id="form_editinspirasi" enctype="multipart/form-data" method="post">
            	<div class="modal-body">
        			<input type="hidden" name="id_detail_inspirasi" id="id_detail_inspirasi" value="">
        			<input type="hidden" name="id_inspirasi" id="id_inspirasi" value="">
        			<div class="form-group">
        				<input class="form-control" type="text" id="name_inspirasi" name="name_inspirasi">
        			</div>
        			<div class="form-group">
        				<img src="" id="image_show" style="max-height: 100px; max-width: 100px;">
        				<input type="hidden" id="image_inspirasi_value" name="image_inspirasi_value">
        				<input type="file" id="file-image" name="image_inspirasi">
        			</div> 
        			<div class="form-group">
        				<img src="" id="background_show" style="max-height: 100px; max-width: 100px;">
        				<input type="hidden" id="image_background_value" name="image_background_value">
        				<input type="file" id="file-background" name="background_inspirasi">
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
<input type="hidden" name="inspirasi_id" id="inspirasi_id" value="<?php echo $id; ?>">
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
	<div class="row" style="margin-top: 20px">
		<table class="dataTable table" style="width:100%">
			<thead>
				<tr>
					<th>Name</th>
					<th>Image</th>
					<th>Background</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($inspirasi_detail as $row)
					{ ?>
						<tr>                               
							<td><?php echo $row['name']; ?></td>
							<td>
								<img src="<?php echo base_url() ?>resource/uploaded/img/inspirasi/<?php echo $row['image1']; ?>" style="max-height: 80px; max-width: 80px;">
							</td>
							<td>
								<img src="<?php echo base_url() ?>resource/uploaded/img/inspirasi/<?php echo $row['image2']; ?>" style="max-height: 80px; max-width: 80px;">
							</td>
							<td>                               
								<a class="edit-inspirasi" href="#" data-toggle="modal" data-target="#editInspirasi" 
									data-id = "<?php echo $row['id']; ?>"
									data-inspirasi_id = "<?php echo $row['inspirasi_id']; ?>"
									data-name = "<?php echo $row['name']; ?>"
									data-image1 = "<?php echo $row['image1']; ?>"
									data-image1url = "<?php echo base_url(); ?>resource/uploaded/img/inspirasi/<?php echo $row['image1']; ?>"
									data-image2 = "<?php echo $row['image2']; ?>"
									data-image2url = "<?php echo base_url(); ?>resource/uploaded/img/inspirasi/<?php echo $row['image2']; ?>"
								>
								<button type="button" class="btn btn-primary">Edit</button>
							</a>
							<a href="<?php echo base_url(); ?>ctrinspirasi/delete_image/<?php echo $row['id']; ?>">
								<button type="button" class="btn btn-danger">Delete</button>
							</a>
						</td>
					</tr>
				<?php } ?>            
			</tbody>              
		</table>
	</div>
	<div class="col-md-12" id="dom_color"></div>
</div>
<div id="add_new_color" class="col-md-12" style="margin-top: 20px"><button type="button" class="btn btn-primary">Add new colour</button></div>

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
			+'<div class="col-md-6"><input type="text" class="form-control inspiration_name" name="inspiration_name[]" placeholder="Inspiration Name" required></div>'
			+'</div>'
			+'<div class="row" style="margin-top: 20px">'
			+'<div class="col-md-4"><input type="file" id="file-image" class="image_inspirasi" name="image_inspirasi[]" required></div>'
			+'<div class="col-md-4"><input type="file" id="file-background" class="background_inspirasi" name="background_inspirasi[]" required></div>'
			+'<div class="col-md-3"><button type="button" class="btn btn-sm btn-danger" onclick="$(this).parent().parent().parent().remove();">Delete</button></div>'
			+'</div>'
			+'</div>'
			);
	})

	$('.edit-inspirasi').click(function(){
        var id = $(this).data('id');
        var inspirasi_id = $(this).data('inspirasi_id');
        var name = $(this).data('name');
        var image1 = $(this).data('image1');
        var image1url = $(this).data('image1url');
        var image2 = $(this).data('image2');
        var image2url = $(this).data('image2url');
        if (id) {
	            $('#id_detail_inspirasi').val(id);
	            $('#id_inspirasi').val(inspirasi_id);
	            $('#name_inspirasi').val(name);
	            $('#image_inspirasi_value').val(image1);
	            $("#image_show").attr("src",image1url);     
	            $('#image_background_value').val(image2);
	            $("#background_show").attr("src",image2url);     
            }
        else{
            alert('Data tidak ditemukan !!!');
        }
    });

    $('form#form_editinspirasi').submit(function(e){
    	e.preventDefault();
		var formData = new FormData(this);
		$.ajax(
			{
				url : '<?= site_url('ctrinspirasi/editinspirasi')?>',
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
					hasil = JSON.parse(result);
					console.log(hasil);
					if(hasil.status == '0'){
						toastr['warning'](hasil.message);
					}else{
						toastr['success'](hasil.message);
						setTimeout(function(){
							window.location.replace('<?= site_url('ctrinspirasi') ?>');
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