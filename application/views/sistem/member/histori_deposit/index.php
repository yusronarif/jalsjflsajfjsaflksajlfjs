
			<div class="row">
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
				                            <th>Tanggal</th>
				                            <th>Nominal</th>
				                            <th>Status</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	<?php $no=1; 
				                        foreach ($historipesanan as $neg):?>
				                        <tr>
				                            <td><?php echo $no;?></td>
				                            <td><?php echo $neg->NO_TOPUP;?></td>
				                            <td><?php echo hari(date("w", strtotime($neg->TGL_TOPUP))).", ".date("d-m-Y H:i:s", strtotime($neg->TGL_TOPUP));?></td>
				                            <td><div align="right">Rp. <?php echo number_format($neg->NOMINAL_TOPUP);?></div></td>
				                            <td>
				                            <?php if ($neg->STATUS_TOPUP==1) {?>
											    <div align="center"><span class="label label-success">Sukses</span></div>
											<?php } else { ?>
												<div align="center"><span class="label label-danger">Void</span></div>
											<?php }?>
				                            </td>
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