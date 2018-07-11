<?php if ($qslider) { ?>
<div class="featured-slider">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php $i = 0;
            foreach ($qslider as $row) { ?>
                <div class="item <?php echo ($i == 0) ? 'active' : ''; ?>">
                    <?php if (!empty($row['image'])) { 
                        $show = true;
                        ?>
                    <a href="<?php echo $row['link']; ?>"><img src="<?php echo base_url(); ?>resource/uploaded/img/<?php echo $row['image']; ?>" alt=""></a>
                        <?php } ?>
        <?php if ($row['keterangan']) { ?><div class="carousel-caption">
                            <h3><a href="<?php echo $row['link']; ?>"><?php echo $row['keterangan']; ?></a></h3>
                        </div>
        <?php } ?>
                </div>

        <?php $i++;
    } ?>
        </div>
        <?php if ($show==true){ ?>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <?php } ?>
    </div>
</div>
<?php } ?>