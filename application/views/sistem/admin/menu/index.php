			<!-- /breadcrumbs line -->
			<div class="row">
            	<div class="col-md-12">
					<!-- Contacts -->
			    	<div class="block">
			    		
				    	<div class="panel panel-default">
				    	
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-file"></i> Data <?php judul($this->uri->rsegment(1));?></h6></div>
			                <div class="datatable">
				                <table class="table table-bordered">
				                    <thead>
				                        <tr>
				                        
				                            <th>No.</th>
				                            <th>Nama</th>
				                            <th>Kategori</th>
				                            <th>Gambar</th>
				                            <th>Keterangan</th>
				                            <th>Aksi</th>
				                        
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	<?php $no=1; 
				                        foreach ($item as $neg):?>
				                        <tr>
				                        
				                            <td><?php echo $no;?></td>
				                            <td><?php echo $neg->NAMA_MENU?></td>
				                            <td><?php echo $neg->NAMA_KATEGORI?></td>
				                            <td><div align="center"><img alt="" src="<?php echo base_url('uploads/images/'.$neg->GAMBAR_MENU)?>" height="60"></div></td>
				                            <td><?php echo $neg->KET_MENU?></td>
				                            <td>
				                            <div align="center">
				                            	<?php echo anchor('admin/'.$this->uri->rsegment(1).'/edit/'.$neg->ID_MENU,'<i class="icon-pencil4"></i>','class="btn btn-success btn-icon"')?>
				                            	<?php echo anchor('admin/'.$this->uri->rsegment(1).'/delete/'.$neg->ID_MENU,'<i class="icon-remove3"></i>','class="btn btn-danger btn-icon" onclick="return confirm(\'Yakin Akan Menghapus Data?\')"')?>
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