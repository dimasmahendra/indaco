<div class="relatedproduk" >
    <div id="myrelated" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
             <div class="carousel-item active">
            <?php
            $i = 1;
            foreach ($listproperti->result() as $produk) {
                $rowjenis = $this->modeljenisproperti->getDetailjenisproperti($produk->idjenisproperti);
                $rowkondisi = $this->modelkondisi->getDetailkondisi($produk->idkondisi);

                if ($produk->idtipe) {
                    $row = $this->modeltiperumah->getDetailtiperumah($produk->idtipe);
                    $tipe = 'Tipe : ' . $row->tiperumah;
                } else {
                    $tipe = 'Luas : ' . $produk->luas . ' m2';
                }
                ?>

               
                    <div class="col-md-4 related-item float-md-left justify-content-md-between row" onclick="detailproduk(<?php echo $produk->idx; ?>);">
                        <input type="hidden" name="edidx" value="<?php echo $produk->idx; ?>" />
                        <div class="col-md-6  py-2">
                            <img src="<?php echo base_url() . 'resource/uploaded/img/' . $this->basemodel->showimage($produk->image1, 'thumb'); ?> " class="image img-fluid" />
                            
                        </div>
                        <div class="col-md-6 py-2">
                                <h5 class="mb-1"><?php echo $produk->Judul; ?></h5>
                                <small><?php echo $tipe; ?>  |  Harga : <?php echo number_format($produk->harga, '0', ",", "."); ?>  |  Jenis Properti : <?php echo $rowjenis->jenisproperti; ?>  |  Kondisi : <?php echo $rowkondisi->kondisi; ?></small>
                            </div>
                    </div>
                
                <?php if($i % 3 == 0) { 
                    echo '</div> <div class="carousel-item">';
                }
                $i++;
            }
            ?>
            </div>
            <a class="left carousel-control-prev" href="#myrelated" role="button" data-slide="prev">
    <i class="fa fa-chevron-left"></i>
  </a>
  <a class="right carousel-control-next" href="#myrelated" role="button" data-slide="next">
    <i class="fa fa-chevron-right"></i>
  </a>
        </div>
       </div>
    </div>