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
        if (!$this->input->post('tanggal')) $_POST['tanggal'] = date("d-m-Y");
        if (!$this->input->post('tanggal_max')) $_POST['tanggal_max'] = date("d-m-Y", strtotime(date("Y-m-d"). " +1 week"));

        $dapur = $this->pegawai_m->get($this->session->userdata['id']);

        $this->data ['pesanan'] = $this->transaksi_m->get_pesanan(array(
            'transaksi_dtl.ID_DAPUR'    => $dapur->ID_DAPUR,
            'transaksi_dtl.PUT_DATE_TRANSAKSI_DTL >=' => date_db($this->input->post('tanggal')),
            'transaksi_dtl.PUT_DATE_TRANSAKSI_DTL <=' => date_db($this->input->post('tanggal_max')),
        ));

        $this->data['subview'] = 'sistem/admin/pesanan/index';
        $this->data['javascript'] = 'sistem/admin/pesanan/js';

        $this->load->view('sistem/_layout_main', $this->data);
    }
}
