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

        $this->load->view('sistem/_layout_login', $this->data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}