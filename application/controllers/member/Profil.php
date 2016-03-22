<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Profil extends Member_Controller {
	public function __construct() {
		parent::__construct ();
	}
	public function index() {
		$id = $this->session->userdata ['id'];
		
		if (!empty($_FILES['gambar']['name'])) {
			$config ['upload_path'] = './uploads/images';
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
			
			$this->data ['cek_gambar'] = $this->member_m->get ( $id );
			
			if ($this->data ['cek_gambar']->GAMBAR_MEMBER!='user.png') {
				unlink('./uploads/images'.$this->data ['cek_gambar']->GAMBAR_MEMBER);
			}
			
			$this->data ['infox'] = $this->member_m->get ( $id );
			$data = array (
					'EMAIL_MEMBER' => $this->input->post ( 'email' ),
					'TELP_MEMBER' => $this->input->post ( 'telp' ),
					'ALAMAT_MEMBER' => $this->input->post ( 'alamat' ),
					'GAMBAR_MEMBER' => $filename
			);
		} else {
			$this->data ['infox'] = $this->member_m->get ( $id );
			$data = array (
					'EMAIL_MEMBER' => $this->input->post ( 'email' ),
					'TELP_MEMBER' => $this->input->post ( 'telp' ),
					'ALAMAT_MEMBER' => $this->input->post ( 'alamat' )
			);
		}
		
		// Set up the form
		$rules = $this->member_m->rules_profil;
		$this->form_validation->set_rules ( $rules );
		
		// Process the form
		if ($this->form_validation->run () == TRUE) {
			
			$this->member_m->save ( $data, $id );
			redirect ( 'member/profil?status=ok' );
		}
		
		$this->data['subview'] = 'sistem/member/profil/index';
        $this->data['javascript'] = 'sistem/member/profil/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */