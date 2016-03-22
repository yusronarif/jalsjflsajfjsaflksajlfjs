<?php

class Dashboard extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['subview'] = 'sistem/admin/dashboard/index';
        $this->data['javascript'] = 'sistem/admin/dashboard/js';
        $this->load->view('sistem/_layout_main', $this->data);
    }
}