<style>
table th {text-align: center;}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h6 class="panel-title"><i class="icon-calendar"></i> Pilih Tanggal</h6>
            </div>
            <div class="panel-body">
                <?php echo form_open('', 'role="form" class="form-inline"'); ?>
                <div class="form-group">
                    <label>Mulai</label>
                    <input type="text" class="datepicker form-control text-center" placeholder="Pilih Tanggal" name="tanggal" value="<?php echo set_value('tanggal'); ?>">
                </div>
                <div class="form-group">
                    <label>s/d</label>
                    <input type="text" class="datepicker form-control text-center" placeholder="Pilih Tanggal" name="tanggal_max" value="<?php echo set_value('tanggal_max'); ?>">
                </div>
                <button type="submit" class="btn btn-info">Go</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <?php
        if($pesanan) {
            ?>
            <!-- Contacts -->
            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            <i class="icon-file"></i>
                            Data Pesanan Tanggal
                            <?php echo format_date(date_db($this->input->post('tanggal')));?>
                            s/d
                            <?php echo format_date(date_db($this->input->post('tanggal_max')));?>
                        </h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive table-hover">
                            <thead>
                            <tr>
                                <th width="5px">No.</th>
                                <th>Nama Hidangan</th>
                                <th>Qty</th>
                                <th>Dipesan Oleh</th>
                                <th>Pengambilan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $untuk_before = '';
                            foreach ($pesanan as $neg) {
                                if($untuk_before != $neg->PUT_DATE_TRANSAKSI_DTL){
                                    $sub_qty[$neg->PUT_DATE_TRANSAKSI_DTL] = 0;

                                    if($no>1){
                                        ?>
                                        <tr>
                                            <th class="text-right" colspan="2">Sub Total</th>
                                            <th class="text-right"><?php echo $sub_qty[$untuk_before];?></th>
                                            <th colspan="2"></th>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="5"><b>:: Tanggal Saji: <?php echo format_date($neg->PUT_DATE_TRANSAKSI_DTL); ?></b></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tr>
                                    <td class="text-right"><?php echo $no; ?></td>
                                    <td><?php echo $neg->NAMA_MENU; ?></td>
                                    <td class="text-right"><?php echo $neg->SUB_QTY; ?></td>
                                    <td><?php echo $neg->NAMA_PENDIDIKAN; ?></td>
                                    <td><?php echo config_item('pesan')['put_on'][$neg->PUT_ON_TRANSAKSI_DTL]; ?></td>
                                </tr>
                                <?php
                                $no++;
                                $sub_qty[$neg->PUT_DATE_TRANSAKSI_DTL] += $neg->SUB_QTY;
                                $untuk_before = $neg->PUT_DATE_TRANSAKSI_DTL;
                            } ?>
                            <tr>
                                <th class="text-right" colspan="2">Sub Total</th>
                                <th class="text-right"><?php echo $sub_qty[$untuk_before];?></th>
                                <th colspan="2"></th>
                            </tr>
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
                <b>Tidak ada Pesanan</b><br>
                antara tanggal
                <b><?php echo format_date(date_db($this->input->post('tanggal')));?></b>
                s/d
                <b><?php echo format_date(date_db($this->input->post('tanggal_max')));?></b>
            </div><br>
            <?php
        }
        ?>
    </div>

</div>
<!-- /questions and contact -->
