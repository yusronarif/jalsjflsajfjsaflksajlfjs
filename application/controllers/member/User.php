<?php
class User extends Member_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $dashboard = 'member/dashboard';
        $this->member_m->loggedin_member() == FALSE || redirect($dashboard);
        
        $rules = $this->member_m->rules_login;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            // We can login and redirect
            if ($this->member_m->login() == TRUE) {
                redirect($dashboard);
            } else {
                $this->session->set_flashdata('error', 'Username / Password Salah !!!');
                redirect('member/user/login', 'refresh');
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
        $this->member_m->logout();
        redirect('member/user/login');
    }
}