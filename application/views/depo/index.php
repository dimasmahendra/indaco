<?php $this->load->view('layout/admin/head_default') ?>
<?php $this->load->view('layout/admin/nav_default') ?>

<!-- SET CONTENT -->

<button name="btAddDepo" id="btAddDepo" type="button" class="btn btn-info" style="margin-bottom: 20px">Add Depo</button>


<table  class="dataTable table table-striped table-hover fixed-table-container table-no-bordered" width="100%" cellspacing="0" cellpadding="0">
	<thead>
		<tr style="background: #CCC">
			<th>Nama</th>
			<th>Alamat</th>
			<th>BM</th>
			<th>Admin</th>
			<th>Telepon BM</th>
			<th>Telepon Admin</th>
			<th width="15%">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php if(count($data) > 0): ?>
			<?php foreach($data as $key => $value): ?>
			<tr>
				<td><?= $value['nama_depo'] ?></td>
				<td><?= $value['alamat_depo'] ?></td>
				<td><?= $value['nama_bm'] ?></td>
				<td><?= $value['nama_admin'] ?></td>
				<td><?= $value['tel_bm'] ?></td>
				<td><?= $value['tel_admin'] ?></td>
				<td>
					<button class="btn btn-sm btn-primary" onclick="form_edit('<?= $value['id'] ?>')">edit</button>
					<button class="btn btn-sm btn-danger" onclick="confirm_del('<?= $value['nama_depo'] ?>','<?= $value['id'] ?>')">delete</button>

				</td>
			</tr>
			<?php endforeach ?>
		<?php else: ?>
		<td colspan="4">No data</td>
		<?php endif ?>
	</tbody>
</table>

<!-- SET CONTENT -->

<script type="text/javascript">
	$('#btAddDepo').click(
		function(){
			form_add();
		}
	)

	function form_add(){
		$.ajax(
			{
				url : '<?= site_url('ctrdepo/form_add')?>',
				type: 'post',
				data : null,
				beforeSend : function( xhr ){
					toastr['info']('harap tunggu');
				},
				success: function(result,status,xhr){
					$('#content-content').html(result);

				},
				complete : function(xhr,status){
					
				},
				error : function(xhr,status,error)	{
	
				}
			}
		)	
	}

	function form_edit(update_id){
		$.ajax(
			{
				url : '<?= site_url('ctrdepo/form_edit')?>',
				type: 'post',
				data : {'id':update_id},
				beforeSend : function( xhr ){
					toastr['info']('harap tunggu');
				},
				success: function(result,status,xhr){
					$('#content-content').html(result);
				},
				complete : function(xhr,status){
					
				},
				error : function(xhr,status,error)	{
	
				}
			}
		)	
	}

	function confirm_del(label,id) {
	    var txt;
	    if (confirm("Delete "+label+"?")) {
	        delete_data(id);
	    }
	}

	function delete_data(delete_id){
		$.ajax(
			{
				url : '<?= site_url('ctrdepo/delete')?>',
				type: 'post',
				data : {'id' : delete_id},
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
							window.location.replace('<?= site_url('ctrdepo') ?>');
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