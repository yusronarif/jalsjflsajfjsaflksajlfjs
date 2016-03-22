			<!-- Form bordered -->
			<?php echo form_open('','class="form-horizontal form-bordered block validate" role="form" enctype="multipart/form-data"');?>
	            <div class="panel panel-default">
	                <div class="panel-heading"><h6 class="panel-title"><i class="icon-menu"></i> <?php echo empty($item->ID_MENU) ? 'Tambah Data' : 'Ubah Data ' . $item->NAMA_MENU; ?></h6></div>
	                <div class="panel-body">
					<?php echo validation_errors(); ?>
				        <div class="form-group">
				            <label class="col-sm-2 control-label">Nama Menu</label>
				            <div class="col-sm-10">
				            	<input type="text" name="nama" class="form-control required" value="<?php echo !empty($item->ID_MENU) ? $item->NAMA_MENU : '';?>">
				            </div>
				        </div>
				        <div class="form-group">
							<label class="col-sm-2 control-label">Kategori Menu: </label>
								<div class="col-sm-10">
		                        	<select data-placeholder="Pilih Kategori..." class="select-full required" tabindex="2" name="kategori">
		                        	<option value=""></option>
		                        	<?php foreach ($kategori as $kat):?> 
		                        	<option value="<?php echo $kat->ID_KATEGORI?>" <?php if($kat->ID_KATEGORI==$item->ID_KATEGORI){echo 'selected';}?>><?php echo $kat->NAMA_KATEGORI?></option> 
		                        	<?php endforeach;?>
		                        	</select>
								</div>
						</div>
						
				        
				        <div class="form-group">
							<label class="col-sm-2 control-label">Keterangan Menu: </label>
							<div class="col-sm-10">
								<textarea rows="5" cols="5" class="elastic form-control" name="keterangan"><?php echo !empty($item->ID_MENU) ? $item->KET_MENU : '';?></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">Kandungan Menu: </label>
							<div class="col-sm-10">
								<textarea class="editor" placeholder="Enter text ..." name="kandungan"><?php echo !empty($item->ID_MENU) ? $item->KANDUNGAN_MENU : '';?></textarea>
							</div>
						</div>
						
				        <?php if (!empty($item->ID_MENU)){?>
				        <div class="form-group">
							<label class="col-sm-2 control-label">Gambar Lama </label>
							<div class="col-sm-10">
								<img alt="" src="<?php echo site_url('uploads/images/'.$item->GAMBAR_MENU)?>" height="200">
							</div>
						</div>
						<?php }?>
				        <div class="form-group">
							<label class="col-sm-2 control-label">Gambar Menu </label>
							<div class="col-sm-10">
								<input type="file" class="styled" name="gambar">
							</div>
						</div>

                        <div class="form-actions text-right">
                        	<input type="submit" value="Simpan" class="btn btn-primary">
                        	<input type="reset" value="Reset" class="btn btn-success">
                        	<?php echo anchor('admin/'.$this->uri->rsegment(1), 'Batal','class="btn btn-danger"')?>
                        </div>

				    </div>
				</div>
			<?php echo form_close();?>
			<!-- /form striped -->