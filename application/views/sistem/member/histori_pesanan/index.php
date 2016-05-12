
			<!-- /breadcrumbs line -->
			<div class="row">
            	<div class="col-md-12">
					<!-- Contacts -->
			    	<div class="block">

				    	<div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-file"></i> Data Histori Pesanan</h6></div>
			                <div class="datatable">
				                <table class="table table-bordered">
				                    <thead>
				                        <tr>
				                            <th>No.</th>
				                            <th>No Transaksi</th>
				                            <th>Tanggal Pesan</th>
				                            <?php /*<th>Dikonsumsi</th>*/?>
				                            <th>Status</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	<?php $no=1;
				                        foreach ($historipesanan as $neg):?>
				                        <tr>
				                            <td><?php echo $no;?></td>
				                            <td><?php echo anchor('member/histori_pesanan/detail/'.$neg->NO_TRANSAKSI,$neg->NO_TRANSAKSI);?></td>
				                            <td><?php echo hari(date("w", strtotime($neg->TGL_TRANSAKSI))).", ".date("d-m-Y", strtotime($neg->TGL_TRANSAKSI));?></td>
				                            <?php /*<td><?php echo hari(date("w", strtotime($neg->UNTUK_TRANSAKSI))).", ".date("d-m-Y", strtotime($neg->UNTUK_TRANSAKSI));?></td>*/?>
				                            <td>
				                            	<div align="center">
					                            	<?php if ($neg->STATUS_TRANSAKSI==1) {
					                            		echo '<span class="label label-info">Belum</span>';
					                            	} elseif($neg->STATUS_TRANSAKSI==2) {
					                            		echo '<span class="label label-success">Sudah</span>';
					                            	} else {
					                            	    echo '<span class="label label-danger">Void</span>';
					                            	}?>
				                            	</div>
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
