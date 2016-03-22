<?php
class Transaksi_dtl_m extends MY_Model
{
	
	protected $_table_name = 'transaksi_dtl';
	protected $_order_by = 'ID_TRANSAKSI_DTL';
	protected $_primary_key = 'ID_TRANSAKSI_DTL';
	protected $_primary_filter = 'intval';
	protected $_timestamps = FALSE;
	public $rules = array();

	function __construct ()
	{
		parent::__construct();
	}
	
	public function get_new(){
		$transdtl = new stdClass();
		$transdtl->ID_TRANSAKSI_DTL='';
		$transdtl->ID_PENDIDIKAN = '';
		$transdtl->ID_MENU = '';
		$transdtl->NO_TRANSAKSI = '';
		$transdtl->ID_DAPUR = '';
		$transdtl->ID_KANTIN = '';
		$transdtl->QTY_TRANSAKSI_DTL = '';
		$transdtl->HARGA_TRANSAKSI_DTL = '';
		$transdtl->LABA_TRANSAKSI_DTL = '';
		$transdtl->AMBIL_TRANSAKSI_DTL = '';
		$transdtl->ID_PEGAWAI = '';
		$transdtl->STATUS_TRANSAKSI_DTL = '';
	
		return $transdtl;
	}
}