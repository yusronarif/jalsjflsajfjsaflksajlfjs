<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Histori_deposit extends Member_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('topup_m');
	}
	
	public function index()
	{
		$this->data['historipesanan'] = $this->topup_m->get_by(array('ID_MEMBER'=>$this->session->userdata['id']));
		$this->data['subview'] = 'sistem/member/histori_deposit/index';
        $this->data['javascript'] = 'sistem/member/histori_deposit/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */