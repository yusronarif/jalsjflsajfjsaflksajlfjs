<style>
.btn-ambil label:active {border-color:#0e90d2;}
.btn-ambil label.active {font-weight: bold; background:#0e90d2;}
.thumb-caption {
    background: rgb(255,255,255);
    padding: 5px 3px;
    height: 70px;
    overflow: visible;
}
.thumb-caption .caption-price {
    font-size: 120%;
}
.thumb-caption .caption-title {
    font-weight: bold;
}
</style>
<div class="row">
    <div class="col-xs-12 hidden-md hidden-lg">
        <div class="block">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-cart"></i> Keranjang</h6>
                </div>
                <div class="panel-body">
                    <div align="center">
                        <?php echo "Total item dikeranjang : " . $this->cart->total_items(); ?><br>
                        <?php echo "Total harga belanja : Rp. " . curr_format($this->cart->total()); ?><br><br>
                        <?php if ($this->cart->total_items() > 0) { ?>
                            <?php echo anchor('member/keranjang', '<i class="icon-checkmark3"></i> Pembayaran', 'class="btn btn-block btn-info"') ?>
                            <?php echo anchor('member/' . $this->uri->rsegment(1) . '/deletecart', '<i class="icon-remove"></i> Bersihkan Keranjang', 'class="btn btn-block btn-danger" onclick="return confirm(\'Yakin akan menghapus?\')"') ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="row">
            <?php foreach ($item as $neg): ?>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                    <div class="block">
                        <div class="thumbnail thumbnail-boxed">
                            <div class="thumb">
                                <img alt="" src="<?php echo base_url('uploads/images/' . $neg->GAMBAR_MENU); ?>">
                            </div>
                            <div class="thumb-caption">
                                <strong class="caption-price">Rp. <?php echo curr_format($neg->LABA_HM); ?></strong><br>
                                <a data-toggle="modal" role="button" href="#small_modal<?php echo $neg->ID_HM; ?>" class="caption-title"><?php echo $neg->NAMA_MENU; ?></a><br>
                                (<?php echo $neg->NAMA_KANTIN; ?>)
                            </div>
                            <div class="caption">
                                <div align="center">
                                    Diambil pada :<br>
                                    <input type="date" class="datepicker form-control input-sm text-center" placeholder="Pilih Tanggal" name="tanggal" maxlength="10" value="<?php echo set_value('tanggal', date("Y-m-d")); ?>"><br>

                                    Istirahat ke-<br>
                                    <div class="btn-group btn-group-sm btn-ambil" data-toggle="buttons" style="margin-bottom: 5px">
                                        <label class="btn btn-warning">
                                            <input type="radio" name="ambil<?php echo $neg->ID_HM; ?>" class="ambil<?php echo $neg->ID_HM; ?>" value="1" autocomplete="off">1
                                        </label>
                                        <label class="btn btn-warning">
                                            <input type="radio" name="ambil<?php echo $neg->ID_HM; ?>" class="ambil<?php echo $neg->ID_HM; ?>" value="2" autocomplete="off">2
                                        </label>
                                        <label class="btn btn-warning">
                                            <input type="radio" name="ambil<?php echo $neg->ID_HM; ?>" class="ambil<?php echo $neg->ID_HM; ?>" value="3" autocomplete="off">3
                                        </label>
                                    </div>
                                    <br>
                                    <a data-toggle="modal" role="button" href="#small_modal<?php echo $neg->ID_HM; ?>" class="btn btn-block btn-info"><i class="icon-accessibility"></i>Kandungan</a>
                                    <a href="javascript: send_cart(<?php echo $neg->ID_HM ?>)" class="btn btn-block btn-success"><i class="icon-cart-plus"></i> Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<!-- /questions and contact -->
<?php foreach ($item as $neg): ?>
    <div id="small_modal<?php echo $neg->ID_HM; ?>" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="icon-accessibility"></i> Kandungan <?php echo $neg->NAMA_MENU; ?></h4>
                </div>

                <div class="modal-body with-padding">
                    <p><?php echo $neg->KANDUNGAN_MENU; ?></p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
