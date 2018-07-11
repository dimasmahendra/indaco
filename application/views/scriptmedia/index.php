<?php echo $header; ?>

<div id="content" class="main-content row">
    
<div class="primary-content col-md-7">
    <h3>Cari Properti Berdasarkan Wilayah</h3>
    <button class="btn-wates d-md-block" onclick="dosearchprodukkabupaten(0,3403)">Kabupaten Kulon Progo</button>
    <button class="btn-bantul d-md-block" onclick="dosearchprodukkabupaten(0,3401)">Kabupaten Bantul</button>
    <button class="btn-sleman d-md-block" onclick="dosearchprodukkabupaten(0,3404)">Kabupaten Sleman</button>
    <button class="btn-jogja d-md-block"  onclick="dosearchprodukkabupaten(0,3405)">Kota Yogyakarta</button>
    <button class="btn-wonosari d-md-block" onclick="dosearchprodukkabupaten(0,3402)">Kabupaten Gunung Kidul</button>
    <img src="<?php echo base_url().'resource/scriptmedia/images/' ?>peta.png " class="image img-fluid"/>
</div>
<div class="right-content col-md-5 ">   
    <div class="rightbar-text btn w-100 kabupaten" onclick="dosearchprodukkabupaten(0,3405)"><span class="rightbar-text-bold">Yogyakarta</span> (29910 property)</div>
    <div class="rightbar-text btn w-100 kabupaten" onclick="dosearchprodukkabupaten(0,3404)"><span class="rightbar-text-bold">Sleman</span> (29910 property)</div>
    <div class="rightbar-text btn w-100 kabupaten" onclick="dosearchprodukkabupaten(0,3401)"><span class="rightbar-text-bold">Bantul</span> (29910 property)</div>
    <div class="rightbar-text btn w-100 kabupaten" onclick="dosearchprodukkabupaten(0,3403)"><span class="rightbar-text-bold">Kulonprogo</span> (29910 property)</div>
    <div class="rightbar-text btn w-100 kabupaten" onclick="dosearchprodukkabupaten(0,3402)"><span class="rightbar-text-bold">Gunung Kidul</span> (29910 property)</div>
    <div class="icon row" style="margin-top:20px;padding:10px">
        <div class="col-4 btn" onclick="dosearchprodukjenisproperti(0,1)" ><img src="<?php echo base_url().'resource/scriptmedia/images/' ?>icon-rumah.png" class="img-fluid center-block"/><h5 align="center">Rumah</h5></div>
        <div class="col-4 btn" onclick="dosearchprodukjenisproperti(0,2)"><img src="<?php echo base_url().'resource/scriptmedia/images/' ?>icon-tanah.png" class="img-fluid center-block"/><h5 align="center">Tanah</h5></div>
        <div class="col-4 btn" onclick="" ><img src="<?php echo base_url().'resource/scriptmedia/images/' ?>icon-apartemen.png" class="img-fluid center-block"/><h5 align="center">Apartemen</h5></div>
        <div class="col-4 btn" onclick="dosearchprodukjenisproperti(0,3)"><img src="<?php echo base_url().'resource/scriptmedia/images/' ?>indekost.png" class="img-fluid  center-block"/><h5 align="center">Indekost</h5></div>
        <div class="col-4 btn" onclick="dosearchprodukjenisproperti(0,4)"><img src="<?php echo base_url().'resource/scriptmedia/images/' ?>komersil.png" class="img-fluid  center-block"/><h5 align="center">Komersil</h5></div>
        <div class="col-4 btn"><img src="<?php echo base_url().'resource/scriptmedia/images/' ?>lain-lain.png" class="img-fluid  center-block"/><h5 align="center">Lain-lain</h5></div>
    </div>

</div>


    <div class="clearfix"></div>
    </div>



<div class="row footer m-auto container clearfix">
 
    <div id="loading" class="loading"><img class='loading-image' src='<?php echo base_url().'resource/scriptmedia/images/' ?>loading.gif' /></div>
<?php echo $footer; ?>