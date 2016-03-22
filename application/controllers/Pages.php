<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends Frontend_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('pages_m');
		$this->load->model('menu_m');
		$this->load->model('kategori_m');
	}
	
	public function index()
	{
		$this->data['page'] = $this->pages_m->get_by(array('SLUG' => (string) $this->uri->segment(1)), TRUE);
		count($this->data['page']) || show_404(current_url());
		
		$this->data['footer_menu'] = $this->pages_m->get();
		$this->data['produk'] = $this->menu_m->getjoin();
		$this->data['kategori'] = $this->kategori_m->get_by(array('STATUS_KATEGORI'=>1));
		
    	$this->data['subview'] = 'website/'.$this->data['page']->TEMPLATE.'/index';
    	$this->load->view('website/_layout_front', $this->data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */