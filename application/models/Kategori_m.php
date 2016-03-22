<?php
class Kategori_m extends MY_Model
{
	
	protected $_table_name = 'kategori';
	protected $_order_by = 'ID_KATEGORI';
	protected $_primary_key = 'ID_KATEGORI';
	protected $_primary_filter = 'intval';
	protected $_timestamps = FALSE;
	public $rules = array(
		'NAMA_KATEGORI' => array(
			'field' => 'nama', 
			'label' => 'Nama Kategori', 
			'rules' => 'trim|required'
		)
	);

	function __construct ()
	{
		parent::__construct();
	}
	
	public function get_new(){
		$kategori = new stdClass();
		$kategori->ID_KATEGORI='';
		$kategori->NAMA_KATEGORI = '';
		$kategori->STATUS_KATEGORI = '';
		
		return $kategori;
	}
}