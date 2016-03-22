
			<?php if (!empty($_GET['status'])) {
				if ($_GET['status']=='berhasil') { ?>
					<div class="alert alert-success fade in block-inner">
		                <button type="button" class="close" data-dismiss="alert">x</button>
		                <i class="icon-checkmark-circle"></i> Transaksi berhasil, klik <a href="<?php echo site_url('member/histori_pesanan')?>">disini</a> untuk melihat histori transaksi.
		    		</div>
				<?php	
				} elseif ($_GET['status']=='gagal') {?>
					<div class="alert alert-danger fade in block-inner">
		                <button type="button" class="close" data-dismiss="alert">x</button>
		                <i class="icon-cancel-circle"></i> Saldo anda tidak mencukupi untuk melakukan transaksi ini.
		    		</div>
			<?php }}?>
			
			<?php
			$now = date ( 'Y-m-d H:i:s' );
			$untuk = date ( 'Y-m-d', strtotime ( $now . "+1 days" ) );
			$untukk = date ( 'Y-m-d', strtotime ( $now . "+2 days" ) );
			if (intval(date("His"))>=intval($buka) && intval(date("His"))<=intval($tutup)) { ?>
			
				<div class="alert alert-info fade in block-inner">
		        	
		        	<i class="icon-cancel-circle"></i> Untuk sementara transaksi anda tidak bisa dilakukan hingga pukul <?php echo $pukulbuka;?> WIB.
		    	</div>
			<?php } elseif (intval(date("His"))<intval($buka)){?>
				<div class="alert alert-info fade in block-inner">
		        	
		        	<i class="icon-info"></i> Pesanan anda saat ini akan disajikan pada hari <?php echo hari(date("w", strtotime($untuk))).", ".date("d-m-Y", strtotime($untuk));?>.
		    	</div>
			<?php } elseif (intval(date("His"))>intval($tutup)){?>
				<div class="alert alert-info fade in block-inner">
		        	
		        	<i class="icon-info"></i> Pesanan anda saat ini akan disajikan pada hari <?php echo hari(date("w", strtotime($untukk))).", ".date("d-m-Y", strtotime($untukk));?>.
		    	</div>
			<?php }?>
			            <div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i> Data Keranjang</h6></div>
			                <div class="table-responsive">
			                <?php echo form_open('member/keranjang/validate_update_cart'); ?>
				                <table class="table">
				                    <thead>
				                        <tr>
				                            <th>#</th>
				                            <th>Nama Item</th>
				                            <th><div align="right">Harga</div></th>
				                            <th>Qty</th>
				                            <th><div align="right">Sub Total</div></th>
				                            <th></th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    <?php $i = 1; ?>
				                    <?php foreach ($this->cart->contents() as $items): ?>
				                        <tr>
				                            <td><?php echo $i;?></td>
				                            <td><?php echo $items['name']; ?><?php echo form_hidden('rowid[]', $items['rowid']); ?></td>
				                            <td><div align="right"><?php echo number_format($items['price']); ?></div></td>
				                            <td><?php echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5','class'=>'form-control')); ?></td>
				                            <td><div align="right"><?php echo number_format($items['subtotal']);?></div></td>
				                            <td>
				                            	<a href="<?php echo site_url('member/keranjang/validate_delete_cart/'.$items['rowid'])?>" class="btn btn-danger btn-icon btn-xs tip" title="Hapus" onclick="return confirm('Yakin akan menghapus?')"><i class="icon-remove"></i></a>
				                            </td>
				                        </tr>
				                    <?php $i++; ?>
				                    <?php endforeach;?>
				                    	<tr>
				                    		<td></td>
				                    		<td></td>
				                    		<td></td>
				                    		<td><div align="right"><strong>Grand Total</strong></div></td>
				                    		<td><div align="right"><strong><?php echo number_format($this->cart->total());?></strong></div></td>
				                    		<td></td>
				                    	</tr>
				                    	<tr>
				                    		<td></td>
				                    		<td></td>
				                    		<td></td>
				                    		<td><div align="right"><strong>Saldo Anda</strong></div></td>
				                    		<td><div align="right">
				                    			
							    				<strong><?php echo number_format($saldo_user);?></strong>
							    				
				                    		</div></td>
				                    		<td></td>
				                    	</tr>
				                    	<tr>
				                    		<td></td>
				                    		<td></td>
				                    		<td></td>
				                    		<td><div align="right"><strong>Sisa Saldo</strong></div></td>
				                    		<td><div align="right">
				                    			<strong><?php echo number_format($saldo_user-$this->cart->total());?></strong>
				                    		</div></td>
				                    		<td></td>
				                    	</tr>
				                    	<tr>
				                    		<td>&nbsp;</td>
				                    		<td></td>
				                    		<td></td>
				                    		<td></td>
				                    		<td></td>
				                    		<td></td>
				                    	</tr>
				                    </tbody>
				                </table>
				                <?php if ($this->cart->total_items()>0) {?>
				                <div class="panel-body">
				                	<div class="form-actions text-center">
					                
	                        			<input type="submit" name="update" value="Update Cart" class="btn btn-block btn-info">
			                        	<?php if (!(intval(date("His"))>=intval($buka) && intval(date("His"))<=intval($tutup))) { ?>
			                        	<?php echo anchor('member/'.$this->uri->rsegment(1).'/selesai', 'Bayar Sekarang','class="btn btn-block btn-primary"  onclick="return confirm(\'Apakah anda yakin?\')"')?>
			                        	<?php }?>
			                        	<?php echo anchor('member/'.$this->uri->rsegment(1).'/deletecart', 'Bersihkan Keranjang','class="btn btn-block btn-danger"  onclick="return confirm(\'Apakah anda yakin?\')"')?>
                        			</div>
                        		</div>
                        		
                        		<?php }?>
				                <?php form_close();?>
			                </div>
				        </div>
				        <!-- /default table -->
            <!-- /questions and contact -->