<div class="container-fluid modal-bg bg-white mt-80 news-bg">
    <div class="container">
        <div class="row py-4 py-lg-5 mx-lg-3">
            <div class="col-12">
                <?php
                    if (empty($berita)) {
                        echo "Tidak Ada Berita";
                    }
                    else {
                        $i = 1;
                        $total = count($berita);
                        foreach ($berita as $key => $value) {

                            if (empty($value->image_popup)) {
                                $img = $value->image;
                            }
                            else {
                                $img = $value->image_popup;
                            }

                            if ($key == 0) { ?>
                                <div class="row my-0 my-lg-4">
                                    <div class="col-12 col-lg-6">
                                        <h1 class="headline-heading mt-4 mt-lg-5"><?php echo $value->title; ?></h1>
                                        <img class="img-fluid mt-3 d-block d-lg-none" src="<?php echo base_url(); ?>resource/uploaded/img/postcontent/<?php echo $img; ?>">
                                        <p class="headline-excerpt mt-3 mt-lg-5"><?php echo substr(strip_tags($value->content), 0, 200); ?></p>
                                        <a class="btn btn-news btn-headline mt-0 mt-lg-4" href="javascript:void(0)" data-toggle="modal" data-target="#berita<?php echo $key+1; ?>">BACA SELENGKAPNYA<i class="fa fa-angle-right ml-3"></i></a>
                                    </div>
                                    <div class="col-6 d-none d-lg-block">
                                        <img class="img-fluid" src="<?php echo base_url(); ?>resource/uploaded/img/postcontent/<?php echo $img; ?>">
                                    </div>
                                </div>
                        <?php }
                            else {
                                $i++;
                                if ($i == 2) {
                                    echo "<div class='card-deck artikel mt-80'>";
                                } ?>
                                <div class="card" data-toggle="modal" data-target="#berita<?php echo $key+1;?>">
                                    <img class="card-img" src="<?php echo base_url(); ?>resource/uploaded/img/postcontent/<?php echo $img; ?>" alt="Card image cap">
                                    <div class="card-img-overlay d-flex flex-column">
                                        <div class="card-header">Rabu 29 Maret 2017</div>
                                        <div class="card-body"><h2 class="caption"><?php echo $value->title; ?></h2></div>
                                        <div class="card-footer align-content-end">Indaco News Update</div>
                                    </div>
                                </div>
                         
                        <?php   
                                if ($i == 4 || $i == $total || ($key % 4 == 0)) {
                                    echo "</div>";
                                    /*echo "<div class='row'>";
                                    $j = $i;
                                    $a = $key;
                                    $i = 1;
                                    for ($h = $a; $h <= $total; $h++) { ?>
                                        <div class="col d-none d-lg-block">
                                            <a class="btn btn-news btn-newsupdate" href="javascript:void(0)" data-toggle="modal" data-target="#berita<?php echo $h; ?>">BACA SELENGKAPNYA<i class="fa fa-angle-right ml-3"></i></a>
                                        </div>
                                    <?php }
                                    echo "</div>";*/
                                }
                            }
                        }
                    } ?>

                <div class="row">
                    <?php foreach ($berita as $key => $value) : ?>
                        <?php if ($key > 0) : ?>
                            <div class="col d-none d-lg-block">
                                <a class="btn btn-news btn-newsupdate" href="javascript:void(0)" data-toggle="modal" data-target="#berita<?php echo $key+1;?>">BACA SELENGKAPNYA<i class="fa fa-angle-right ml-3"></i></a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /container-fluid -->


<?php
    foreach ($berita as $key => $value) { ?>
        <!-- berita 1 -->
        <?php 
            if (empty($value->image)) {
                $img = $value->image_popup;
            }
            else {
                $img = $value->image;
            }
        ?>
        <div class="modal fade" id="berita<?php echo $key+1; ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content artikel-popup">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="popup-top">             
                            <img class="img-fluid" src="<?php echo base_url(); ?>resource/uploaded/img/postcontent/<?php echo $img; ?>"> 
                            <h2 class="modal-title" id="contoh-popupLabel"><?php echo $value->title; ?></h2>
                            <div class="row">
                                <div class="col excerpt">
                                    <!--                                    <p><i>Go Green</i> tidak sebatas dengan menanam pohon.</p> -->
                                </div>
                                <div class="col-2">
                                    <div class="bagikan dropdown">
                                        <button class="btn btn-link dropdown-toggle" type="button" id="social-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-share-alt"></i></button>
                                        <div class="dropdown-menu" aria-labelledby="social-dropdown">
                                            <a class="dropdown-item" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=no,resizable=no,width=560,height=250'); return false;" href="https://www.facebook.com/sharer.php?u=http://indaco.hostingiix.net/berita.html"><i class="fab fa-facebook"></i></a>
                                            <a class="dropdown-item" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=no,resizable=no,width=560,height=450'); return false;" href="https://twitter.com/intent/tweet?text=Peduli+Lingkungan+PT.+Indaco+Warna+Dunia+Pelet+Go+Green&url=http://indaco.hostingiix.net/belazo.html&via=indaco_wd"><i class="fab fa-twitter"></i></a>
                                            <a class="dropdown-item" href="mailto:?subject=Indaco News Update&amp;body=Peduli%20Lingkungan%20PT.%20Indaco%20Warna%20Dunia%20Pelet%20Go%20Green http://indaco.hostingiix.net/belazo.html"><i class="fa fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="popup-bottom">
                            <p><?php echo strip_tags($value->content); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php    }
?>