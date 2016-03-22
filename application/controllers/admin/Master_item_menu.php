<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_item_menu extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('menu_m');
	}
	
	public function index()
	{
		$this->data['item'] = $this->menu_m->getjoin();
		$this->data['subview'] = 'sistem/admin/menu/index';
        $this->data['javascript'] = 'sistem/admin/menu/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
	
	public function edit ($id = NULL)
	{
		// Fetch a page or set a new one
		$this->load->model('kategori_m');
		$this->data['kategori'] = $this->kategori_m->get_by(array('STATUS_KATEGORI'=>'1'));
		if ($id) {

			if (!empty($_FILES['gambar']['name'])) {
				$config ['upload_path'] = './uploads/images/';
				$config ['allowed_types'] = 'gif|jpg|png';
				$config ['max_size'] = '1024';
				$config ['max_width'] = '512';
				$config ['max_height'] = '512';
					
				$newFileName = $_FILES ['gambar'] ['name'];
				$fileExt = array_pop ( explode ( ".", $newFileName ) );
				$filename = md5 ( time () ) . "." . $fileExt;
					
				// set filename in config for upload
				$config ['file_name'] = $filename;
					
				$this->load->library ( 'upload', $config );
					
				$this->upload->do_upload ('gambar');
					
				$this->data ['cek_gambar'] = $this->menu_m->get ( $id );
					
				if ($this->data ['cek_gambar']->GAMBAR_MENU!='menu.jpg') {
					unlink('./uploads/images/'.$this->data ['cek_gambar']->GAMBAR_MENU);
				}
					
				$this->data['item'] = $this->menu_m->get($id);
				$data = array(					
						'NAMA_MENU'=>$this->input->post('nama'),
						'ID_KATEGORI'=>$this->input->post('kategori'),
						'KET_MENU'=>$this->input->post('keterangan'),
						'KANDUNGAN_MENU'=>$this->input->post('kandungan'),
						'GAMBAR_MENU'=>$filename
				);
				count($this->data['item']) || redirect('404');
				
			} else {
				$this->data['item'] = $this->menu_m->get($id);
				$data = array(					
						'NAMA_MENU'=>$this->input->post('nama'),
						'ID_KATEGORI'=>$this->input->post('kategori'),
						'KET_MENU'=>$this->input->post('keterangan'),
						'KANDUNGAN_MENU'=>$this->input->post('kandungan'),
				);
				count($this->data['item']) || redirect('404');
			}
			
		}
		else {

			if (!empty($_FILES['gambar']['name'])) {
				$config ['upload_path'] = './uploads/images/';
				$config ['allowed_types'] = 'gif|jpg|png';
				$config ['max_size'] = '1024';
				$config ['max_width'] = '512';
				$config ['max_height'] = '512';
					
				$newFileName = $_FILES ['gambar'] ['name'];
				$fileExt = array_pop ( explode ( ".", $newFileName ) );
				$filename = md5 ( time () ) . "." . $fileExt;
					
				// set filename in config for upload
				$config ['file_name'] = $filename;
					
				$this->load->library ( 'upload', $config );
					
				$this->upload->do_upload ('gambar');
					
				$this->data ['cek_gambar'] = $this->menu_m->get ( $id );
					
				if ($this->data ['cek_gambar']->GAMBAR_MENU!='menu.jpg') {
					unlink('./uploads/images/'.$this->data ['cek_gambar']->GAMBAR_MENU);
				}
					
				$this->data['item'] = $this->menu_m->get_new();
				$data = array(
						'ID_MENU'=>$this->menu_m->increment(),
						'NAMA_MENU'=>$this->input->post('nama'),
						'ID_KATEGORI'=>$this->input->post('kategori'),
						'KET_MENU'=>$this->input->post('keterangan'),
						'KANDUNGAN_MENU'=>$this->input->post('kandungan'),
						'GAMBAR_MENU'=>$filename
				);
			
			} else {
				$this->data['item'] = $this->menu_m->get_new();
				$data = array(
						'ID_MENU'=>$this->menu_m->increment(),
						'NAMA_MENU'=>$this->input->post('nama'),
						'ID_KATEGORI'=>$this->input->post('kategori'),
						'KET_MENU'=>$this->input->post('keterangan'),
						'KANDUNGAN_MENU'=>$this->input->post('kandungan'),
				);
			}
		}
		
		// Set up the form
		$rules = $this->menu_m->rules;
		$this->form_validation->set_rules($rules);
	
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			
			$this->menu_m->save($data, $id);
			redirect('admin/master_item_menu');
		}
	
		// Load the view
		$this->data['subview'] = 'sistem/admin/menu/edit';
        $this->data['javascript'] = 'sistem/admin/menu/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
	public function delete ($id)
	{
		$data = array('STATUS_MENU'=>'0');
		$this->menu_m->save($data, $id);
		redirect('admin/master_item_menu');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */