			<?php if (!empty($_GET['status'])) {
				if ($_GET['status']=='berhasil') { ?>
					<div class="alert alert-success fade in block-inner">
		                <button type="button" class="close" data-dismiss="alert">x</button>
		                <i class="icon-checkmark-circle"></i> Transaksi Berhasil.
		    		</div>
				<?php	
				}
			}?>
			
			<!-- /breadcrumbs line -->
			<div class="row">
            	<div class="col-md-12">
            		
					<!-- Contacts -->
			    	<div class="block">
			    	<!-- General information -->
	                	<div class="block-inner">
							<div class="form-group">
								<div class="row">
									<?php echo form_open();?>
									<div class="col-md-6">
										<label>Scan QR-Code / Input</label>
		                                <div class="row">
		                                	<div class="col-md-12">
			                                    <input type="text" name="username" class="form-control" autocomplete="off" autofocus>
		                                	</div>		                                	
		                                </div>
									</div>
									<div class="col-md-4">
										<label>&nbsp;</label>
		                                <div class="row">
											<div class="col-md-4">
												<input type="submit" value="Go" class="btn btn-info">
											</div>
										</div>
									</div>
									<?php echo form_close();?>
								</div>
							</div>
						</div>
						<!-- /general information -->
			    		
				    
			    	</div>
			    	
			    	<?php if ($cek==1){
			    		if ($errors<>1){
			    		?>
				        <?php echo form_open('admin/deposit/save', 'class="form-horizontal form-bordered block validate" role="form"');?>
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
							            <label class="col-sm-2 control-label"> NOMINAL DEPOSIT</label>
							            <div class="col-sm-2">
							            	<input type="number" name="nominal_saldo" class="form-control required" value="" >
							            </div>
							        </div>
			                        <div class="form-actions text-right">
			                        	<input type="submit" value="Simpan" class="btn btn-primary">
			                        	<input type="reset" value="Reset" class="btn btn-success">
			                        	<?php echo anchor('admin/deposit', 'Batal','class="btn btn-danger"')?>
			                        </div>
			
							    </div>
							</div>
						<?php echo form_close();?>
				        	<?php } else {?>
				        	<div class="alert alert-warning fade in block-inner">
				                <button type="button" class="close" data-dismiss="alert">x</button>
				                <i class="icon-checkmark-circle"></i> ID Tidak Valid.
				    		</div>
				        	<?php }?>
				        
				        <?php } else {
				        	if($errors==1){
				        	?>
				        	<div class="alert alert-warning fade in block-inner">
				                <button type="button" class="close" data-dismiss="alert">x</button>
				                <i class="icon-checkmark-circle"></i> ID Tidak Valid.
				    		</div>
				        	<?php } else {?>
				        	<div class="alert alert-info fade in block-inner">
				                <button type="button" class="close" data-dismiss="alert">x</button>
				                <i class="icon-checkmark-circle"></i> Lakukan Scan QR-Code / Isi Kode.
				    		</div>
				        <?php }}?>
			    	<!-- contacts -->
			    	
            	</div>

            	

            </div>
            <!-- /questions and contact -->