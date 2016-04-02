			<div class="row">
				<div class="col-md-3">
					<div class="block">
			    		<div class="panel panel-default">
		                <div class="panel-heading">
	                    	<h6 class="panel-title"><i class="icon-cart"></i> Keranjang</h6>
                    	</div>
                    	<div class="panel-body">
                    		<div align="center">
	                    		<?php echo "Total item dikeranjang : ".$this->cart->total_items();?><br>
	                    		<?php echo "Total harga belanja : Rp. ".number_format($this->cart->total());?><br><br>
	                    		<?php if ($this->cart->total_items()>0) {?>
	                    		<?php echo anchor('member/keranjang', '<i class="icon-checkmark3"></i> Pembayaran','class="btn btn-block btn-info"')?>
	                    		<?php echo anchor('member/'.$this->uri->rsegment(1).'/deletecart', '<i class="icon-remove"></i> Bersihkan Keranjang','class="btn btn-block btn-danger" onclick="return confirm(\'Yakin akan menghapus?\')"')?>
	                    		<?php }?>   
                    		</div>        		
                    	</div>
                    </div>
			    	</div>
            	</div>
            	<div class="col-md-9">
            		<div class="row">
            			<?php foreach ($item as $neg):?>
            			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
							<div class="block">
								<div class="thumbnail thumbnail-boxed">
									<div class="thumb">
										<img alt="" src="<?php echo base_url('uploads/images/'.$neg->GAMBAR_MENU);?>">
										
									</div>
									<div class="caption">
										<div align="center">
											<a href="javascript::void(0)" title="" class="caption-title"><?php echo $neg->NAMA_MENU;?></a>
											<strong>Rp.<?php echo $neg->LABA_HM;?></strong><br>(<?php echo $neg->NAMA_KANTIN;?>)<br>
											<a data-toggle="modal" role="button" href="#small_modal<?php echo $neg->ID_HM;?>" class="btn btn-block btn-info"><i class="icon-accessibility"></i>Kandungan</a>
																						
<?php echo anchor('member/'.$this->uri->rsegment(1).'/cart/'.$neg->ID_HM, '<i class="icon-cart-plus"></i> Beli','class="btn btn-block btn-success"')?>						 						<br>					
						<p><strong><u>Pengambilan</u></strong></p>
						<input type="radio" name="ukuran" value="S"/> Istirahat-1<br/> 
						
						<input type="radio" name="ukuran" value="M"/I> Istirahat-2<br/> 
						<input type="radio" name="ukuran" value="L"/> Istirahat-3</p>
				
										

									</div>									
									</div>
								</div>
							</div>
						</div>
						<?php endforeach;?>
						
					</div>
				</div>
            </div>

	
            <!-- /questions and contact -->
            <?php foreach ($item as $neg):?>
            <div id="small_modal<?php echo $neg->ID_HM;?>" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><i class="icon-accessibility"></i> Kandungan <?php echo $neg->NAMA_MENU;?></h4>

	
						</div>

						<div class="modal-body with-padding">
							<p><?php echo $neg->KANDUNGAN_MENU;?></p>
						</div>


						<div class="modal-footer">
							<button class="btn btn-warning" data-dismiss="modal">Close</button>

						</div>
					</div>
				</div>
			</div>
			<?php endforeach;?>