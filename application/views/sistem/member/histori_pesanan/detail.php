<!-- /breadcrumbs line -->
<!-- Default table -->
<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title">
            <i class="icon-table2"></i> Histori Transaksi No. <?php echo $histori->NO_TRANSAKSI; ?></h6></div>
    <br>
    <div align="center">
        <p>Tanggal Pemesanan : <b><?php echo hari(date("w", strtotime($histori->TGL_TRANSAKSI))) . ", " . date("d-m-Y", strtotime($histori->TGL_TRANSAKSI)); ?></b></p>
        <p>Status : <?php
            if ($histori->STATUS_TRANSAKSI == 1) {
                echo '<span class="label label-info">Belum</span>';
            } elseif ($histori->STATUS_TRANSAKSI == 2) {
                echo '<span class="label label-success">Sudah</span>';
            } else {
                echo '<span class="label label-danger">Kosong</span>';
            }
            ?></p>
    </div>
    <div class="table-responsive">

        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nama Item</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Kantin/Waktu</th>
                    <th class="text-center">Sub Total</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $gtot = 0;
                $bef_putdate = '';
                $wkt_ambil = [1=>'Sarapan', 2=>'Makan Siang', 3=>'Makan Sore'];

                foreach ($historipesanan as $neg) {
                    if($bef_putdate!=$neg->PUT_DATE_TRANSAKSI_DTL){
                        $i = 1;
                        ?>
                        <tr>
                            <td></td>
                            <td colspan="6">
                                <b># Tanggal Konsumsi: <?php echo format_date($neg->PUT_DATE_TRANSAKSI_DTL);?></b>
                            </td>
                        </tr>
                        <?php
                    }

                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $neg->NAMA_MENU; ?></td>
                        <td class="text-right"><?php echo $neg->LABA_TRANSAKSI_DTL; ?></td>
                        <td class="text-center"><?php echo $neg->QTY_TRANSAKSI_DTL; ?></td>
                        <td><?php echo $neg->NAMA_KANTIN.'<br>"'.$wkt_ambil[$neg->PUT_ON_TRANSAKSI_DTL].'"'; ?></td>
                        <?php $sub = $neg->QTY_TRANSAKSI_DTL * $neg->LABA_TRANSAKSI_DTL ?>
                        <td class="text-right"><?php echo number_format($sub); ?></td>
                        <td class="text-center">
                            <?php
                            if ($neg->STATUS_TRANSAKSI_DTL == 0) {
                                echo '<span class="label label-info">Belum</span>';
                            } else {
                                echo '<span class="label label-success">Sudah</span>';
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                    $i++;
                    $gtot = $gtot + $sub;
                    $bef_putdate = $neg->PUT_DATE_TRANSAKSI_DTL;
                }
                ?>
                <tr>
                    <td colspan="5">
                        <div align="right"><strong>Grand Total</strong></div>
                    </td>
                    <td>
                        <div align="right"><strong><?php echo number_format($gtot); ?></strong></div>
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="7">&nbsp;</td></tr>
            </tbody>
        </table>

    </div>
    <div class="form-actions text-center">
        <?php echo anchor('member/' . $this->uri->rsegment(1), 'Kembali', 'class="btn btn-block btn-danger"') ?>

    </div>
</div>
<!-- /default table -->
<!-- /questions and contact -->
