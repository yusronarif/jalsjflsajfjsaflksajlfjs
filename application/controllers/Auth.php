<?php

class Auth extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_m');
    }

    public function index()
    {
        redirect('auth/login');
    }

    public function login()
    {
        if ($this->session->userdata('logged_type')) {
            redirect($this->session->userdata('logged_type'). '/dashboard');
        }

        $rules = $this->auth_m->rules_login;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == true) {
            // We can login and redirect
            if ($this->auth_m->attempt() == true) {
                redirect($this->session->userdata('loggedin_admin') == true ? 'admin/dashboard' : 'member/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Username / Password Salah !!!');
                redirect('auth/login', 'refresh');
            }
        }

        $tmp = $this->session->userdata;
        if (! empty($tmp['flash:old:error'])) {
            $this->data['error'] = $tmp['flash:old:error'];
        } else {
            $this->data['error'] = 'Masukkan Username dan Password !!!';
        }

        $this->load->view('sistem/auth/login', $this->data);
    }

    public function logout($redir=null)
    {
        $this->session->sess_destroy();
        redirect($redir?$redir:'auth/login');
    }

    public function password()
    {
        $this->init();

        /*$data = array (
            'PASSWORD_PEGAWAI' => $this->hash( $this->input->post( 'new_pass' ) )
        );*/

        // Set up the form
        //$rules = $this->pegawai_m->rules_ganti_password;
        //$this->form_validation->set_rules( $rules );

        // Process the form
        //if ($this->form_validation->run() == TRUE) {
            //$this->pegawai_m->save( $data, $id );
            //redirect ( 'admin/ganti_password?status=ok' );
        //}

        $this->data['subview'] = 'sistem/auth/password';
        $this->data['javascript'] = 'sistem/auth/password';
        $this->load->view('sistem/_layout_main', $this->data);
    }

    private function init()
    {
        // initialize models
        $this->load->model('pegawai_m');
        $this->load->model('main_menu_m');
        $this->load->model('pendidikan_m');

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
                'auth/password',
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
