 <div class="container">    
<div class="row">
<!--//widget footer -->
<?php if (is_array($widgetfooter)){
    foreach ($widgetfooter as $widget){
        echo $widget;
    }
    
}else {
    echo $widgetfooter;
}
    ?>
</div>
    </div>