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
$put_wkt = [1=>'Pagi', 2=>'Siang', 3=>'Sore'];

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
elseif (intval(date("His")) < intval($buka))
{ ?>
    <div class="alert alert-info fade in block-inner">

        <i class="icon-info"></i> Pesanan anda saat ini akan disajikan pada hari <?php echo hari(date("w", strtotime($untuk))) . ", " . date("d-m-Y", strtotime($untuk)); ?>.
    </div>
<?php
}
elseif (intval(date("His")) > intval($tutup))
{ ?>
    <div class="alert alert-info fade in block-inner">

        <i class="icon-info"></i> Pesanan anda saat ini akan disajikan pada hari <?php echo hari(date("w", strtotime($untukk))) . ", " . date("d-m-Y", strtotime($untukk)); ?>.
    </div>
<?php
} ?>

<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i> Data Keranjang</h6></div>
    <div class="table-responsive">
        <?php echo form_open('member/keranjang/validate_update_cart'); ?>
        <table class="table table-responsive">
            <thead>
            <tr>
                <th class="text-center" rowspan="2">#</th>
                <th class="text-center" rowspan="2">Nama Item</th>
                <th class="text-center" rowspan="2">Harga</th>
                <th class="text-center" rowspan="2">Qty Total</th>
                <th class="text-center" colspan="2">Pengambilan</th>
                <th class="text-center" rowspan="2">Sub Total</th>
                <th class="text-center" rowspan="2"></th>
            </tr>
            <tr>
                <th class="text-center">Tgl</th>
                <th class="text-center">Waktu</th>
                <th class="text-center">Qty</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            $items_before = '';
            ?>
            <?php foreach ($this->cart->contents() as $items): ?>
                <?php foreach ($items['put'] as $puts => $put_val): ?>
                    <?php
                    list($put_tgl, $put_id) = explode('::', $puts);
                    ?>
                    <tr>
                        <?php if($items_before!=$items['name']){
                            ?>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $items['name']; ?></td>
                            <td class="text-right"><?php echo number_format($items['price']); ?></td>
                            <td class="text-center"><?php echo number_format($items['qty']); ?></td>
                            <?php
                        } else {
                            ?>
                            <td colspan="4">&nbsp;</td>
                            <?php
                        }?>
                        <td class="text-center"><?php echo format_date($put_tgl);?></td>
                        <td class="text-center"><?php echo $put_wkt[$put_id];?></td>
                        <td><?php echo form_input(array('name' => 'qty[]', 'value' => $put_val, 'maxlength' => '3', 'class' => 'form-control text-center',)); ?></td>
                        <td class="text-right"><?php echo number_format($items['price']*$put_val); ?></td>
                        <td>
                            <a href="<?php echo site_url('member/keranjang/validate_delete_cart/' . $items['rowid']. '::'. $puts) ?>" class="btn btn-danger btn-icon btn-xs tip" title="Hapus" onclick="return confirm('Yakin akan menghapus?')"><i class="icon-remove"></i></a>
                            <?php
                            echo form_hidden('rowid[]', $items['rowid']);
                            echo form_hidden('putid[]', $put_id);
                            ?>
                        </td>
                    </tr>
                    <?php
                    $items_before = $items['name'];
                    ?>
                <?php endforeach; ?>
                <?php $i++; ?>
            <?php endforeach; ?>
            <tr>
                <td colspan="7" class="text-right"><strong>Grand Total</strong></td>
                <td class="text-right"><strong><?php echo number_format($this->cart->total()); ?></strong></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="7" class="text-right"><strong>Saldo Anda</strong></td>
                <td class="text-right"><strong><?php echo number_format($saldo_user); ?></strong></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="7" class="text-right"><strong>Sisa Saldo</strong></td>
                <td class="text-right"><strong><?php echo number_format($saldo_user - $this->cart->total()); ?></strong></td>
                <td></td>
            </tr>
            <tr><td colspan="9">&nbsp;</td></tr>
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
    </div>
</div>
<!-- /default table -->
<!-- /questions and contact -->
