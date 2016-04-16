<?php

class MY_Controller extends CI_Controller
{

    public $user;
    public $data;

    function __construct()
    {
        parent::__construct();

        if (in_array($this->uri->segment(1), array('admin', 'member', 'auth'))) {
            // Auth check
            $exception_uris = array(
                'auth/login',
                'auth/logout',
            );
            if (! in_array(uri_string(), $exception_uris)) {
                if ($this->session->userdata('id') == false) {
                    redirect('auth/login');
                }

                if ($this->uri->segment(1) != $this->session->userdata('logged_type')) {
                    redirect($this->session->userdata('logged_type'). '/dashboard');
                }
            }
        }

        $this->data['site_name'] = config_item('site_name');
        $this->data['site_namex'] = config_item('site_namex');

        // gathering user information
        if (!empty($this->session->userdata['id'])) {
            $this->load->model('pendidikan_m');
            if($this->session->userdata['logged_type']=='member'){
                $this->load->model('member_m');
                $this->user = $this->member_m->get($this->session->userdata['id']);
                $pendidikan_info = $this->pendidikan_m->get($this->user->ID_PENDIDIKAN);

                $this->data['nama_user'] = $this->user->NAMA_MEMBER;
                $this->data['gambar_user'] = $this->user->GAMBAR_MEMBER;
                $this->data['saldo_user'] = $this->user->SALDO_MEMBER;
                $this->data['pendidikan_user'] = $pendidikan_info->NAMA_PENDIDIKAN;
            } elseif($this->session->userdata['logged_type']=='admin') {
                $this->load->model('pegawai_m');
                $this->user = $this->pegawai_m->get($this->session->userdata['id']);
                $pendidikan_info = $this->pendidikan_m->get($this->user->ID_PENDIDIKAN);

                $this->data['nama_user'] = $this->user->NAMA_PEGAWAI;
                $this->data['gambar_user'] = $this->user->GAMBAR_PEGAWAI;
                $this->data['pendidikan_user'] = $pendidikan_info->NAMA_PENDIDIKAN;
            }

        }
    }

}
