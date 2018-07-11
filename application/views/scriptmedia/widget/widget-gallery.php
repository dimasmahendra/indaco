<div class="widget recent-gallery">
<h3 class="heading"><?php echo $sidebartitle; ?></h3>
<div class="entry-list">
    <?php  
     if(empty($fieldmuncul)){
    $fields = $modules->list_fields();
     }else{
        $fields = $fieldmuncul; 
     }
   $i=0;
    foreach ($modules->result() as $module){
      if ($i < 6){
        if (!empty($index)) $id = $module->$index;
       else $id = '';
       if (!empty($fieldshow)) $fielddetail = $fieldshow;
       else $fielddetail='';
      //  foreach ($fields as $field){ ?>
    <?php if ($thumbimage1[$i]){ ?>
    <div class="img-gallery"><a href="<?php echo $href.$id;?>"><img class="img-fluid" src="<?php echo base_url();?>resource/uploaded/img/<?php echo $thumbimage1[$i];?>" alt="" /></a></div>
    <?php } ?>
 <?php  
        }
    $i++;
}
?>

</div>
</div>
<div class="clearfix"></div>