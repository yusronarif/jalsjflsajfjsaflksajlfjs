<?php
class Main_menu_m extends MY_Model
{

	protected $_table_name = 'main_menu';
	protected $_order_by = 'ID_MM';
	protected $_primary_key = 'ID_MM';
	protected $_primary_filter = 'intval';
	protected $_timestamps = FALSE;
	public $rules = array();

	function __construct ()
	{
		parent::__construct();
	}

    public function get_menus($where, $single = FALSE){

        $this->db->select("*, IF(PARENT_MM=0, ID_MM, CONCAT(PARENT_MM,':',ID_MM)) STATUS_MM");
        $this->db->where($where);
        $this->db->order_by("CAST(IF(PARENT_MM=0, ID_MM, CONCAT(PARENT_MM,'.',ID_MM)) AS DOUBLE)");

        return parent::get(null, $single);
    }

}
