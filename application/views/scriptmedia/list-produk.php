<div class="primary-content  d-block w-100">
    <h3><?php echo $judul;?></h3>
    <div class=""  style="padding: 5px;">Urut 
        <?php echo $urut; ?></div>
    <div class="list-group">

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
        <input type="hidden" name="edidx" value="<?php echo $produk->idx;?>" />
            <div href="#" class="list-group-item">
                <div class="">
                <img src="<?php echo base_url() . 'resource/uploaded/img/' . $this->basemodel->showimage($produk->image1, 'medium'); ?> " class="image img-fluid" style="float:left;padding:10px"/>
                    </div>
                <div class="w-100 px-2">
                    <div class="">
                    <h5 class="mt-2 mb-2"><?php echo $produk->Judul; ?></h5>
                    <small><?php echo $tipe; ?>  |  Harga : <?php echo number_format($produk->harga, '0', ",", "."); ?>  |  Jenis Properti : <?php echo $rowjenis->jenisproperti; ?>  |  Kondisi : <?php echo $rowkondisi->kondisi; ?></small>
                </div>
                <div class="mb-1"><?php echo substr($produk->Deskripsi, 0, 300); ?><div class="collapse" id="collapsedetail<?php echo $i; ?>"><?php echo substr($produk->Deskripsi, 301); ?></div></div>
                <a data-toggle="collapse" href="#collapsedetail<?php echo $i; ?>" aria-expanded="false" aria-controls="collapsedetail<?php echo $i; ?>" style="color:#a74d20">More >></a>
                <button class="btn btn-detail right-absolute" onclick="detailproduk(<?php echo $produk->idx; ?>);" >DETAIL</button>

                </div>
            </div>
            <?php $i++;
        }
        ?>

    </div>
    <?php echo $paging;?>
</div>



<div class="clearfix"></div>




