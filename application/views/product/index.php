<?php $this->load->view('layout/admin/head_default') ?>
<?php $this->load->view('layout/admin/nav_default') ?>

<!-- SET CONTENT -->

<button name="btAddProduk" id="btAddProduk" type="button" class="btn btn-info" style="margin-bottom: 20px">Add Product Type</button>


<table  class="dataTable table table-striped table-hover fixed-table-container table-no-bordered" width="100%" cellspacing="0" cellpadding="0">
	<thead>
		<tr style="background: #CCC">
			<th width="15%">Name</th>
			<th width="25%">Title</th>
			<th>Desc</th>
			<th width="15%">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php if(count($data) > 0): ?>
			<?php foreach($data as $key => $value): ?>
			<tr>
				<td><?= $value['name'] ?></td>
				<td><?= $value['ind_title'] ?></td>
				<td><?= substr($value['ind_description'],0,240) ?>...</td>
				<td>
					<a href="">edit</a>
					<a href="">delete</a>

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
	$('#btAddProduk').click(
		function(){
			form_add();
		}
	)

	function form_add(){
		$.ajax(
			{
				url : '<?= site_url('Product/form_add')?>',
				type: 'post',
				data : null,
				beforeSend : function( xhr ){
					
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
</script>

<?php $this->load->view('layout/admin/nav_end_default') ?>
<?php $this->load->view('layout/admin/js_default') ?>
<?php $this->load->view('layout/admin/footer_default') ?>