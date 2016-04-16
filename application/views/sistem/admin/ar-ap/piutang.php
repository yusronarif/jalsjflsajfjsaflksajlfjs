<style>
    table th {text-align: center;}
</style>
<div class="row">
    <div class="col-md-12">
        <?php
        if($ars) {
            ?>
            <!-- Contacts -->
            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            <i class="icon-file"></i> Data Piutang
                        </h6>
                        <a href="<?php echo site_url('admin/ar-ap/piutang/create')?>" class="btn btn-success btn-xs pull-right"><i class="icon-plus"></i> Piutang Baru</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive table-hover">
                            <thead>
                            <tr>
                                <th width="5px">No.</th>
                                <th>Nomor Piutang</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($ars as $row_id => $row_val) {
                                ?>
                                <tr>
                                    <td class="text-right"><?php echo $no; ?></td>
                                    <td><?php echo $row_val->NO_PIUTANG; ?></td>
                                    <td class="text-center"><?php echo format_date($row_val->TGL_PIUTANG); ?></td>
                                    <td class="text-right"><?php echo number_format($row_val->TOTAL_PIUTANG); ?></td>
                                    <td class="text-center"><?php echo config_item('status')['ar'][$row_val->STATUS_PIUTANG]; ?></td>
                                    <td class="text-center"><a href="#" class="btn btn-link btn-xs"><i class="icon-eye"></i> detil</a></td>
                                </tr>
                                <?php
                                $no++;
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
                <b>Tidak ada Piutang</b><br><br>
                Silahkan <a href="<?php echo site_url('admin/ar-ap/piutang/create')?>">[klik link]</a> berikut untuk membuat <a href="<?php echo site_url('admin/ar-ap/piutang/create')?>"><b>PIUTANG Baru</b></a>.
            </div><br>
            <?php
        }
        ?>
    </div>
</div>
<!-- /questions and contact -->
