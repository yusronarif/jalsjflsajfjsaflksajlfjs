<?php
class User extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $dashboard = 'admin/dashboard';
        $this->pegawai_m->loggedin_admin() == FALSE || redirect($dashboard);
        
        $rules = $this->pegawai_m->rules_login;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            // We can login and redirect
            if ($this->pegawai_m->login() == TRUE) {
                redirect($dashboard);
            } else {
                $this->session->set_flashdata('error', 'Username / Password Salah !!!');
                redirect('admin/user/login', 'refresh');
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
        $this->pegawai_m->logout();
        redirect('admin/user/login');
    }
}