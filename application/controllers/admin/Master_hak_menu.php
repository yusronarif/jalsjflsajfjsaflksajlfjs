<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_hak_menu extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('pendidikan_m');
		$this->load->model('hak_menu_m');
		$this->load->model('menu_m');
		$this->load->model('dapur_m');
		$this->load->model('kantin_m');
	}
	
	public function index()
	{
		$this->data['item'] = $this->pendidikan_m->get();
		$this->data['subview'] = 'sistem/admin/hak_menu/index';
        $this->data['javascript'] = 'sistem/admin/hak_menu/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
	
	public function edit ($id = NULL)
	{
	    if ($id) {
	        $this->data['pendidikan'] = $this->pendidikan_m->get($id);
	        $this->data['menu'] = $this->menu_m->get_by(array('STATUS_MENU'=>1));
	        $this->data['dapur'] = $this->dapur_m->get_by(array('STATUS_DAPUR'=>1));
	        $this->data['kantin'] = $this->kantin_m->get_by(array('STATUS_KANTIN'=>1));
	        $this->data['hak_menu_list'] = $this->hak_menu_m->get_list($id);
	        $this->data['hak_menu'] = $this->hak_menu_m->get_new();
	        $data = array(
	            'ID_HM'=>$this->hak_menu_m->increment(),
	            'ID_DAPUR'=>$this->input->post('dapur'),
	            'ID_KANTIN'=>$this->input->post('kantin'),
	            'ID_PENDIDIKAN'=>$id,
	            'ID_MENU'=>$this->input->post('menu'),
	            'HARGA_HM'=>$this->input->post('harga'),
	            'LABA_HM'=>$this->input->post('laba')
	        );
	        count($this->data['pendidikan']) || redirect('404');
	    }
	    
	    // Set up the form
	    $rules = $this->hak_menu_m->rules;
	    $this->form_validation->set_rules($rules);
	    
	    // Process the form
	    if ($this->form_validation->run() == TRUE) {
	        	
	        $this->hak_menu_m->save($data, NULL);
	        redirect('admin/master_hak_menu/edit/'.$id);
	    }
		// Load the view
		$this->data['subview'] = 'sistem/admin/hak_menu/edit';
        $this->data['javascript'] = 'sistem/admin/hak_menu/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
	public function delete ($id)
	{
	    $exp=explode('_', $id);
		$this->hak_menu_m->delete($exp[0]);
		redirect('admin/master_hak_menu/edit/'.$exp[1]);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */