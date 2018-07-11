<div class="list-galeri">

    <?php  
     if(empty($fieldmuncul)){
    $fields = $modules->list_fields();
     }else{
        $fields = $fieldmuncul; 
     }
   $xbuft="";
   $i=0;
    foreach ($modules->result() as $module){
       if (!empty($index)) $id = $module->$index;
       else $id = '';
       if (!empty($fieldshow)) $fielddetail = $fieldshow;
       else $fielddetail='';
 //foreach ($fields as $field){
           ?>
    
           <div class="entry-image">
            <?php if($small1[$i]!='undefined'){ if(!empty($small1[$i])){ ?><a href="<?php echo $href.$id.'/';?>" title="<?php echo ($module->judul)?$module->judul:''; ?>">
                    <img class="img-fluid" src="<?php echo base_url().'resource/uploaded/img/'.$small1[$i];?>" alt="<?php echo ($module->judul)?$module->judul:''; ?>"/></a><!-- .entry-asset -->
            <?php }} ?>
            <?php if ($module->judul) { ?>       
      <span class="caption-galery"><a href="<?php echo $href.$id.'/';?>" title="" rel="bookmark"><?php echo $module->judul;?></a></span>
            <?php } ?>     
</div>
          
        
    <?php    
        //}
    $i++;
}
?>
            
</div>
<?php echo $pagination; ?>