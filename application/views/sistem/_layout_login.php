<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
        <meta name="description" content="<?php echo $site_name;?>" />
		<meta name="author" content="GoodSyst" />
        <title><?php echo $site_namex;?></title>
        
        <link href="<?php echo base_url('assets/back/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets/back/css/londinium-theme.css');?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets/back/css/styles.css');?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets/back/css/icons.css');?>" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <!-- Favicons -->
    	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/front/images/favicon.ico" />
    	<link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/front/images/apple-touch-icon.png" />
    	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/front/images/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/front/images/apple-touch-icon-72x72.png" />
    	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/front/images/apple-touch-icon-114x114.png" />
        
        
    </head>

    <body class="full-width page-condensed">
    	<div class="se-pre-con"></div>
    	<!-- Navbar -->
    	<div class="navbar navbar-inverse" role="navigation">
    		<div class="navbar-header">
    			<a class="navbar-brand" href="<?php echo site_url($this->uri->segment(1));?>"><img src="<?php echo base_url('assets/back/img/logo.svg')?>" alt="<?php echo $site_name;?>"></a>
    		</div>
    	</div>
    	<!-- /navbar -->
    
    	<!-- Login wrapper -->
    	<div class="login-wrapper">
    		<!-- Alert -->
    
    		<?php if ($this->session->flashdata('error')){ ?>
            	<div class="alert alert-info fade in block">
                	<button type="button" class="close" data-dismiss="alert">&times;</button>
                	<i class="icon-info"></i><strong> Error!</strong><br><br>
                	<?php echo $this->session->flashdata('error');?>
            	</div>
        	<?php }?>
        				
        	<?php if (validation_errors()){ ?>
            	<div class="alert alert-info fade in block">
                	<button type="button" class="close" data-dismiss="alert">&times;</button>
                	<i class="icon-info"></i><strong> Error!</strong><br><br>
                	<?php echo validation_errors(); ?>
            	</div>
        	<?php }?>
        	
    		<?php echo form_open('','role="form"');?>
    
    			<div class="popup-header">
    				<a href="javascript::(0)" class="pull-left"><i class="icon-user"></i></a>
    				<span class="text-semibold">Login Form</span>
    				<div class="btn-group pull-right">
    					<a href="javascript::(0)" class="dropdown-toggle"
    						data-toggle="dropdown"><i class="icon-cogs"></i></a>
    				</div>
    			</div>
    			<div class="well">
    				<div class="form-group has-feedback">
    					<label>Username</label> <input type="text" class="form-control" placeholder="Username" name="username" autofocus="autofocus" autocomplete="off">
    					<i class="icon-users form-control-feedback"></i>
    				</div>
    
    				<div class="form-group has-feedback">
    					<label>Password</label> <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off"> 
    					<i class="icon-lock form-control-feedback"></i>
    				</div>
    
    				<div class="row form-actions">
    					<div class="col-xs-6"></div>
    
    					<div class="col-xs-6">
    						<button type="submit" class="btn btn-warning pull-right">
    							<i class="icon-menu2"></i> Login
    						</button>
    					</div>
    				</div>
    			</div>
					<strong><u>Note</u></strong> : 
					<br>
					Untuk mendapatkan user id dan password sila menghubungi sekolah masing-masing.
					</br>
    		<?php echo form_close();?>
    	</div>
    	<!-- /login wrapper -->
    
    	<!-- Footer -->
    	<div class="footer clearfix">
    		<div class="center">
    			&copy; <?php echo date("Y");?>. <a href="<?php echo site_url();?>" target="_blank"><?php echo $site_name;?></a> support by <a href="https://goodsyst.com" target="_blank">GoodSyst</a>
    		</div>
    	</div>
    	<!-- /footer -->
    	<script type="text/javascript" src="<?php echo base_url('assets/back/js/jquery.min.js');?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/back/js/jquery-ui.min.js');?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/back/js/bootstrap.min.js');?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/back/js/application.js');?>"></script>
    	
    </body>
</html>