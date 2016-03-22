<?php
class Dapur_m extends MY_Model
{
	
	protected $_table_name = 'dapur';
	protected $_order_by = 'ID_DAPUR';
	protected $_primary_key = 'ID_DAPUR';
	protected $_primary_filter = 'intval';
	protected $_timestamps = FALSE;
	public $rules = array(
		'NAMA_DAPUR' => array(
			'field' => 'nama', 
			'label' => 'Nama Item', 
			'rules' => 'trim|required'
		)
	);

	function __construct ()
	{
		parent::__construct();
	}
	
	public function get_new(){
		$dapur = new stdClass();
		$dapur->ID_DAPUR='';
		$dapur->ID_NEGARA='';
		$dapur->ID_KOTA = '';
		$dapur->ID_PROVINSI = '';
		$dapur->NAMA_DAPUR = '';
		$dapur->TELP_DAPUR = '';
		$dapur->EMAIL_DAPUR = '';
		$dapur->ALAMAT_DAPUR = '';
		$dapur->GAMBAR_DAPUR = '';
		$dapur->STATUS_DAPUR = '';
		
		return $dapur;
	}
}