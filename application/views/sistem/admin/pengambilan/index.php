
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
			    	<div class="row">
			    		<div class="col-md-6">
					        <?php echo form_open('','class="form-horizontal form-bordered block validate" role="form"');?>
					            
					            <div class="panel panel-default">
					                <div class="panel-heading"><h6 class="panel-title"><i class="icon-user"></i> Detail Member</h6></div>
					                <div class="panel-body">
									<?php echo validation_errors(); ?>
								        <div class="form-group">
								            <label class="col-sm-2 control-label">NIK</label>
								            <div class="col-sm-8">
								            	<input type="text" name="nik" class="form-control" value="<?php echo $infox->NIK_MEMBER;?>" readonly="readonly">
								            </div>
								        </div>
								        <div class="form-group">
								            <label class="col-sm-2 control-label"> NAMA</label>
								            <div class="col-sm-8">
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
								            <div class="col-sm-8">
								            	<input type="text" name="alamat" class="form-control" value="<?php echo $infox->ALAMAT_MEMBER;?>" readonly="readonly">
								            </div>
								        </div>
								       
				
								    </div>
								</div>
							<?php echo form_close();?>
						</div>
						<div class="col-md-6">
					            
					            <div class="panel panel-default">
					                <div class="panel-heading"><h6 class="panel-title"><i class="icon-food"></i> Detail Pesanan</h6></div>
					                <?php foreach ($pesanan as $pesan):?>
					                <?php $no=1;?>
					                <?php echo form_open('admin/pengambilan/save','class="form-horizontal form-bordered block validate" role="form"');?>
					                <input type="hidden" name="no_transaksi" value="<?php echo $pesan->NO_TRANSAKSI;?>">
					                <div class="panel-body">
										<div align="center"><strong><?php echo $pesan->NO_TRANSAKSI;?> ~ <?php echo hari(date("w", strtotime($pesan->UNTUK_TRANSAKSI))).", ".date("d-m-Y", strtotime($pesan->UNTUK_TRANSAKSI));?></strong></div>
										<br>
										<div class="table-responsive">
							                
								            <table class="table">
								               <thead>
								                   <tr>
								                      <th>#</th>
								                      <th>Nama Item</th>
								                      <th>Qty</th>
								                   </tr>
								               </thead>
								               <tbody>
								              		<?php foreach ($items as $item):?>
								              		<?php if($pesan->NO_TRANSAKSI==$item->NO_TRANSAKSI){?>
								                   <tr>
								                   	  <td><?php echo $no;?></td>
								                      <td><?php echo $item->NAMA_MENU;?></td>
								                      <td><?php echo $item->QTY_TRANSAKSI_DTL;?></td>
								                   </tr>
								                   <?php $no++;}?>
								                   <?php  endforeach;?>
								               </tbody>
								            </table>
								            
								        </div>
								        
					                        <div class="form-actions text-center">
					                        	<input type="submit" value="Selesai" class="btn btn-primary btn-block">
					                        	
					                        	<?php echo anchor('admin/pengambilan', 'Batal','class="btn btn-danger btn-block"')?>
					                        </div>
				                        
								    </div>
								    </form>
								    <hr>
								    <?php endforeach;?>
								</div>
							
							</div>
					</div>
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