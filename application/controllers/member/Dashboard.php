<?php

class Dashboard extends Member_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['subview'] = 'sistem/member/dashboard/index';
        $this->data['javascript'] = 'sistem/member/dashboard/js';
        $this->load->view('sistem/_layout_main', $this->data);
    }
}