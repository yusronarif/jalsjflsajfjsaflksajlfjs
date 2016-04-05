<?php
class Member_Controller extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        // initialize models
        $this->load->model('main_menu_m');

        //menentukan jam closing
        $this->data ['buka']  = '170000';   //mulai closing
        $this->data ['tutup'] = '180000';   //akhir closing
        $this->data ['pukulbuka'] = substr($this->data ['tutup'], 0,2).":".substr($this->data ['tutup'], 2,2);

        // another initialize
        if (!empty($this->session->userdata['divisi'])) {
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
                'member/dashboard',
                'member/profil',
                'member/ganti_password',
                'member'
            );
            
            if (in_array(uri_string(), $pengecualian) == FALSE) {
                if (count($this->data['hak_akses']) == 0) {
                    redirect('404');
                }
            }
        }
    }
}