<?php
$log_type = $this->session->userdata['logged_type'];
$cur_menu = explode('/', uri_string(), 2);
$cur_menu = isset($cur_menu[1]) ? $cur_menu[1] : 'dashboard';
$page_title = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    <meta name="description" content="<?php echo $site_name; ?>"/>
    <meta name="author" content="GoodSyst"/>
    <title><?php echo $site_namex; ?></title>

    <!--[if IE]>
    <script src="<?php echo base_url('assets/plugins/better-dom/dist/better-dom-legacy.min.js'); ?>"></script>
    <![endif]-->
    <link href="<?php echo base_url('assets/back/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/back/css/londinium-theme.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/back/css/icons.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/back/css/styles.css'); ?>" rel="stylesheet" type="text/css">

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/front/images/favicon.ico'); ?>"/>
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/front/images/apple-touch-icon.png'); ?>"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/front/images/apple-touch-icon-57x57.png'); ?>"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/front/images/apple-touch-icon-72x72.png'); ?>"/>
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/front/images/apple-touch-icon-114x114.png'); ?>"/>

</head>

<body class="boxed navbar-fixed">
<?php
if($_SERVER['CI_ENV']!='development')
{
    ?><script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-72217594-1', 'auto');
    ga('send', 'pageview');
</script><?php
}
?>
<!-- Navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo site_url($log_type); ?>"><img src="<?php echo base_url('assets/back/img/logo.svg'); ?>" alt="<?php echo $site_name; ?>"></a>
            <a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
                <span class="sr-only">Toggle navbar</span>
                <i class="icon-grid3"></i>
            </button>
            <button type="button" class="navbar-toggle offcanvas">
                <span class="sr-only">Toggle navigation</span>
                <i class="icon-paragraph-justify2"></i>
            </button>
        </div>

        <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
            <li class="user dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url('uploads/images/' . $gambar_user); ?>">
                    <span><?php echo $nama_user; ?></span>
                    <i class="caret"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right icons-right">
                    <li><a href="<?php echo site_url($log_type . '/profil') ?>"><i class="icon-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('auth/password') ?>"><i class="icon-cog"></i> Ganti Password</a>
                    </li>
                    <li><?php echo anchor('auth/logout', '<i class="icon-exit"></i> Logout') ?></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /navbar -->

