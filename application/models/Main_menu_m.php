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
	
}