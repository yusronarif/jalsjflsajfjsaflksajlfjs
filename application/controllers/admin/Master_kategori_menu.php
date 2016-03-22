<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_kategori_menu extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('kategori_m');
	}
	
	public function index()
	{
		$this->data['kategori'] = $this->kategori_m->get_by(array('STATUS_KATEGORI'=>'1'));
		$this->data['subview'] = 'sistem/admin/kategori/index';
        $this->data['javascript'] = 'sistem/admin/kategori/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
	
	public function edit ($id = NULL)
	{
		// Fetch a page or set a new one
		if ($id) {
			$this->data['kategori'] = $this->kategori_m->get($id);
			$data = array(
					'NAMA_KATEGORI'=>$this->input->post('nama'),
					'STATUS_KATEGORI'=>'1'
			);
			count($this->data['kategori']) || redirect('404');
		}
		else {
			$this->data['kategori'] = $this->kategori_m->get_new();
			$data = array(
					'ID_KATEGORI'=>$this->kategori_m->increment(),
					'NAMA_KATEGORI'=>$this->input->post('nama'),
					'STATUS_KATEGORI'=>'1'
			);
		}
		
		// Set up the form
		$rules = $this->kategori_m->rules;
		$this->form_validation->set_rules($rules);
	
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			
			$this->kategori_m->save($data, $id);
			redirect('admin/master_kategori_menu');
		}
		
	
		// Load the view
		$this->data['subview'] = 'sistem/admin/kategori/edit';
        $this->data['javascript'] = 'sistem/admin/kategori/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
	public function delete ($id)
	{
		$data = array('STATUS_KATEGORI'=>'0');
		$this->kategori_m->save($data, $id);
		redirect('admin/master_kategori_menu');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */