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
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($datas as $row_id => $row_val) {
                                ?>
                                <tr>
                                    <td class="text-right"><?php echo $no; ?></td>
                                    <td><?php echo $row_val->NAMA_PENDIDIKAN; ?></td>
                                    <td class="text-right"><?php echo number_format($row_val->TOTAL_LABA); ?></td>
                                    <td class="text-center">
                                        <a href="javascript: arCreate('<?php echo $this->encryption->encrypt($row_val->ID_PENDIDIKAN) ?>')" class="btn btn-success btn-xs">
                                            <i class="fa fa-truck"></i> create
                                        </a>
                                    </td>
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
                Silahkan <a href="<?php echo site_url('admin/ar-ap/piutang/create')?>">[klik link]</a> berikut untuk membuat <a href="<?php echo site_url('ar-ap/piutang/create')?>"><b>PIUTANG Baru</b></a>.
            </div><br>
            <?php
        }
        ?>
    </div>
</div>
<!-- /questions and contact -->
