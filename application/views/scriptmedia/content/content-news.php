<div class="list-news">

    <?php  
     if(empty($fieldmuncul)){
    $fields = $modules->list_fields();
     }else{
        $fields = $fieldmuncul; 
     }
   $xbuft="";
    foreach ($modules->result() as $module){
       if (!empty($index)) $id = $module->$index;
       else $id = '';
       if (!empty($fieldshow)) $fielddetail = $fieldshow;
       else $fielddetail='';
 //foreach ($fields as $field){
           ?>
    
           <article class="entry-box col-md-6">
            <?php if($module->image1!='undefined'){ if(!empty($module->image1)){ ?><figure class="entry-asset"><a href="<?php echo $href.$id.'/';?>" title="">
                    <img class="img-fluid" src="<?php echo base_url().'resource/uploaded/img/'.$module->image1;?>" alt=""/></a></figure><!-- .entry-asset -->
            <?php }} ?>
            <?php if ($module->judul) { ?>       <header class="entry-header clearfix">
      <h2 class="entry-title"><a href="<?php echo $href.$id.'/';?>" title="" rel="bookmark"><?php echo $module->judul;?></a></h2>
            <?php if($module->tanggal){ ?><i><?php echo $module->tanggal;?></i><?php } ?>
            </header>
            <?php } ?>  
            <?php if ($module->isiawal){ ?>        
            <section class="entry-summary clearfix">
            <p><?php echo $module->isiawal;?></p>
            </section>
            <?php } ?>        
</article>
          
        
    <?php    
        //}
    
}
?>
            
</div>
<?php echo $pagination; ?>