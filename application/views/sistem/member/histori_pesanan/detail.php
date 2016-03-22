
			
			<!-- /breadcrumbs line -->
			<!-- Default table -->
			            <div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i> Histori Transaksi No. <?php echo $histori->NO_TRANSAKSI;?></h6></div>
			                <br>
			                <div align="center">
			                	<p>Tanggal Pemesanan : <?php echo hari(date("w", strtotime($histori->TGL_TRANSAKSI))).", ".date("d-m-Y", strtotime($histori->TGL_TRANSAKSI));?></p>
			                	<p>Tanggal Dikonsumsi : <?php echo hari(date("w", strtotime($histori->UNTUK_TRANSAKSI))).", ".date("d-m-Y", strtotime($histori->UNTUK_TRANSAKSI));?></p>
			                	<p>Status : 
			                	<?php 
			                	if ($histori->STATUS_TRANSAKSI==1) {
					               echo '<span class="label label-info">Belum</span>';
					            } elseif($histori->STATUS_TRANSAKSI==2) {
					               echo '<span class="label label-success">Sudah</span>';
					            } else {
					               echo '<span class="label label-danger">Void</span>';
					            }?></p>
			                </div>
			                <div class="table-responsive">
			                	
				                <table class="table">
				                    <thead>
				                        <tr>
				                            <th>#</th>
				                            <th>Nama Item</th>
				                            <th><div align="right">Harga</div></th>
				                            <th>Qty</th>
				                            <th>Kantin</th>
				                            <th><div align="right">Sub Total</div></th>
				                            <th><div align="center">Status</div></th>
				                            
				                        </tr>
				                    </thead>
				                    <tbody>
				                    <?php $i = 1; $gtot=0;?>
				                    <?php foreach ($historipesanan as $neg): ?>
				                        <tr>
				                            <td><?php echo $i;?></td>
				                            <td><?php echo $neg->NAMA_MENU; ?></td>
				                            <td><div align="right"><?php echo $neg->LABA_TRANSAKSI_DTL; ?></div></td>
				                            <td><?php echo $neg->QTY_TRANSAKSI_DTL; ?></td>
				                            <td><?php echo $neg->NAMA_KANTIN; ?></td>
				                            <?php $sub=$neg->QTY_TRANSAKSI_DTL*$neg->LABA_TRANSAKSI_DTL?>
				                            <td><div align="right"><?php echo number_format($sub);?></div></td>
				                            <td><div align="center">
				                            <?php 
            			                	if ($neg->STATUS_TRANSAKSI_DTL==0) {
            					               echo '<span class="label label-info">Belum</span>';
            					            } else {
            					               echo '<span class="label label-success">Sudah</span>';
            					            }?>
            					            </div>
            					            </td>
				                        </tr>
				                    <?php $i++; $gtot=$gtot+$sub;?>
				                    <?php endforeach;?>
				                    	<tr>
				                    		<td></td>
				                    		<td></td>
				                    		<td></td>
				                    		<td></td>
				                    		<td><div align="right"><strong>Grand Total</strong></div></td>
				                    		<td><div align="right"><strong><?php echo number_format($gtot);?></strong></div></td>
				                    		<td></td>
				                    	</tr>
				                    	
				                    	<tr>
				                    		<td>&nbsp;</td>
				                    		<td></td>
				                    		<td></td>
				                    		<td></td>
				                    		<td></td>
				                    		<td></td>
				                    		<td></td>
				                    	</tr>
				                    </tbody>
				                </table>
				                
			                </div>
			                <div class="form-actions text-center">
			                	<?php echo anchor('member/'.$this->uri->rsegment(1), 'Kembali','class="btn btn-block btn-danger"')?>
	                        		
                        		</div>
				        </div>
				        <!-- /default table -->
            <!-- /questions and contact -->