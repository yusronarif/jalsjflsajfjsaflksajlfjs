<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Profil extends Admin_Controller {
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
			
			$this->data ['cek_gambar'] = $this->pegawai_m->get ( $id );
			
			if ($this->data ['cek_gambar']->GAMBAR_PEGAWAI!='user.png') {
				unlink('./uploads/images'.$this->data ['cek_gambar']->GAMBAR_PEGAWAI);
			}
			
			$this->data ['infox'] = $this->pegawai_m->get ( $id );
			$data = array (
					'EMAIL_PEGAWAI' => $this->input->post ( 'email' ),
					'TELP_PEGAWAI' => $this->input->post ( 'telp' ),
					'ALAMAT_PEGAWAI' => $this->input->post ( 'alamat' ),
					'GAMBAR_PEGAWAI' => $filename
			);
		} else {
			$this->data ['infox'] = $this->pegawai_m->get ( $id );
			$data = array (
					'EMAIL_PEGAWAI' => $this->input->post ( 'email' ),
					'TELP_PEGAWAI' => $this->input->post ( 'telp' ),
					'ALAMAT_PEGAWAI' => $this->input->post ( 'alamat' )
			);
		}
		
		// Set up the form
		$rules = $this->pegawai_m->rules_profil;
		$this->form_validation->set_rules ( $rules );
		
		// Process the form
		if ($this->form_validation->run () == TRUE) {
			
			$this->pegawai_m->save ( $data, $id );
			redirect ( 'admin/profil?status=ok' );
		}
		
		$this->data['subview'] = 'sistem/admin/profil/index';
        $this->data['javascript'] = 'sistem/admin/profil/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */