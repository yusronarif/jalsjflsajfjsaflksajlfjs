<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Pesanan extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_m');
    }

    public function index()
    {

        if ($this->input->post('tanggal') != null) {
            $tgl = $this->input->post('tanggal');
        } else {
            $tgl = date('Y-m-d', strtotime(date('Y-m-d H:i:s') . "+1 days"));
        }

        $dapur = $this->pegawai_m->get($this->session->userdata['id']);

        $this->data ['pesanan'] = $this->transaksi_m->get_pesanan(array(
            'transaksi_dtl.ID_DAPUR'    => $dapur->ID_DAPUR,
            'transaksi.UNTUK_TRANSAKSI' => $tgl,
        ));
        $this->data ['tanggal'] = $tgl;
        $this->data['subview'] = 'sistem/admin/pesanan/index';
        $this->data['javascript'] = 'sistem/admin/pesanan/js';

        $this->load->view('sistem/_layout_main', $this->data);
    }
}