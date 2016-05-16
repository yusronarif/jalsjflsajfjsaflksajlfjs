<?php
if($this->cart->total_items() <= 0) echo '<meta http-equiv="refresh" content="3; '.site_url('member/pesan').'">';
?>
<?php if (! empty($_GET['status'])) {
    if ($_GET['status'] == 'berhasil') { ?>
        <div class="alert alert-success fade in block-inner">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <i class="icon-checkmark-circle"></i> Transaksi berhasil, klik
            <a href="<?php echo site_url('member/histori_pesanan') ?>">disini</a> untuk melihat histori transaksi.
        </div>
        <?php
    } elseif ($_GET['status'] == 'gagal') { ?>
        <div class="alert alert-danger fade in block-inner">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <i class="icon-cancel-circle"></i> Saldo anda tidak mencukupi untuk melakukan transaksi ini.
        </div>
    <?php }
} ?>

<?php
$now = date('Y-m-d H:i:s');
$untuk = date('Y-m-d', strtotime($now . "+1 days"));
$untukk = date('Y-m-d', strtotime($now . "+2 days"));

if (intval(date("His")) >= intval($buka) && intval(date("His")) <= intval($tutup))
{ ?>
    <div class="alert alert-info fade in block-inner">

        <i class="icon-cancel-circle"></i> Untuk sementara transaksi anda tidak bisa dilakukan hingga pukul <?php echo $pukulbuka; ?> WIB.
    </div>
<?php
}
else
{ ?>
    <div class="alert alert-info fade in block-inner">

        <i class="icon-info"></i> Pesanan anda dapat di ambil mulai tanggal <b id="tgl_ambil"></b> sesuai dengan "tanggal konsumsi" yang telah dipilih.
    </div>
<?php
} ?>

<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i> Data Keranjang</h6></div>
    <div class="table-responsive">
        <?php
        if($this->cart->total_items() > 0) {
            ?>
            <?php echo form_open('member/keranjang/validate_update_cart'); ?>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nama Item</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Sub Total</th>
                    <th class="text-center"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                $x = 0;
                $items_before = $bef_putdate = '';

                foreach ($this->cart->contents() as $items) {
                    foreach ($items['put'] as $puts => $put_val) {
                        list($put_tgl, $put_id) = explode('::', $puts);
                        $put_order = str_replace('-', '', $put_tgl) . '.' . $put_id . '.' . $x;

                        $krj[$put_order]['row_id'] = $items['rowid'];
                        $krj[$put_order]['name'] = $items['name'] . '<br>(' . config_item('pesan')['put_on'][$put_id] . ')';
                        $krj[$put_order]['price'] = $items['price'];
                        $krj[$put_order]['put_raw'] = $puts;
                        $krj[$put_order]['put_id'] = $put_id;
                        $krj[$put_order]['put_date'] = $put_tgl;
                        $krj[$put_order]['put_val'] = $put_val;
                        $x++;
                    }
                }
                ksort($krj);

                foreach ($krj as $ids => $vals) {
                    if ($i == 1) {
                        echo '<input type="hidden" id="dateMulai" value="' . format_date($vals['put_date'], ['day' => true]) . '">';
                    }

                    if ($bef_putdate != $vals['put_date']) {
                        ?>
                        <tr>
                            <td></td>
                            <td colspan="5">
                                <b>:: Tanggal Konsumsi: <?php echo format_date($vals['put_date'], ['day' => true]); ?></b>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $vals['name']; ?></td>
                        <td class="text-right"><?php echo number_format($vals['price']); ?></td>
                        <td style="padding-left:0px; padding-right:0px;">
                            <?php echo form_input(['name'      => 'qty[]',
                                                   'value'     => $vals['put_val'],
                                                   'maxlength' => '3',
                                                   'class'     => 'form-control text-center input-sm',
                                                   'style'     => 'min-width:25px; padding-left:0px; padding-right:0px;'
                            ]); ?>
                        </td>
                        <td class="text-right"><?php echo number_format($vals['price'] * $vals['put_val']); ?></td>
                        <td>
                            <a href="<?php echo site_url('member/keranjang/validate_delete_cart/' . $vals['row_id'] . '::' . $vals['put_raw']) ?>" class="btn btn-danger btn-icon btn-xs tip" title="Hapus" onclick="return confirm('Yakin akan menghapus?')"><i class="icon-remove"></i></a>
                            <?php
                            echo form_hidden('rowid[]', $vals['row_id']);
                            echo form_hidden('putid[]', $vals['put_id']);
                            ?>
                        </td>
                    </tr>
                    <?php
                    //$items_before = $vals['name'];
                    $bef_putdate = $vals['put_date'];
                    $i++;
                }
                ?>
                <tr>
                    <td colspan="4" class="text-right"><strong>Grand Total</strong></td>
                    <td class="text-right"><strong><?php echo number_format($this->cart->total()); ?></strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right"><strong>Saldo Anda</strong></td>
                    <td class="text-right"><strong><?php echo number_format($saldo_user); ?></strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right"><strong>Sisa Saldo</strong></td>
                    <td class="text-right">
                        <strong><?php echo number_format($saldo_user - $this->cart->total()); ?></strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>
                </tr>
                </tbody>
            </table>
            <?php if ($this->cart->total_items() > 0) { ?>
                <div class="panel-body">
                    <div class="form-actions text-center">

                        <input type="submit" name="update" value="Update Cart" class="btn btn-block btn-info">
                        <?php if (! (intval(date("His")) >= intval($buka) && intval(date("His")) <= intval($tutup))) { ?>
                            <?php echo anchor('member/' . $this->uri->rsegment(1) . '/selesai', 'Bayar Sekarang', 'class="btn btn-block btn-primary"  onclick="return confirm(\'Apakah anda yakin?\')"') ?>
                        <?php } ?>
                        <?php echo anchor('member/' . $this->uri->rsegment(1) . '/deletecart', 'Bersihkan Keranjang', 'class="btn btn-block btn-danger"  onclick="return confirm(\'Apakah anda yakin?\')"') ?>
                    </div>
                </div>

            <?php } ?>
            <?php form_close(); ?>
            <?php
        }
        else {
            ?>
            <div class="alert alert-danger fade in block-inner">
                <i class="icon-info"></i> Tidak ada pesanan dalam keranjang belanja.
            </div>
            <?php
        }
        ?>
    </div>
</div>
<!-- /default table -->
<!-- /questions and contact -->
