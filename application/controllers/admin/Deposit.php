<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
class Deposit extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'topup_m' );
		$this->load->model ( 'member_m' );
	}
	public function index() {
		$id = substr($this->input->post ( 'username' ),0,12);
		if ($id) {
			$this->data ['infox'] = $this->member_m->get_by ( array('USERNAME_MEMBER'=>$id), TRUE);
			
			count ( $this->data ['infox'] ) || $this->data ['errors'] = '1';
			$this->data ['cek'] = 1;
		} else {
			$this->data ['cek'] = 0;
		}
		
		$this->data['subview'] = 'sistem/admin/deposit/index';
        $this->data['javascript'] = 'sistem/admin/deposit/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
	public function save($id=NULL) {
		$id_member = $this->input->post ( 'id_member' );
		$now = date ( 'Y-m-d H:i:s' );
		$this->data ['topup'] = $this->topup_m->get_new ();
		$data = array (
				'NO_TOPUP' => $this->topup_m->notrans ('D'),
				'ID_MEMBER' => $id_member,
				'ID_PEGAWAI' => $this->session->userdata ['id'],
				'NOMINAL_TOPUP' => $this->input->post ( 'nominal_saldo' ),
				'TGL_TOPUP' => $now,
		        'STATUS_TOPUP' => 1,
                'CLOSE_TOPUP' => 0
		    
		);
		
		$rules = $this->topup_m->rules;
		$this->form_validation->set_rules ( $rules );
		
		// Process the form
		if ($this->form_validation->run () == TRUE) {
			
			$this->topup_m->save ( $data, $id );
			$user = $this->member_m->get ( $id_member );
			$data = array (
					'SALDO_MEMBER' => $user->SALDO_MEMBER + $this->input->post ( 'nominal_saldo' ) 
			);
			$this->member_m->save ( $data, $id_member );
			redirect ( 'admin/deposit?status=berhasil' );
		} else {
			redirect ( 'admin/deposit' );
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */