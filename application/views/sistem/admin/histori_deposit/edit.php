			<div class="row">
            	<div class="col-md-12">
				        <?php echo form_open('', 'class="form-horizontal form-bordered block validate" role="form"');?>
				            <input type="hidden" name="id_member" value="<?php echo $infox->ID_MEMBER;?>">
				            <div class="panel panel-default">
				                <div class="panel-heading"><h6 class="panel-title"><i class="icon-user"></i> Detail Member</h6></div>
				                <div class="panel-body">
								<?php echo validation_errors(); ?>
							        <div class="form-group">
							            <label class="col-sm-2 control-label">NIK</label>
							            <div class="col-sm-3">
							            	<input type="text" name="nik" class="form-control" value="<?php echo $infox->NIK_MEMBER;?>" readonly="readonly">
							            </div>
							        </div>
							        <div class="form-group">
							            <label class="col-sm-2 control-label"> NAMA</label>
							            <div class="col-sm-3">
							            	<input type="text" name="nama" class="form-control" value="<?php echo $infox->NAMA_MEMBER;?>" readonly="readonly">
							            </div>
							        </div>
							        <div class="form-group">
								            <label class="col-sm-2 control-label"> FOTO</label>
								            <div class="col-sm-8">
								            	<img alt="" src="<?php echo site_url('uploads/images/'.$infox->GAMBAR_MEMBER)?>" width="80">
								            </div>
								        </div>
							        <div class="form-group">
							            <label class="col-sm-2 control-label"> ALAMAT</label>
							            <div class="col-sm-6">
							            	<input type="text" name="alamat" class="form-control" value="<?php echo $infox->ALAMAT_MEMBER;?>" readonly="readonly">
							            </div>
							        </div>
							        <div class="form-group">
							            <label class="col-sm-2 control-label"> SALDO</label>
							            <div class="col-sm-2">
							            	<input type="number" name="saldo" class="form-control required" value="<?php echo $infox->SALDO_MEMBER;?>" readonly="readonly">
							            </div>
							        </div>
							        <div class="form-group">
							            <label class="col-sm-2 control-label"> NO TOPUP</label>
							            <div class="col-sm-2">
							            	<input type="text" name="no_topup" class="form-control required" value="<?php echo $topupx->NO_TOPUP;?>" readonly>
							            </div>
							        </div>
							        <div class="form-group">
							            <label class="col-sm-2 control-label"> NOMINAL DEPOSIT</label>
							            <div class="col-sm-2">
							            	<input type="number" name="nominal_saldo_lama" class="form-control required" value="<?php echo $topupx->NOMINAL_TOPUP;?>" readonly>
							            </div>
							        </div>
							        <div class="form-group">
							            <label class="col-sm-2 control-label"> NOMINAL DEPOSIT BARU</label>
							            <div class="col-sm-2">
							            	<input type="number" name="nominal_saldo" class="form-control required" value="" >
							            </div>
							        </div>
							        <div class="form-group">
							            <label class="col-sm-2 control-label"> ALASAN EDIT</label>
							            <div class="col-sm-10">
							            	<input type="text" name="ket" class="form-control required" value="" >
							            </div>
							        </div>
			                        <div class="form-actions text-right">
			                        	<input type="submit" value="Simpan" class="btn btn-primary" onclick="return confirm(\'Apakah Data Sudah benar?\')">
			                        	<input type="reset" value="Reset" class="btn btn-success">
			                        	<?php echo anchor('admin/histori_deposit', 'Batal','class="btn btn-danger"')?>
			                        </div>
			
							    </div>
							</div>
			    	
            	</div>

            	

            </div>
            <!-- /questions and contact -->