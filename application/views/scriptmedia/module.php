<div class="widget recent-agenda">
<h3 class="heading"><?php echo $sidebartitle; ?></h3>
<div class="entry-list">
    <ul>
    <?php  
     if(empty($fieldmuncul)){
    $fields = $modules->list_fields();
     }else{
        $fields = $fieldmuncul; 
     }
    foreach ($modules->result() as $module){
       if (!empty($index)) $id = $module->$index;
       else $id = '';
       if (!empty($fieldshow)) $fielddetail = $fieldshow;
       else $fielddetail='';
        
        foreach ($fields as $field){
           echo '<li><a href="'.$href.$id.'/">'.$module->$field.'</a></li>';
          
        }
        
}
?>
        
</ul>
    
</div>
<?php echo $pagination; ?>
</div>