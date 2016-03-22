
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
        					<div class="panel panel-default">
        				    	<div class="panel-heading"><h6 class="panel-title"><i class="icon-calendar"></i> Pilih Tanggal</h6></div>
								<div class="panel-body">
								<?php echo form_open('', 'role="form"');?>	
									<div class="col-sm-6">
			                        	<input type="text" class="datepicker form-control" placeholder="Pilih Tanggal" name="tanggal" value="<?php echo $tanggal;?>">
		                        	</div>

		                        	<div class="col-sm-6">
		                        		<input type="submit" value="Go" class="btn btn-info">
		                        	</div>
		                       <?php echo form_close();?>
		                        </div>
        				    </div>
    				    </div>
    				    <div class="col-md-6">
    				    	<div class="panel panel-default">
        				    	<div class="panel-heading"><h6 class="panel-title"><i class="icon-coin"></i> Detail Deposit</h6></div>
        				    	<div class="panel-body">
        				    	<p>Nominal Deposit Sukses : <strong>Rp. <?php echo number_format($sukses->TOTAL);?></strong></p>
        				    	<p>Nominal Deposit Void : <strong>Rp. <?php echo number_format($void->TOTAL);?></strong></p>
        				    	</div>
        				    </div>
    				    </div>
				    </div>
				</div>
            	<div class="col-md-12">
					<!-- Contacts -->
			    	<div class="block">
			    		
				    	<div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-file"></i> Data Histori Deposit</h6></div>
			                <div class="datatable">
				                <table class="table table-bordered">
				                    <thead>
				                        <tr>
				                            <th>No.</th>
				                            <th>No Top Up</th>
				                            <th>Member</th>
				                            <th>Tanggal</th>
				                            <th>Nominal</th>
				                            <th>Status</th>
				                            <th>#</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	<?php $no=1; 
				                        foreach ($historipesanan as $neg):?>
				                        <tr>
				                            <td><?php echo $no;?></td>
				                            <td><?php echo $neg->NO_TOPUP;?></td>
				                            <td><?php echo $neg->USERNAME_MEMBER;?></td>
				                            <td><?php echo hari(date("w", strtotime($neg->TGL_TOPUP))).", ".date("d-m-Y H:i:s", strtotime($neg->TGL_TOPUP));?></td>
				                            <td><div align="right">Rp. <?php echo number_format($neg->NOMINAL_TOPUP);?></div></td>
				                            <th>
											<?php if ($neg->STATUS_TOPUP==1) {?>
											    <div align="center"><span class="label label-success">Sukses</span></div>
											<?php } else { ?>
												<div align="center"><span class="label label-danger">Void</span></div>
											<?php }?>
											</th>
				                            <th>
				                            <div align="center">
				                            <?php if ($neg->STATUS_TOPUP==1 && $neg->CLOSE_TOPUP==0) {?>
				                            	<?php echo anchor('admin/'.$this->uri->rsegment(1).'/edit/'.$neg->NO_TOPUP,'<i class="icon-pencil4"></i> Edit','class="btn btn-xs btn-success"')?>
				                            	<?php echo anchor('admin/'.$this->uri->rsegment(1).'/void/'.$neg->NO_TOPUP,'<i class="icon-remove3"></i> Void','class="btn btn-xs btn-danger"')?>
				                            <?php } else {?>
				                            	<div align="center"><span class="label label-info">Close</span></div>
				                            <?php }?>
				                            </div>
				                            </th>
				                        </tr>
				                        <?php $no++;
				                        endforeach;?>
				                    </tbody>
				                </table>
			                </div>
				        </div>
			    	</div>
			    	<!-- contacts -->
            	</div>

            	

            </div>
            <!-- /questions and contact -->