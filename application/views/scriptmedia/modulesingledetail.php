<div class="detailwidget">
<?php /*if (isset($row->judul)&&$row->judul!='undefined'){ ?><h3 class="heading"><?php echo $row->judul; ?></h3><?php } ?>
<?php if (isset($row->tanggal)&&$row->tanggal!='undefined'){ ?><i class="date"><?php $date=new DateTime($row->tanggal);echo $date->format('l \of F Y ');?></i><?php }*/ ?>
<div class="entry-list">
    <?php if (isset($row->image1)&& $row->image1!='undefined'){ if(!empty($row->image1)){ ?><div class="col-md-4"><img class="img-fluid" src="<?php echo base_url().'resource/image'.$row->image1;?>"/></div><?php } } ?>
    <?php if (isset($row->image2)&& $row->image2!='undefined'){ if(!empty($row->image2)){ ?><div class="col-md-4"><img class="img-fluid" src="<?php echo base_url().'resource/image'.$row->image2;?>"/></div><?php }} ?>
    <?php if (isset($row->image3)&& $row->image3!='undefined'){ if(!empty($row->image3)){ ?><div class="col-md-4"><img class="img-fluid" src="<?php echo base_url().'resource/image'.$row->image3;?>"/></div><?php }} ?>
    <?php  
    //print_r($row);
//     foreach ($fields as $field){
//         echo (isset($row->$field))?$row->$field:'';
//     } 
    echo (isset($row->isi)&&$row->isi!='undefined')?$row->isi:'';
?>

</div>
</div>