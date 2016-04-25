<?php

class Piutang extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['piutang_m']);
    }

    public function index()
    {
        $this->data ['ars'] = $this->piutang_m->get_by(array(
            'piutang.ID_DAPUR'    => $this->user->ID_DAPUR
        ));

        $this->data['subview'] = 'sistem/admin/ar-ap/piutang';
        $this->data['javascript'] = 'sistem/admin/ar-ap/js';

        $this->load->view('sistem/_layout_main', $this->data);
    }

    public function create()
    {
        if($this->input->post('xid'))
        {
            if($this->piutang_m->create($this->input->post('xid'))){
                redirect('admin/ar-ap/piutang', 'get');
            }
        }

        $this->data ['datas'] = $this->piutang_m->get_raw(array(
            'transaksi_dtl.ID_DAPUR'    => $this->user->ID_DAPUR,
            'transaksi_dtl.STATUS_TRANSAKSI_DTL' => 1,
            'transaksi_dtl.STATUS_AR' => 0,
        ));

        $this->data['subview'] = 'sistem/admin/ar-ap/piutang-raw';
        $this->data['javascript'] = 'sistem/admin/ar-ap/js';

        $this->load->view('sistem/_layout_main', $this->data);
    }
}
