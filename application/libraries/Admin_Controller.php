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
            $mainmenu = $this->main_menu_m->get_by(array(
                "ID_DIVISI" => $this->session->userdata['divisi'],
                "STATUS_MM" => 1
            ), FALSE, TRUE);

            if(count($mainmenu)>0) {
                foreach ($mainmenu as $mn) {
                    if($mn['PARENT_MM']==0) {
                        $this->data['mainmenu'][$mn['ID_MM']] = $mn;
                    }
                    else {
                        $this->data['mainmenu'][$mn['PARENT_MM']]['SUBS'][$mn['ID_MM']] = $mn;
                    }
                }
            }

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
