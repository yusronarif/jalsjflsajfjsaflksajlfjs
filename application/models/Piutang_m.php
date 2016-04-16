<?php

class Piutang_m extends MY_Model
{

    protected $_table_name = 'piutang';
    protected $_order_by = 'piutang.NO_PIUTANG DESC';
    protected $_primary_key = 'NO_PIUTANG';
    protected $_primary_filter = 'strval';
    protected $_timestamps = false;
    public $rules = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function get_raw()
    {
        $this->db->select('transaksi_dtl.ID_PENDIDIKAN, pendidikan.NAMA_PENDIDIKAN, SUM(transaksi_dtl.HARGA_TRANSAKSI_DTL) AS TOTAL_HARGA,SUM(transaksi_dtl.LABA_TRANSAKSI_DTL-transaksi_dtl.HARGA_TRANSAKSI_DTL) AS TOTAL_LABA');
        $this->db->join('menu', 'transaksi_dtl.ID_MENU=menu.ID_MENU', 'left');
        $this->db->join('pendidikan', 'transaksi_dtl.ID_PENDIDIKAN=pendidikan.ID_PENDIDIKAN', 'left');
        $this->db->where('transaksi_dtl.ID_DAPUR', $this->user->ID_DAPUR);
        $this->db->where('transaksi_dtl.STATUS_AR', 0);
        $this->db->group_by('transaksi_dtl.ID_DAPUR, transaksi_dtl.ID_PENDIDIKAN');

        return $this->db->get('transaksi_dtl')->result();
    }

    public function create($id=null)
    {
        if(!$id) return false;
        if(!$id = $this->encryption->decrypt($id)) return false;

        $pid = $this->notrans('AR');
        $data = array(
            'NO_PIUTANG' => $pid,
            'ID_PEGAWAI' => $this->user->ID_PEGAWAI,
            'ID_DAPUR' => $this->user->ID_DAPUR,
            'TGL_PIUTANG' => date("Y-m-d")
        );

        $this->db->trans_begin();
        $this->db->insert($this->_table_name, $data);
        $this->db->query("UPDATE piutang SET 
                        TOTAL_PIUTANG = (SELECT SUM(LABA_TRANSAKSI_DTL-HARGA_TRANSAKSI_DTL)
                            FROM transaksi_dtl
                            WHERE ID_DAPUR = " . $this->user->ID_DAPUR . "
                            AND ID_PENDIDIKAN = " . $id . "
                            AND STATUS_AR = 0
                            GROUP BY ID_DAPUR, ID_PENDIDIKAN)  
                        WHERE NO_PIUTANG = '" . $pid."'");
        echo $this->db->last_query();
        $this->db->query("INSERT INTO piutang_dtl
                    SELECT (CASE WHEN @maxid IS NULL THEN @maxid:=1 ELSE @maxid:=@maxid+1 END) nextid, '" . $pid . "', 
                    ID_TRANSAKSI_DTL, QTY_TRANSAKSI_DTL, HARGA_TRANSAKSI_DTL, LABA_TRANSAKSI_DTL
                    FROM transaksi_dtl, (SELECT @maxid:=MAX(ID_PIUTANG_DTL) FROM piutang_dtl) vt
                    WHERE ID_DAPUR = " . $this->user->ID_DAPUR . "
                    AND ID_PENDIDIKAN = " . $id . "
                    AND STATUS_AR = 0");
        $this->db->query("UPDATE transaksi_dtl SET STATUS_AR = 1 WHERE ID_DAPUR = " . $this->user->ID_DAPUR . " AND ID_PENDIDIKAN = " . $id);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return false;
        }
        else {
            $this->db->trans_commit();
            return true;
        }

    }
}
