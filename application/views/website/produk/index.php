		<div id="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="span8">
&nbsp
                        <h1>Produk</h1>
                        <small>Berikut produk Kantin Sekolah Elektronik. </small>
                    </div>
                    <div class="span4">
                        <div class="pull-right">
                            <ul class="breadcrumb">
                                <li><a href="#">Home</a> <span class="divider">/</span></li>
                                <li class="active">Makanan Sehat</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>    	
        </div>
        
        <div class="container">
            <div class="row">
                <div id="portolfio-filter" class="span12">
                    <ul>
                        <li><a data-filter="*" href="javascript:void(0)" class="active">All</a></li>
                        <?php foreach ($kategori as $list):?>
                        <li><a data-filter=".<?php echo $list->NAMA_KATEGORI;?>" href="javascript:void(0)"><?php echo $list->NAMA_KATEGORI;?></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="clearfix"></div>
    
                <div id="content" class="light small">
                    <?php foreach ($produk as $list):?>
                    <div class="span3 <?php echo $list->NAMA_KATEGORI;?>">
                        <div class="portfolio-iteam shadow-wrapper">
                            <div class="gallery-small">                        	
                                <div class="gallery-outer">
                                    <div class="he-wrap">
                                        <a href="javascript:void(0)"><img alt="" src="<?php echo base_url('uploads/images/'.$list->GAMBAR_MENU);?>" class="max-image"></a>
                                        <div class="he-view">
                                            <div data-animate="fadeIn" class="bg a0">
                                                <div class="center-bar">
                                                    <a data-animate="elasticInDown" rel="prettyPhoto[portfolio]" class="a0" href="<?php echo site_url('uploads/images/'.$list->GAMBAR_MENU);?>"><i class="icon-search"></i></a>
                                                    <a data-animate="elasticInUp" class="a1" href="javascript:void(0)"><i class="icon-link"></i></a>
                                                </div>
                                            </div>
                                        </div>                                    
                                    </div>
                                </div>                                            
                            </div>
                            <div class="port-head">
                                <h3><?php echo $list->NAMA_MENU;?> <span><?php echo $list->NAMA_KATEGORI;?></span></h3>
                                <div class="port-like">
                                    <div class="pull-left"><i class="icon-tag"></i></div>
                                    <div class="pull-right"><a href="javascript:void(0)">Beli</a></div>
                                    <div class="clearfix"></div>
                            	</div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>  
                </div>
                
                
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="span12">&nbsp;</div>
            </div>
        </div>