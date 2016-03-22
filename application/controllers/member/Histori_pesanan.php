<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Histori_pesanan extends Member_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('transaksi_m');
	}
	
	public function index()
	{
		$this->data['historipesanan'] = $this->transaksi_m->get_by(array('ID_MEMBER'=>$this->session->userdata['id']));
		$this->data['subview'] = 'sistem/member/histori_pesanan/index';
        $this->data['javascript'] = 'sistem/member/histori_pesanan/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
	
	public function detail($id)
	{
		$this->data['histori'] = $this->transaksi_m->get($id);
		$this->data['historipesanan'] = $this->transaksi_m->get_histori(array('transaksi.NO_TRANSAKSI'=>$id));
		$this->data['subview'] = 'sistem/member/histori_pesanan/detail';
        $this->data['javascript'] = 'sistem/member/histori_pesanan/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */