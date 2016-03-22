<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
class Pengambilan extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'transaksi_m' );
		$this->load->model ( 'transaksi_dtl_m' );
		$this->load->model ( 'member_m' );
	}
	public function index() {
		$id = $this->input->post ( 'username' );
		if ($id) {
			$this->data ['infox'] = $this->member_m->get_by ( array (
					'USERNAME_MEMBER' => $id 
			), TRUE );
			
			if (count ( $this->data ['infox'] )>0) {
				$now = date ( "Y-m-d" );
				$kantin = $this->pegawai_m->get($this->session->userdata['id']);
				$this->data ['pesanan'] = $this->transaksi_m->get_ambil_parent ( array (
						'ID_MEMBER' => $this->data ['infox']->ID_MEMBER,
						'UNTUK_TRANSAKSI' => $now ,
						'STATUS_TRANSAKSI' =>'1'
				),$kantin->ID_KANTIN);
				
				$this->data ['items'] = $this->transaksi_m->get_ambil ( array (
						'ID_MEMBER' => $this->data ['infox']->ID_MEMBER,
						'UNTUK_TRANSAKSI' => $now ,
						'STATUS_TRANSAKSI' =>'1'
				),$kantin->ID_KANTIN);
			}
			
			count ( $this->data ['infox'] ) || $this->data ['errors'] = '1';
			$this->data ['cek'] = 1;
		} else {
			$this->data ['cek'] = 0;
		}
		
		$this->data['subview'] = 'sistem/admin/pengambilan/index';
        $this->data['javascript'] = 'sistem/admin/pengambilan/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
	
	public function save() {
		if ($this->input->post ( 'no_transaksi' )) {
			$no_transaksi = $this->input->post ( 'no_transaksi' );
			$now = date ( 'Y-m-d H:i:s' );
			$kantin = $this->pegawai_m->get($this->session->userdata['id']);
			$tx_dtl = $this->transaksi_dtl_m->get_by(array('NO_TRANSAKSI'=>$no_transaksi,'ID_KANTIN'=>$kantin->ID_KANTIN));
			foreach ($tx_dtl as $value):
    			$data = array (
    					'ID_PEGAWAI'=>$this->session->userdata ['id'],
    					'AMBIL_TRANSAKSI_DTL'=>$now,
    					'STATUS_TRANSAKSI_DTL'=>'1'
    			);
    			// Process the form
    			$this->transaksi_dtl_m->save ( $data, $value->ID_TRANSAKSI_DTL );
			endforeach;
			redirect('admin/pengambilan?status=berhasil');
		} else {
			redirect('admin/pengambilan');
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */