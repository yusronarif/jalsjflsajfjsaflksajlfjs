<?php
class Topup_m extends MY_Model
{
	
	protected $_table_name = 'topup';
	protected $_order_by = 'NO_TOPUP desc';
	protected $_primary_key = 'NO_TOPUP';
	protected $_primary_filter = 'strval';
	protected $_timestamps = FALSE;
	public $rules = array(
			
			'SALDO_MEMBER' => array(
					'field' => 'nominal_saldo',
					'label' => 'Nominal',
					'rules' => 'trim|required|integer'
		
			)
	);
	
	public $rules_edit = array(
	    	
	    'NOMINAL_TOPUP' => array(
	        'field' => 'nominal_saldo',
	        'label' => 'Nominal',
	        'rules' => 'trim|required|integer'
	
	    ),
	    'KET_VOID_TOPUP' => array(
	        'field' => 'ket',
	        'label' => 'Alasan Edit',
	        'rules' => 'trim|required'
	    
	    )
	);
	public $rules_void = array(
	
	    'KET_VOID_TOPUP' => array(
	        'field' => 'ket',
	        'label' => 'Alasan Edit',
	        'rules' => 'trim|required'
	  
	    )
	);

	function __construct ()
	{
		parent::__construct();
	}
	
	public function get_new(){
		$topup = new stdClass();
		$topup->NO_TOPUP='';
		$topup->ID_MEMBER = '';
		$topup->ID_PEGAWAI = '';
		$topup->NOMINAL_TOPUP = '';
		$topup->TGL_TOPUP = '';
		$topup->STATUS_TOPUP = '';
		$topup->REF_TOPUP = '';
		$topup->TGL_VOID_TOPUP = '';
		$topup->KET_VOID_TOPUP = '';
		$topup->ID_PEGAWAI_VOID_TOPUP = '';
		$topup->CLOSE_TOPUP = '';
		
		return $topup;
	}
	
	public function get_histori($id, $tanggal){
	
	    $this->db->select('topup.*,member.USERNAME_MEMBER');
	    $this->db->where(array('topup.ID_PEGAWAI'=>$id,'DATE(topup.TGL_TOPUP)'=>$tanggal));
	    $this->db->join('member', 'member.ID_MEMBER=topup.ID_MEMBER', 'left');
	
	    return parent::get(NULL, FALSE);
	}
	
	public function sum_sukses($id, $tanggal){
	
	    $this->db->select('SUM(NOMINAL_TOPUP) AS TOTAL');
	    $this->db->where(array('ID_PEGAWAI'=>$id,'DATE(TGL_TOPUP)'=>$tanggal,'STATUS_TOPUP'=>1));
	
	    return parent::get(NULL, TRUE);
	}
	public function sum_void($id, $tanggal){
	
	    $this->db->select('SUM(NOMINAL_TOPUP) AS TOTAL');
	    $this->db->where(array('ID_PEGAWAI'=>$id,'DATE(TGL_TOPUP)'=>$tanggal,'STATUS_TOPUP'=>0));
	
	    return parent::get(NULL, TRUE);
	}
}