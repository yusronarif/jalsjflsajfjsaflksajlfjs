			<?php echo form_open('','class="form-horizontal form-bordered block" role="form" ');?>
	            <div class="panel panel-default">
	                <div class="panel-heading"><h6 class="panel-title"><i class="icon-menu"></i> <?php echo empty($kategori->ID_KATEGORI) ? 'Tambah Data' : 'Ubah Data ' . $kategori->NAMA_KATEGORI; ?></h6></div>
	                <div class="panel-body">
					<?php echo validation_errors(); ?>
				        <div class="form-group">
				            <label class="col-sm-2 control-label">Nama Kategori</label>
				            <div class="col-sm-10">
				            	<input type="text" name="nama" class="form-control required" value="<?php echo !empty($kategori->ID_KATEGORI) ? $kategori->NAMA_KATEGORI : '';?>">
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