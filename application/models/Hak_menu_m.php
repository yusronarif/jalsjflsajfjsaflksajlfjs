<?php
class Hak_menu_m extends MY_Model
{
	
	protected $_table_name = 'hak_menu';
	protected $_order_by = 'ID_HM';
	protected $_primary_key = 'ID_HM';
	protected $_primary_filter = 'intval';
	protected $_timestamps = FALSE;
	public $rules = array(
	    'ID_DAPUR' => array(
	        'field' => 'dapur',
	        'label' => 'Dapur',
	        'rules' => 'trim|required'
	    )
	);

	function __construct ()
	{
		parent::__construct();
	}
	
	public function get_new(){
	    $hak_menu = new stdClass();
	    $hak_menu->ID_HM='';
	    $hak_menu->ID_DAPUR = '';
	    $hak_menu->ID_KANTIN = '';
	    $hak_menu->ID_PENDIDIKAN = '';
	    $hak_menu->ID_MENU = '';
	    $hak_menu->HARGA_HM = '';
	    $hak_menu->LABA_HM = '';
	
	    return $hak_menu;
	}
	
	public function getjoin($id = NULL, $single = FALSE){
	   
		$this->db->select('*');
		$this->db->where('ID_PENDIDIKAN',$id);
		$this->db->join('menu', 'menu.ID_MENU=hak_menu.ID_MENU', 'left');
		$this->db->join('kantin', 'kantin.ID_KANTIN=hak_menu.ID_KANTIN', 'left');
		
		return parent::get(NULL, $single);
	}
	public function get_list($id = NULL, $single = FALSE){
	
	    $this->db->select('*');
	    $this->db->where('ID_PENDIDIKAN',$id);
	    $this->db->join('menu', 'menu.ID_MENU=hak_menu.ID_MENU', 'left');
	    $this->db->join('kantin', 'kantin.ID_KANTIN=hak_menu.ID_KANTIN', 'left');
	    $this->db->join('dapur', 'dapur.ID_DAPUR=hak_menu.ID_DAPUR', 'left');
	
	    return parent::get(NULL, $single);
	}
}