<?php
class Kantin_m extends MY_Model
{
	
	protected $_table_name = 'kantin';
	protected $_order_by = 'ID_KANTIN';
	protected $_primary_key = 'ID_KANTIN';
	protected $_primary_filter = 'intval';
	protected $_timestamps = FALSE;
	public $rules = array(
		'NAMA_KANTIN' => array(
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
		$kantin = new stdClass();
		$kantin->ID_KANTIN='';
		$kantin->ID_NEGARA='';
		$kantin->ID_KOTA = '';
		$kantin->ID_PROVINSI = '';
		$kantin->NAMA_KANTIN = '';
		$kantin->TELP_KANTIN = '';
		$kantin->EMAIL_KANTIN = '';
		$kantin->ALAMAT_KANTIN = '';
		$kantin->GAMBAR_KANTIN = '';
		$kantin->STATUS_KANTIN = '';
		
		return $kantin;
	}
}