<style>
    table th {text-align: center;}
</style>
<div class="row">
    <div class="col-md-12">
        <?php
        if($datas) {
            ?>
            <!-- Contacts -->
            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            <i class="icon-file"></i> Data Pre-Piutang
                        </h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive table-hover">
                            <thead>
                            <tr>
                                <th width="5px">No.</th>
                                <th>Sekolah</th>
                                <th>Makanan</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 0;
                            $before = '';
                            foreach ($datas as $row_id => $row_val) {
                                ?>
                                <tr>
                                    <?php if($before!=$row_val->PID){
                                        $no++;
                                        ?><td class="text-right need-spans"><?php echo $no; ?></td><?php
                                    }?>
                                    <td><?php echo $row_val->NAMA_PENDIDIKAN; ?></td>
                                    <td><?php echo $row_val->NAMA_MENU. ' (@ '. $row_val->QTY. ' x '. curr_format($row_val->HARGA). ')'; ?></td>
                                    <td class="text-right">
                                        <?php
                                        $piutang_total = $row_val->QTY * $row_val->HARGA;
                                        echo curr_format($piutang_total);

                                        $hdn = '';
                                        $hdn .= '<input type="hidden" name="subtotal[' . $row_val->PID . ']" value="'.$piutang_total.'" class="subtotal-' . $row_val->PID . '">';
                                        $hdn .= '<input type="hidden" name="qty[' . $row_val->PID . '][' . $row_val->MID . ']" value="'.$row_val->QTY.'" class="qty-' . $row_val->PID . '-' . $row_val->MID . '">';
                                        echo $hdn;
                                        ?>
                                    </td>
                                    <?php if($before!=$row_val->PID){
                                        ?>
                                        <td class="text-center need-spans">
                                            <b class="ptotal piutang_total<?php echo $row_val->PID;?>" data-id="<?php echo $row_val->PID;?>">0</b><br><br>
                                            <a href="javascript: arCreate('<?php echo $this->encryption->encrypt($row_val->PID) ?>')" class="btn btn-success btn-xs">
                                                <i class="fa fa-truck"></i> create
                                            </a>
                                        </td>
                                        <?php
                                    }?>
                                </tr>
                                <?php
                                $before = $row_val->PID;
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- contacts -->
            <?php
        } else {
            ?>
            <div class="alert alert-success text-center">
                <b>Tidak ada Data</b><br><br>
                Silahkan <a href="<?php echo site_url('admin/ar-ap/piutang')?>">[klik link]</a> untuk kembali ke halaman <a href="<?php echo site_url('admin/ar-ap/piutang')?>"><b>Data PIUTANG</b></a>.
            </div><br>
            <?php
        }
        ?>
    </div>
</div>
<!-- /questions and contact -->
