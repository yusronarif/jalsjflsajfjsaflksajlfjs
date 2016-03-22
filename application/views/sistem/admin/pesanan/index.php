
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
    				    	
    				    </div>
				    </div>
				</div>
            	<div class="col-md-12">
            		
					<!-- Contacts -->
			    	<div class="block">
				    	<div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-file"></i> Data Pesanan <?php echo hari(date("w", strtotime($tanggal))).", ".date("d-m-Y", strtotime($tanggal));?></h6></div>
			                <div class="table-responsive">
				                <table class="table">
				                    <thead>
				                        <tr>
				                            <th>No.</th>
				                            <th>Nama Hidangan</th>
				                            <th>Qty</th>
				                            <th>Dipesan Oleh</th>
							    <th>Pengambilan</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	<?php $no=1; 
				                        foreach ($pesanan as $neg):?>
				                        <tr>
				                            <td><?php echo $no;?></td>
				                            <td><?php echo $neg->NAMA_MENU;?></td>
				                            <td><?php echo number_format($neg->TOTAL);?></td>
				                            <td><?php echo $neg->NAMA_PENDIDIKAN;?></td>
							    <td><?php echo $neg->NAMA_ISTIRAHAT;?></td>
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