			<!-- Form bordered -->
			<?php echo form_open('','class="form-horizontal form-bordered block validate" role="form" enctype="multipart/form-data"');?>
	            <div class="panel panel-default">
	                <div class="panel-heading"><h6 class="panel-title"><i class="icon-menu"></i> <?php echo empty($pendidikan->ID_PENDIDIKAN) ? 'Tambah Data' : 'Ubah Data ' . $pendidikan->NAMA_PENDIDIKAN; ?></h6></div>
	                <div class="panel-body">
					<?php echo validation_errors(); ?>
				        <div class="form-group">
							<label class="col-sm-2 control-label">Menu: </label>
								<div class="col-sm-10">
		                        	<select data-placeholder="Pilih Menu..." class="select-full required" tabindex="2" name="menu">
		                        	<option value=""></option>
		                        	<?php foreach ($menu as $vmenu):?> 
		                        	<option value="<?php echo $vmenu->ID_MENU?>"><?php echo $vmenu->NAMA_MENU?></option> 
		                        	<?php endforeach;?>
		                        	</select>
								</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Dapur: </label>
								<div class="col-sm-10">
		                        	<select data-placeholder="Pilih Dapur..." class="select-full required" tabindex="2" name="dapur">
		                        	<option value=""></option>
		                        	<?php foreach ($dapur as $vdapur):?> 
		                        	<option value="<?php echo $vdapur->ID_DAPUR?>"><?php echo $vdapur->NAMA_DAPUR?></option> 
		                        	<?php endforeach;?>
		                        	</select>
								</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Kantin: </label>
								<div class="col-sm-10">
		                        	<select data-placeholder="Pilih Kantin..." class="select-full required" tabindex="2" name="kantin">
		                        	<option value=""></option>
		                        	<?php foreach ($kantin as $vkantin):?> 
		                        	<option value="<?php echo $vkantin->ID_KANTIN?>"><?php echo $vkantin->NAMA_KANTIN?></option> 
		                        	<?php endforeach;?>
		                        	</select>
								</div>
						</div>
						<div class="form-group">
				            <label class="col-sm-2 control-label">Harga Asli</label>
				            <div class="col-sm-10">
				            	<input type="text" name="harga" class="form-control required">
				            </div>
				        </div>
				        <div class="form-group">
				            <label class="col-sm-2 control-label">Harga Jual</label>
				            <div class="col-sm-10">
				            	<input type="text" name="laba" class="form-control required">
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
			
				<div class="panel panel-default">
	                <div class="panel-heading"><h6 class="panel-title"><i class="icon-coin"></i> Hak Menu</h6></div>
	                <div class="datatable">
				                <table class="table table-bordered">
				                    <thead>
				                        <tr>
				                        
				                            <th>No.</th>
				                            <th>Menu</th>
				                            <th>Dapur</th>
				                            <th>Kantin</th>
				                            <th>Harga Asli</th>
				                            <th>Harga Jual</th>
				                            <th>Aksi</th>
				                        
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	<?php $no=1; 
				                        foreach ($hak_menu_list as $neg):?>
				                        <tr>
				                        
				                            <td><?php echo $no;?></td>
				                            <td><?php echo $neg->NAMA_MENU?></td>
				                            <td><?php echo $neg->NAMA_DAPUR?></td>
				                            <td><?php echo $neg->NAMA_KANTIN?></td>
				                            <td><?php echo $neg->HARGA_HM?></td>
				                            <td><?php echo $neg->LABA_HM?></td>
				                            <td>
				                            <div align="center">
				                            	<?php echo anchor('admin/'.$this->uri->rsegment(1).'/delete/'.$neg->ID_HM.'_'.$this->uri->rsegment(3),'<i class="icon-remove3"></i>','class="btn btn-danger btn-icon btn-xs" onclick="return confirm(\'Yakin Akan Menghapus Data?\')"')?>
				                            </div>
				                            </td>
			                            
				                        </tr>
				                        <?php $no++; 
			                            endforeach;?>
				                    </tbody>
				                </table>
			                </div>
				</div>