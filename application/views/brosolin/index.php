<?php $this->load->view('layout/admin/head_default') ?>
<?php $this->load->view('layout/admin/nav_default') ?>

<table  class="dataTable table table-striped table-hover fixed-table-container table-no-bordered" width="100%" cellspacing="0" cellpadding="0">
	<thead>
		<tr style="background: #CCC">
			<th>Nama</th>
			<th>Masalah</th>
			<th>Tgl & Jam</th>
			<th width="15%">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php if(count($brosolin) > 0): ?>
			<?php foreach($brosolin as $key => $value): ?>
			<tr>
				<td><?= $value['nama'] ?></td>
				<td><?= $value['masalah'] ?></td>
				<td><?= date('d-m-Y H:i:s', $value['created']) ?></td>
				<td>
					<!-- <button class="btn btn-sm btn-primary" onclick="form_edit('<?= $value['id'] ?>')">edit</button> -->
					<button class="btn btn-sm btn-danger" onclick="confirm_del('<?= $value['nama'] ?>','<?= $value['id'] ?>')">delete</button>
				</td>
			</tr>
			<?php endforeach ?>
		<?php else: ?>
		<td colspan="4">No data</td>
		<?php endif ?>
	</tbody>
</table>

<script type="text/javascript">
	function confirm_del(label,id) {
	    var txt;
	    if (confirm("Delete "+label+"?")) {
	        delete_data(id);
	    }
	}

	function delete_data(delete_id){
		$.ajax(
			{
				url : '<?= site_url('ctrbrosolin/delete')?>',
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
							window.location.replace('<?= site_url('ctrbrosolin') ?>');
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