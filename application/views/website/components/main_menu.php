<style>
    #navbar-icons.navbar a {color:#fff;}
</style>
<header>
    <div class="header-top">
        <div class="container">
            <div class="row">

                <div class="span6">
                    Email: kontak@kantinsekolah.com | Hotline: 081945157390
                </div>
                <div class="span6 text-right">
                    <?php
                    if($this->session->userdata('id')) {
                        ?>
                        <div class="navbar pull-right" id="navbar-icons" style="margin:0px;">
                            <ul class="nav navbar-right" style="margin:0px;">
                                <li>
                                    <a href="<?php echo site_url($this->session->userdata('logged_type'). '/dashboard');?>">
                                        <div>
                                            <img class="img-circle img-responsive" src="<?php echo base_url('uploads/images/' . $gambar_user); ?>" style="height:25px;">
                                            <?php echo $nama_user; ?>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('auth/logout/home');?>">
                                        <div>Logout <i class="icon-signout"></i></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <?php
                    } else {
                        ?>
                        <a href="javascript:void(0)" class="signup" data-toggle="modal">Daftar baru</a>
                        atau
                        <a class="btn btn-primary" href="<?php echo site_url('auth/login') ?>">Login</a>
                        <?php
                    }
                    ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="span3">
                <div class="logo">
                    <a href="<?php echo site_url() ?>"><img src="<?php echo base_url(); ?>assets/front/images/logo-web.svg" alt=""></a>
                </div>
            </div>
            <div class="span9">
                <!-- Main Navigation -->
                <nav>
                    <ul class="sf-menu" id="nav">
                        <?php $active = 'class="current"'; ?>
                        <li <?php echo $this->uri->segment(1) == '' ? $active : ''; ?><?php echo $this->uri->segment(1) == '' ? $active : ''; ?>>
                            <a href="<?php echo site_url() ?>">Beranda</a></li>
                        <li <?php echo $this->uri->segment(1) == 'produk' ? $active : ''; ?>>
                            <a href="<?php echo site_url('produk'); ?>">Produk</a></li>
                        <li <?php echo $this->uri->segment(1) == 'sistem-kse' ? $active : ''; ?><?php echo $this->uri->segment(1) == 'cara-bergabung' ? $active : ''; ?><?php echo $this->uri->segment(1) == 'cara-order-pjas' ? $active : ''; ?><?php echo $this->uri->segment(1) == 'cara-pengambilan-pjas' ? $active : ''; ?><?php echo $this->uri->segment(1) == 'cara-top-up' ? $active : ''; ?><?php echo $this->uri->segment(1) == 'sistem-dapur' ? $active : ''; ?><?php echo $this->uri->segment(1) == 'download' ? $active : ''; ?>>
                            <a href="javascript:void(0)">Informasi</a>
                            <ul>
                                <li><a href="<?php echo site_url('sistem-kse'); ?>">Sistem KSE</a></li>
                                <li><a href="<?php echo site_url('cara-bergabung'); ?>">Cara Bergabung</a></li>
                                <li><a href="<?php echo site_url('cara-order-pjas'); ?>">Panduan Cara Order PJAS</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('cara-pengambilan-pjas'); ?>">Panduan Cara Pengambilan PJAS</a>
                                </li>
                                <li><a href="<?php echo site_url('cara-top-up'); ?>">Panduan Cara Top Up/Deposit</a>
                                </li>
                                <li><a href="<?php echo site_url('sistem-dapur'); ?>">Panduan Sistem Dapur</a></li>
                                <li><a href="<?php echo site_url('download'); ?>">Download</a></li>
                                <li><a href="<?php echo site_url('f-a-q'); ?>">F.A.Q/Tanya Jawab</a></li>
                                <li><a href="<?php echo site_url('berita'); ?>">Berita</a></li>
                            </ul>
                        </li>
                        <li <?php echo $this->uri->segment(1) == 'kerjasama' ? $active : ''; ?>>
                            <a href="<?php echo site_url('kerjasama') ?>">Mitra</a></li>
                        <li <?php echo $this->uri->segment(1) == 'iklan' ? $active : ''; ?>>
                            <a href="<?php echo site_url('iklan') ?>">Iklan Anda</a></li>
                        <li <?php echo $this->uri->segment(1) == 'kontak' ? $active : ''; ?>>
                            <a href="<?php echo site_url('kontak') ?>">Kontak</a></li>
                        <div class="clearfix"></div>
                    </ul>
                </nav>
                <!-- END Main Navigation -->
            </div>
        </div>
    </div>
</header>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modalSignup">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" onclick="$('#modalSignup').modal('hide')">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                Silahkan menghubungi pihak Koperasi di Sekolah masing-masing
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="$('#modalSignup').modal('hide')">OK</button>
            </div>
        </div>
    </div>
</div>
