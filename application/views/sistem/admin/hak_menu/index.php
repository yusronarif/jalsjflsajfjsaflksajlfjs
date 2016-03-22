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
				                            <th>Nama Pendidikan</th>
				                            <th><div align="center">Aksi</div></th>
				                        
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	<?php $no=1; 
				                        foreach ($item as $neg):?>
				                        <tr>
				                        
				                            <td><?php echo $no;?></td>
				                            <td><?php echo $neg->NAMA_PENDIDIKAN?></td>
				                            <td>
				                            <div align="center">
				                            	<?php echo anchor('admin/'.$this->uri->rsegment(1).'/edit/'.$neg->ID_PENDIDIKAN,'<i class="icon-pencil4"></i>&nbsp;&nbsp;Detail','class="btn btn-success btn-xs btn-icon"')?>
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