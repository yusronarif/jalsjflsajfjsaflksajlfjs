<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Histori_deposit extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('topup_m');
		$this->load->model ( 'member_m' );
	}
	
	public function index()
	{
	    
	    if ($this->input->post ( 'tanggal' )!=NULL){
	        $tgl=$this->input->post ( 'tanggal' );
	    } else {
	        $tgl=date("Y-m-d");
	    }
	    
	    $this->data['tanggal']=$tgl;
	    $this->data['sukses'] = $this->topup_m->sum_sukses($this->session->userdata['id'],$tgl);
	    $this->data['void'] = $this->topup_m->sum_void($this->session->userdata['id'],$tgl);
	    $this->data['historipesanan'] = $this->topup_m->get_histori($this->session->userdata['id'],$tgl);
		$this->data['subview'] = 'sistem/admin/histori_deposit/index';
        $this->data['javascript'] = 'sistem/admin/histori_deposit/js';
        $this->load->view('sistem/_layout_main', $this->data);
	}
	public function edit($id)
	{
	    if ($id){
    	    $this->data ['topupx'] = $this->topup_m->get_by(array('NO_TOPUP'=>$id, 'STATUS_TOPUP'=>1,'CLOSE_TOPUP' => 0),TRUE);
    	    count($this->data['topupx']) || redirect('admin/404');
    	    
    	    $this->data ['infox'] = $this->member_m->get($this->data['topupx']->ID_MEMBER);
    	    $now = date ( 'Y-m-d H:i:s' );
    	    $rules = $this->topup_m->rules_edit;
    	    $this->form_validation->set_rules($rules);
    	    
    	    // Process the form
    	    if ($this->form_validation->run() == TRUE) {
    	        //insert baru
    	        $this->data ['topup'] = $this->topup_m->get_new ();
    	        $id_baru=$this->topup_m->notrans ('D');
    	        $data = array (
    	            'NO_TOPUP' => $id_baru,
    	            'ID_MEMBER' => $this->data['topupx']->ID_MEMBER,
    	            'ID_PEGAWAI' => $this->session->userdata ['id'],
    	            'NOMINAL_TOPUP' => $this->input->post ( 'nominal_saldo' ),
    	            'TGL_TOPUP' => $now,
    	            'STATUS_TOPUP' => 1,
    	            'REF_TOPUP' => $id,
    	            'CLOSE_TOPUP' => 0
    	        );
    	        $this->topup_m->save ( $data, NULL );
    	        //edit yang lama
    	        $data = array (
    	            'STATUS_TOPUP' => 0,
    	            'TGL_VOID_TOPUP' => $now,
    	            'KET_VOID_TOPUP' => $this->input->post ( 'ket' ),
    	            'ID_PEGAWAI_VOID_TOPUP' => $this->session->userdata ['id']
    	        );
    	        $this->topup_m->save ( $data, $id );
    	        
    	        $data = array (
    	            'SALDO_MEMBER' => $this->data ['infox']->SALDO_MEMBER - $this->data ['topupx']->NOMINAL_TOPUP + $this->input->post ( 'nominal_saldo' )
    	        );
    	        $this->member_m->save ( $data, $this->data['topupx']->ID_MEMBER );
    	        
    	        redirect('admin/histori_deposit');
    	    }
    	    
    	    $this->data['subview'] = 'sistem/admin/histori_deposit/edit';
    	    $this->data['javascript'] = 'sistem/admin/histori_deposit/js';
    	    $this->load->view('sistem/_layout_main', $this->data);
	    } else {
	        redirect ( 'admin/histori_deposit' );
	    }
	}
	public function void($id)
	{
	    if ($id){
	        $this->data ['topupx'] = $this->topup_m->get_by(array('NO_TOPUP'=>$id, 'STATUS_TOPUP'=>1,'CLOSE_TOPUP' => 0),TRUE);
	        count($this->data['topupx']) || redirect('admin/404');
	        	
	        $this->data ['infox'] = $this->member_m->get($this->data['topupx']->ID_MEMBER);
	        $now = date ( 'Y-m-d H:i:s' );
	        $rules = $this->topup_m->rules_void;
	        $this->form_validation->set_rules($rules);
	        	
	        // Process the form
	        if ($this->form_validation->run() == TRUE) {
	          
	            //edit yang lama
	            $data = array (
	                'STATUS_TOPUP' => 0,
	                'TGL_VOID_TOPUP' => $now,
	                'KET_VOID_TOPUP' => $this->input->post ( 'ket' ),
	                'ID_PEGAWAI_VOID_TOPUP' => $this->session->userdata ['id']
	            );
	            $this->topup_m->save ( $data, $id );
	             
	            $data = array (
	                'SALDO_MEMBER' => $this->data ['infox']->SALDO_MEMBER - $this->data ['topupx']->NOMINAL_TOPUP
	            );
	            $this->member_m->save ( $data, $this->data['topupx']->ID_MEMBER );
	             
	            redirect('admin/histori_deposit');
	        }
	        	
	        $this->data['subview'] = 'sistem/admin/histori_deposit/void';
	        $this->data['javascript'] = 'sistem/admin/histori_deposit/js';
	        $this->load->view('sistem/_layout_main', $this->data);
	    } else {
	        redirect ( 'admin/histori_deposit' );
	    }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */