
			<?php if (!empty($_GET['status'])) {
				if ($_GET['status']=='ok') { ?>
					<div class="alert alert-success fade in block-inner">
		                <button type="button" class="close" data-dismiss="alert">x</button>
		                <i class="icon-checkmark-circle"></i> Password berhasil di ubah.
		    		</div>
				<?php	
				}
			}?>
				
			<!-- Form bordered -->
			
			<?php echo form_open('','class="form-horizontal form-bordered block validate" role="form" enctype="multipart/form-data"');?>
	            <div class="panel panel-default">
	                <div class="panel-heading"><h6 class="panel-title"><i class="icon-user"></i> Ganti Password Anda</h6></div>
	                <div class="panel-body">
					<?php echo validation_errors(); ?>
				        <div class="form-group">
				            <label class="col-sm-2 control-label">Username</label>
				            <div class="col-sm-3">
				            	<input type="text" name="username" class="form-control required" value="<?php echo $infox->USERNAME_PEGAWAI;?>" readonly="readonly">
				            </div>
				        </div>
				        
				        <div class="form-group">
				            <label class="col-sm-2 control-label"> Password Baru</label>
				            <div class="col-sm-3">
				            	<input type="password" name="new_pass" class="form-control required">
				            </div>
				        </div>
				        <div class="form-group">
				            <label class="col-sm-2 control-label"> Konfirmasi Password Baru</label>
				            <div class="col-sm-3">
				            	<input type="password" name="con_pass" class="form-control required">
				            </div>
				        </div>

                        <div class="form-actions text-right">
                        	<input type="submit" value="Simpan" class="btn btn-primary">
                        	<input type="reset" value="Reset" class="btn btn-success">
                        	<?php echo anchor('admin/dashboard', 'Batal','class="btn btn-danger"')?>
                        </div>

				    </div>
				</div>
			<?php echo form_close();?>
			<!-- /form striped -->