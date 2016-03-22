<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
class Ganti_password extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
	}
	public function index() {
		$id = $this->session->userdata ['id'];
		
		$this->data ['infox'] = $this->pegawai_m->get ( $id );
		
		$data = array (
				'PASSWORD_PEGAWAI' => $this->hash ( $this->input->post ( 'new_pass' ) ) 
		);
		
		// Set up the form
		$rules = $this->pegawai_m->rules_ganti_password;
		$this->form_validation->set_rules ( $rules );
		
		// Process the form
		if ($this->form_validation->run () == TRUE) {
			
			$this->pegawai_m->save ( $data, $id );
			redirect ( 'admin/ganti_password?status=ok' );
		}
		
		$this->data['subview'] = 'sistem/admin/ganti_password/index';
        $this->data['javascript'] = 'sistem/admin/ganti_password/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
	
	public function hash($string) {
		return hash ( 'sha512', $string . config_item ( 'encryption_key' ) );
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */