<?php
class Menu_m extends MY_Model
{

	protected $_table_name = 'menu';
	protected $_order_by = 'ID_MENU';
	protected $_primary_key = 'ID_MENU';
	protected $_primary_filter = 'intval';
	protected $_timestamps = FALSE;
	public $rules = array(
		'NAMA_MENU' => array(
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
		$item = new stdClass();
		$item->ID_MENU='';
		$item->ID_KATEGORI='';
		$item->NAMA_MENU = '';
		$item->KET_MENU = '';
		$item->KANDUNGAN_MENU = '';
		$item->GAMBAR_MENU = '';
		$item->STATUS_MENU = '';

		return $item;
	}

	public function getjoin($id = NULL, $single = FALSE){

		$this->db->select('*');
		$this->db->where('STATUS_MENU','1');
		$this->db->join('kategori', 'menu.ID_KATEGORI=kategori.ID_KATEGORI', 'left');

		return parent::get($id, $single);
	}
}
