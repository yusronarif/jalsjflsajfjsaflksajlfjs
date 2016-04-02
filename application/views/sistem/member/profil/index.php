
			<?php if (!empty($_GET['status'])) {
				if ($_GET['status']=='ok') { ?>
					<div class="alert alert-success fade in block-inner">
		                <button type="button" class="close" data-dismiss="alert">x</button>
		                <i class="icon-checkmark-circle"></i> Profil berhasil di ubah.
		    		</div>
				<?php	
				}
			}?>
			<!-- Form bordered -->
			
			<?php echo form_open('','class="form-horizontal form-bordered block validate" role="form" enctype="multipart/form-data"');?>
	            <div class="panel panel-default">
	                <div class="panel-heading"><h6 class="panel-title"><i class="icon-user"></i> Ubah Profil Anda</h6></div>
	                <div class="panel-body">
					<?php echo validation_errors(); ?>
				        <div class="form-group">
				            <label class="col-sm-2 control-label">Username</label>
				            <div class="col-sm-3">
				            	<input type="text" name="username" class="form-control required" value="<?php echo $infox->USERNAME_MEMBER;?>" readonly="readonly">
				            </div>
				        </div>
				        <div class="form-group">
				            <label class="col-sm-2 control-label"> Email</label>
				            <div class="col-sm-3">
				            	<input type="email" name="email" class="form-control required" value="<?php echo $infox->EMAIL_MEMBER;?>">
				            </div>
				        </div>
				        <div class="form-group">
				            <label class="col-sm-2 control-label"> No. Telepon / HP</label>
				            <div class="col-sm-3">
				            	<input type="text" name="telp" class="form-control required" value="<?php echo $infox->TELP_MEMBER;?>">
				            </div>
				        </div>
				        
				        <div class="form-group">
				            <label class="col-sm-2 control-label"> Alamat</label>
				            <div class="col-sm-10">
				            	<input type="text" name="alamat" class="form-control required" value="<?php echo $infox->ALAMAT_MEMBER;?>">
				            </div>
				        </div>
				      
						<div class="form-group">
							<label class="col-sm-2 control-label">Gambar Sekarang </label>
							<div class="col-sm-10">
								<img alt="" src="<?php echo base_url('uploads/images/'.$infox->GAMBAR_MEMBER)?>" width="200" height="200">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Gambar Baru </label>
							<div class="col-sm-2">
								<input type="file" class="styled" name="gambar">
							</div>
						</div>
                        <div class="form-actions text-right">
                        	<input type="submit" value="Simpan" class="btn btn-primary">
                        	<input type="reset" value="Reset" class="btn btn-success">
                        	<?php echo anchor('member/dashboard', 'Batal','class="btn btn-danger"')?>
                        </div>

				    </div>
				</div>
			<?php echo form_close();?>
			<!-- /form striped -->