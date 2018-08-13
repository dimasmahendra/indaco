<link rel="stylesheet" href="<?= base_url('resource/js/dropzone/basic.css') ?>">
<link rel="stylesheet" href="<?= base_url('resource/js/dropzone/dropzone.css') ?>">

<?php echo form_open('#',array('id' => 'form_ajax')); ?>

<div class="col-md-2" style="margin-top: 20px">Nama Depo</div>
<div class="col-md-10" style="margin-top: 20px">
	<?php 
		$paramFormInput = array(
			'name'        => 'nama_depo',
			'id'          => 'nama_depo',
			'value'       => (isset($nama_depo)) ? $nama_depo : null,					
			'class'			=> 'form-control',
	        'style'         => 'width:50%',
	        'placeholder'	=> ''
		);

		echo form_input($paramFormInput);
	?>
</div>

<div class="col-md-2" style="margin-top: 20px">Alamat Depo</div>
<div class="col-md-10" style="margin-top: 20px">
	<?php 
		$paramFormInput = array(
			'name'        => 'alamat_depo',
			'id'          => 'alamat_depo',
			'value'       => (isset($alamat_depo)) ? $alamat_depo : null,					
			'class'			=> 'form-control',
	        'style'         => 'width:50%',
	        'placeholder'	=> ''
		);

		echo form_input($paramFormInput);
	?>
</div>

<div class="col-md-2" style="margin-top: 20px">Nama BM</div>
<div class="col-md-10" style="margin-top: 20px">
	<?php 
		$paramFormInput = array(
			'name'        => 'nama_bm',
			'id'          => 'nama_bm',
			'value'       => (isset($nama_bm)) ? $nama_bm : null,					
			'class'			=> 'form-control',
	        'style'         => 'width:50%',
	        'placeholder'	=> ''
		);

		echo form_input($paramFormInput);
	?>
</div>

<div class="col-md-2" style="margin-top: 20px">Nama Admin</div>
<div class="col-md-10" style="margin-top: 20px">
	<?php 
		$paramFormInput = array(
			'name'        => 'nama_admin',
			'id'          => 'nama_admin',
			'value'       => (isset($nama_admin)) ? $nama_admin : null,					
			'class'			=> 'form-control',
	        'style'         => 'width:50%',
	        'placeholder'	=> ''
		);

		echo form_input($paramFormInput);
	?>
</div>

<div class="col-md-2" style="margin-top: 20px">Telepon BM</div>
<div class="col-md-10" style="margin-top: 20px">
	<?php 
		$paramFormInput = array(
			'name'        => 'tel_bm',
			'id'          => 'tel_bm',
			'value'       => (isset($tel_bm)) ? $tel_bm : null,					
			'class'			=> 'form-control',
	        'style'         => 'width:50%',
	        'placeholder'	=> ''
		);

		echo form_input($paramFormInput);
	?>
</div>


<div class="col-md-2" style="margin-top: 20px">Telepon Admin</div>
<div class="col-md-10" style="margin-top: 20px">
	<?php 
		$paramFormInput = array(
			'name'        => 'tel_admin',
			'id'          => 'tel_admin',
			'value'       => (isset($tel_admin)) ? $tel_admin : null,					
			'class'			=> 'form-control',
	        'style'         => 'width:50%',
	        'placeholder'	=> ''
		);

		echo form_input($paramFormInput);
	?>
</div>

<div class="col-md-2" style="margin-top: 20px">Depo Utama</div>
<div class="col-md-10" style="margin-top: 20px">
	<input type="checkbox" name="depo_utama" value="1" <?php echo ($depo_utama == 1) ? 'checked' : '' ?>>
</div>

<?php echo form_close() ?>

<div class="col-md-6">
	<h3>Image</h3>
	<form action="<?= site_url('ctrdepo/upload_image')?>" id="upload_image" class="dropzone" enctype="multipart/form-data">
      	<?php if(isset($image)):?>
      		<center>
      			<small><i>image pada database</i></small>
      			<img class="img-responsive" width="100px" src="<?= base_url('resource/uploaded/img/depo').'/'.$image ?>">
      		</center>
      	<?php endif ?>
  	</form>
</div>

<div class="col-md-12" style="margin-top: 20px">
	<center><small>
		Saat upload file, harap tunggu sampai proses upload selesai, sebelum klik tombol simpan
	</small></center>
</div>

<div class="col-md-6">
	<div id="map" style="width: 100%; height: 400px;"></div>
	<input type="hidden" name="map_lat" value="<?php echo (!empty($map_lat)) ? $map_lat : null ?>">
	<input type="hidden" name="map_lang" value="<?php echo (!empty($map_lang)) ? $map_lang : null ?>">
</div>

<div class="col-md-12" style="margin-top: 20px">
	<center>
		<a href="<?= site_url('ctrdepo')?>"><button class="btn">Kembali</button></a>
		<button class="btn btn-primary" id="simpan">Simpan</button>
	</center>
</div>

<script src="<?= base_url('resource/js/dropzone/dropzone.js') ?>"></script>

<script type="text/javascript">

	Dropzone.autoDiscover = false;
	new Dropzone("#upload_image",
		{
			init: function() {
				this.on("processing", function(file,status) {toastr['info']('harap tunggu sampai upload selesai')});
				this.on("success", function(file,status) { 
					if(status == '1'){
						toastr['success']('Sukses');							
					}else{
						toastr['warning']('Gagal');
					}
				});
				this.on("error", function(file) { toastr['warning']('Gagal') });
			},
			paramName: "file", // The name that will be used to transfer the file
			maxFilesize: 2, // MB
			acceptedFiles: '.jpg,.jpeg,.png'
		}
	);
	
	$('#simpan').click(function(){
		add();		
	})

	function add(){
		$.ajax(
			{
				url : '<?= site_url('ctrdepo/add')?>',
				type: 'post',
				data : {
					'nama_depo' : $('#nama_depo').val(),
					'alamat_depo' : $('#alamat_depo').val(),
					'nama_bm' : $('#nama_bm').val(),
					'nama_admin' : $('#nama_admin').val(),
					'tel_bm' : $('#tel_bm').val(),
					'tel_admin' : $('#tel_admin').val(),
					'map_lat' : $('input[name="map_lat"]').val(),
					'map_lang' : $('input[name="map_lang"]').val(),
					'depo_utama' : $('input[name="depo_utama"]').prop('checked')
				},
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

	function initMap() {
		var def_lat = $('input[name="map_lat"]').val();
		var def_lang = $('input[name="map_lang"]').val();
		if (def_lat && def_lang)
		{
			var myLatlng = {lat: Number(def_lat), lng: Number(def_lang)};
		}
		else
			var myLatlng = {lat: -7.7891527, lng: 110.4522545};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 9,
          center: myLatlng
        });

        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Click to zoom'
        });

        // map.addListener('center_changed', function() {
        //   // 3 seconds after the center of the map has changed, pan back to the
        //   // marker.
        //   window.setTimeout(function() {
        //     map.panTo(marker.getPosition());
        //   }, 3000);
        // });

        // marker.addListener('click', function() {
        //   map.setZoom(8);
        //   map.setCenter(marker.getPosition());
        // });

        google.maps.event.addListener(map, "click", function (e) {
        	//lat and lng is available in e object
        	var latLng = e.latLng;
        	marker.setPosition( new google.maps.LatLng( latLng.lat(), latLng.lng() ) );
        	$('input[name="map_lat"]').val(latLng.lat());
        	$('input[name="map_lang"]').val(latLng.lng());
        });
      }
      initMap();
</script>

