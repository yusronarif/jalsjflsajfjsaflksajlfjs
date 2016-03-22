<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
class Ganti_password extends Member_Controller {
	public function __construct() {
		parent::__construct ();
	}
	public function index() {
		$id = $this->session->userdata ['id'];
		
		$this->data ['infox'] = $this->member_m->get ( $id );
		
		$data = array (
				'PASSWORD_MEMBER' => $this->hash ( $this->input->post ( 'new_pass' ) ) 
		);
		
		// Set up the form
		$rules = $this->member_m->rules_ganti_password;
		$this->form_validation->set_rules ( $rules );
		
		// Process the form
		if ($this->form_validation->run () == TRUE) {
			
			$this->member_m->save ( $data, $id );
			redirect ( 'member/ganti_password?status=ok' );
		}
		
		$this->data['subview'] = 'sistem/member/ganti_password/index';
        $this->data['javascript'] = 'sistem/member/ganti_password/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
	
	public function hash($string) {
		return hash ( 'sha512', $string . config_item ( 'encryption_key' ) );
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */