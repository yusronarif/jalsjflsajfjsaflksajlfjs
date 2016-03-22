<?php
class Pages_m extends MY_Model
{
	protected $_table_name = 'pages';
	protected $_order_by = 'ID';
	protected $_primary_key = 'ID';
	protected $_primary_filter = 'intval';
	protected $_timestamps = FALSE;
	public $rules = array();

	function __construct ()
	{
		parent::__construct();
	}
}