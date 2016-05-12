<?php

class Transaksi_m extends MY_Model
{

    protected $_table_name = 'transaksi';
    protected $_order_by = 'transaksi.NO_TRANSAKSI DESC';
    protected $_primary_key = 'NO_TRANSAKSI';
    protected $_primary_filter = 'strval';
    protected $_timestamps = false;
    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $keranjang = new stdClass();
        $keranjang->NO_TRANSAKSI = '';
        $keranjang->ID_JADWAL = '';
        $keranjang->ID_MEMBER = '';
        $keranjang->TGL_TRANSAKSI = '';
        $keranjang->UNTUK_TRANSAKSI = '';
        $keranjang->TOTAL_TRANSAKSI = '';
        $keranjang->STATUS_TRANSAKSI = '';
        $keranjang->TGL_VOID_TRANSAKSI = '';

        return $keranjang;
    }

    public function get_pesanan($id, $single = false)
    {
        $this->db->select('*,SUM(transaksi_dtl.QTY_TRANSAKSI_DTL) AS TOTAL');
        $this->db->where("transaksi.STATUS_TRANSAKSI<>'0'");
        $this->db->join('transaksi_dtl', 'transaksi.NO_TRANSAKSI=transaksi_dtl.NO_TRANSAKSI', 'left');
        $this->db->join('menu', 'transaksi_dtl.ID_MENU=menu.ID_MENU', 'left');
        $this->db->join('pendidikan', 'transaksi_dtl.ID_PENDIDIKAN=pendidikan.ID_PENDIDIKAN', 'left');
        $this->db->group_by('transaksi_dtl.ID_MENU,transaksi_dtl.ID_PENDIDIKAN');

        return parent::get_by($id, $single);
    }

    public function get_histori($id, $single = false)
    {
        $this->db->select('*');
        $this->db->join('transaksi_dtl', 'transaksi.NO_TRANSAKSI=transaksi_dtl.NO_TRANSAKSI', 'left');
        $this->db->join('menu', 'transaksi_dtl.ID_MENU=menu.ID_MENU', 'left');
        $this->db->join('kantin', 'transaksi_dtl.ID_KANTIN=kantin.ID_KANTIN', 'left');
        $this->db->order_by('transaksi_dtl.PUT_DATE_TRANSAKSI_DTL, transaksi_dtl.PUT_ON_TRANSAKSI_DTL, kantin.NAMA_KANTIN, menu.NAMA_MENU');

        return parent::get_by($id, $single);
    }

    public function get_ambil($id, $kantin, $single = false)
    {
        $this->db->select('*');
        $this->db->where('transaksi_dtl.ID_KANTIN', $kantin);
        $this->db->join('transaksi_dtl', 'transaksi.NO_TRANSAKSI=transaksi_dtl.NO_TRANSAKSI', 'left');
        $this->db->join('menu', 'transaksi_dtl.ID_MENU=menu.ID_MENU', 'left');

        return parent::get_by($id, $single);
    }

    public function get_ambil_parent($id, $kantin, $single = false)
    {
        $this->db->select('*');
        $this->db->where('transaksi_dtl.ID_KANTIN', $kantin);
        $this->db->group_by('transaksi.NO_TRANSAKSI');
        $this->db->join('transaksi_dtl', 'transaksi.NO_TRANSAKSI=transaksi_dtl.NO_TRANSAKSI', 'left');
        $this->db->join('menu', 'transaksi_dtl.ID_MENU=menu.ID_MENU', 'left');

        return parent::get_by($id, $single);
    }
}
