<?php

class MY_Controller extends CI_Controller
{

    public $data = array();

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

        $this->data ['errors'] = array();
        $this->data['site_name'] = config_item('site_name');
        $this->data['site_namex'] = config_item('site_namex');
    }

}