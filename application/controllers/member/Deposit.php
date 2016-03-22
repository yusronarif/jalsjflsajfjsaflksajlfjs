<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deposit extends Member_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		$this->data['subview'] = 'sistem/member/deposit/index';
        $this->data['javascript'] = 'sistem/member/deposit/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */