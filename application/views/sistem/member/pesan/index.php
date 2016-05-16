<style>
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
    <?php
    //if($this->cart->total_items() > 0) echo var_dump($this->cart->contents());
    ?>
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
                                <img alt="<?php echo $neg->NAMA_MENU; ?>" src="<?php echo base_url('uploads/images/' . $neg->GAMBAR_MENU); ?>">
                            </div>
                            <div class="thumb-caption">
                                <strong class="caption-price">Rp. <?php echo curr_format($neg->LABA_HM); ?></strong><br>
                                <a data-toggle="modal" role="button" href="#small_modal<?php echo $neg->ID_HM; ?>" class="caption-title"><?php echo $neg->NAMA_MENU; ?></a><br>
                                (<?php echo $neg->NAMA_KANTIN; ?>)
                            </div>
                            <div class="caption">
                                <div align="center">
                                    <?php /*Diambil pada :<br>
                                    <input type="date" class="input-sm text-center" placeholder="Pilih Tanggal" name="tanggal" maxlength="10" value="<?php echo set_value('tanggal', date("Y-m-d")); ?>"><br>

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
                                    <br>*/?>
                                    <a data-toggle="modal" role="button" href="#modalDetail<?php echo $neg->ID_HM; ?>" data-cart="<?php echo $neg->ID_HM; ?>" class="btn btn-block btn-info"><i class="icon-accessibility"></i>Kandungan</a>
                                    <a data-toggle="modal" role="button" href="#modalCart" data-cart="<?php echo $neg->ID_HM; ?>" class="btn btn-block btn-success btn-beli"><i class="icon-cart-plus"></i> Beli</a>
                                    <!--<a href="javascript: send_cart(--><?php //echo $neg->ID_HM ?><!--)" class="btn btn-block btn-success"><i class="icon-cart-plus"></i> Beli</a>-->
                                    <?php
                                    $data_cart['menu'] = $neg->NAMA_MENU;
                                    $data_cart['harga'] = curr_format($neg->LABA_HM);
                                    $data_cart['kantin'] = $neg->NAMA_KANTIN;
                                    ?>
                                    <input type="hidden" id="data-<?php echo $neg->ID_HM; ?>" value='<?php echo json_encode($data_cart);?>'>
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
    <div id="modalDetail<?php echo $neg->ID_HM; ?>" class="modal fade" tabindex="-1" role="dialog">
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

<div id="modalCart" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="icon-accessibility"></i> Konfirmasi Pesan</h4>
            </div>

            <div class="modal-body with-padding">
                <div class="form-horizontal form-bordered validate" role="form">
                    <div>
                        <div class="col-xs-4">Menu</div>
                        <div class="col-xs-8" id="cartMenu">-</div>
                    </div>
                    <div>
                        <div class="col-xs-4">Harga</div>
                        <div class="col-xs-8" id="cartHarga">0</div>
                    </div>
                    <div>
                        <div class="col-xs-4">Kantin</div>
                        <div class="col-xs-8" id="cartKantin">-</div>
                    </div>
                    <div>&nbsp;</div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control required input-sm" placeholder="Pilih Tanggal" name="cart_tanggal" maxlength="10" min="<?php echo $open;?>" value="<?php echo set_value('tanggal', $open); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Qty</label>
                        <div class="col-sm-8">
                            <input type="number" name="cart_qty" class="form-control required text-center" value="1" min="1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jadwal</label>
                        <div class="col-sm-8">
                            <select class="form-control required" name="cart_jadwal">
                                <?php
                                foreach (config_item('pesan')['put_on'] as $pid => $pval)
                                {
                                    echo '<option value="'. $pid. '">'. $pval. '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions text-right">
                        <input type="hidden" name="cart_id" id="cartId">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <button type="button" class="btn btn-primary" id="cartConfirm">Beli</button>
                        <button class="btn btn-warning" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
