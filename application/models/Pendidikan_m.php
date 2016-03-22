<?php
class Pendidikan_m extends MY_Model
{
	
	protected $_table_name = 'pendidikan';
	protected $_order_by = 'ID_PENDIDIKAN';
	protected $_primary_key = 'ID_PENDIDIKAN';
	protected $_primary_filter = 'intval';
	protected $_timestamps = FALSE;
	public $rules = array();

	function __construct ()
	{
		parent::__construct();
	}
	
}