<!-- Page container -->
<div class="page-container container">

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-content">

            <!-- User dropdown -->
            <div class="user-menu dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url('uploads/images/' . $gambar_user); ?>">
                    <div class="user-info">
                        <?php echo $nama_user; ?><br>
                        <?php echo $pendidikan_user; ?>
                    </div>
                </a>
                <div class="popup dropdown-menu dropdown-menu-right">
                    <div class="thumbnail">
                        <div class="thumb">
                            <img src="<?php echo base_url('uploads/images/' . $gambar_user); ?>">
                            <div class="thumb-options">
                                <span>
                                    <a href="<?php echo site_url($log_type . '/profil') ?>" class="btn btn-icon btn-success"><i class="icon-pencil"></i></a>
                                </span>
                            </div>
                        </div>

                        <div class="caption text-center">
                            <h6><?php echo $nama_user; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /user dropdown -->

            <?php
            if ($this->cart->total_items() > 0 AND $this->uri->rsegment(1)!='keranjang') {
            ?><!-- User cart -->
            <ul class="hidden-print visible-md visible-lg navigation bg-primary">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-cart"></i> Keranjang</h6>
                </div>
                <li class="active">
                    <div align="center">
                        <?php echo "Total item dikeranjang : " . $this->cart->total_items(); ?><br>
                        <?php echo "Total harga belanja : Rp. " . curr_format($this->cart->total()); ?><br><br>

                        <?php echo anchor($log_type. '/keranjang', '<i class="icon-checkmark3"></i> Pembayaran', 'class="btn btn-info"') ?>
                        <?php echo anchor($log_type. '/' . $this->uri->rsegment(1) . '/deletecart', '<i class="icon-remove"></i> Bersihkan Keranjang', 'class="btn btn-danger" onclick="return confirm(\'Yakin akan menghapus?\')"') ?>
                    </div>
                </li>
            </ul>
            <!-- end user cart --><?php
            }?>

            <!-- Main navigation -->
            <ul class="navigation">
                <li <?php if ($cur_menu == 'dashboard') echo 'class="active"'; ?>>
                    <?php echo anchor($log_type . '/dashboard', '<span>Dashboard</span> <i class="icon-screen2"></i>') ?>
                </li>
                <?php
                foreach ($mainmenu as $mn) {
                    ?>
                    <li <?php if ($this->uri->rsegment(1) == $mn['SEGMENT_MM']) echo 'class="active"';?>>
                        <a href="<?php echo ($mn['LINK_MM']==null || $mn['LINK_MM']=='' ? site_url($log_type . '/' . $mn['LINK_MM']) : 'javascript:void(0);'); ?>"><span><?php echo $mn['NAMA_MM']; ?></span>
                            <i class="<?php echo $mn['ICON_MM']; ?>"></i>
                        </a>
                        <?php
                        if($mn['SUBS'] != null){
                            echo '<ul>';
                            foreach ($mn['SUBS'] as $mn_sub){
                                ?>
                                <li <?php if ($cur_menu == $mn_sub['SEGMENT_MM']) echo 'class="active"';?>><?php echo anchor($log_type . '/' . $mn_sub['LINK_MM'], $mn_sub['NAMA_MM']) ?></li>
                                <?php
                            }
                            echo '</ul>';
                        }
                        ?>
                    </li>
                    <?php

                    /*if ($mn['LINK_MM'] == null && $mn['SEGMENT_MM'] == null) {
                        ?>
                        <li>
                            <a href="javascript:void(0)"><span><?php echo $mn['NAMA_MM']; ?></span>
                                <i class="<?php echo $mn['ICON_MM']; ?>"></i>
                            </a>
                            <ul>
                                <?php
                                $mainsub = $this->db->query("SELECT * FROM main_menu WHERE PARENT_MM='$mn['ID_MM']' AND ID_DIVISI='" . $this->session->userdata['divisi'] . "' AND STATUS_MM=1")->result();

                                foreach ($mainsub as $mn_sub) {
                                    ?>
                                    <li <?php if ($this->uri->rsegment(1) == $mn_sub->SEGMENT_MM) {
                                        echo 'class="active"';
                                    } ?>><?php echo anchor($log_type . '/' . $mn_sub->LINK_MM, $mn_sub->NAMA_MM) ?></li>
                                <?php
                                } ?>
                            </ul>
                        </li>
                    <?php
                    } else {
                        ?>
                        <li <?php if ($this->uri->rsegment(1) == $mn['SEGMENT_MM']) {
                            echo 'class="active"';
                        } ?>><?php echo anchor($log_type . '/' . $mn['LINK_MM'], '<span>' . $mn['NAMA_MM'] . '</span> <i class="' . $mn['ICON_MM'] . '"></i>') ?></li>
                    <?php
                    }*/
                } ?>
            </ul>
            <!-- /main navigation -->

        </div>
    </div>
    <!-- /sidebar -->

    <!-- Page content -->
    <div class="page-content">

        <!-- Page header -->
        <div class="page-header">
            <div class="page-title">
                <h3><?php echo $page_title; ?></h3>
            </div>
        </div>
        <!-- /page header -->
        <div class="breadcrumb-line">
            <ul class="breadcrumb"><?php
                if($this->uri->rsegment(1)!='dashboard'){
                    $d_actv = '';
                    $d_href = site_url($log_type . '/dashboard');
                } else {
                    $d_actv = 'class="active"';
                    $d_href = 'javascript:void(0);';
                }

                echo '<li '. $d_actv. '><a href="'. $d_href. '">Dashboard</a></li>';
                foreach ($this->uri->segment_array() as $ur_id => $ur_val)
                {
                    if($ur_id>1){
                        echo '<li class="active">'. judul($ur_val). '</li>';
                    }
                }
            ?></ul>
            <?php /*if ($this->uri->rsegment(1) != 'dashboard' && $this->uri->rsegment(1) != 'password' && $this->uri->rsegment(1) != 'profil' && $this->main_menu_m->get_by(array('SEGMENT_MM' => $this->uri->rsegment(1)), true)->TIPE_MM == 0) { ?>
                <div class="visible-xs breadcrumb-toggle">
                    <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
                </div>

                <ul class="breadcrumb-buttons collapse">

                    <li class="language dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i>
                            <span>Aksi</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu dropdown-menu-right icons-right">
                            <li <?php if ($this->uri->rsegment(2) == 'edit') {
                                echo 'class="active"';
                            } ?>><?php echo anchor($log_type. '/' . $this->uri->rsegment(1) . '/edit', '<i class="icon-plus"></i> Tambah') ?></li>
                        </ul>
                    </li>
                </ul>
            <?php }*/ ?>
        </div>
        <!-- Form bordered -->
