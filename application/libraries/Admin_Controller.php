<?php
class Admin_Controller extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        
        // initialize models
        $this->load->model('pegawai_m');
        $this->load->model('main_menu_m');
        $this->load->model('pendidikan_m');
        
        // another initialize
        if (!empty($this->session->userdata['divisi'])) {
            
            $user_info = $this->pegawai_m->get($this->session->userdata['id']);
            $pendidikan_info = $this->pendidikan_m->get($user_info->ID_PENDIDIKAN);
            
            $this->data['nama_user'] = $user_info->NAMA_PEGAWAI;
            $this->data['gambar_user'] = $user_info->GAMBAR_PEGAWAI;
            $this->data['pendidikan_user'] = $pendidikan_info->NAMA_PENDIDIKAN;
            
            $this->data['mainmenu'] = $this->main_menu_m->get_by(array(
                "ID_DIVISI" => $this->session->userdata['divisi'],
                "PARENT_MM" => 0,
                "STATUS_MM" => 1
            ));
            
            $this->data['hak_akses'] = $this->main_menu_m->get_by(array(
                "ID_DIVISI" => $this->session->userdata['divisi'],
                "SEGMENT_MM" => $this->uri->rsegment(1)
            ));
            
            $pengecualian = array(
                'auth/logout',
                'auth/login',
                'admin/dashboard',
                'admin/profil',
                'admin/ganti_password',
                'admin'
            );
            
            if (in_array(uri_string(), $pengecualian) == FALSE) {
                if (count($this->data['hak_akses']) == 0) {
                    redirect('404');
                }
            }
        }
    }
}