<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class Keranjang extends Member_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_m');
        $this->load->model('transaksi_dtl_m');
        $this->load->model('hak_menu_m');
    }

    public function index()
    {
        $this->data['subview'] = 'sistem/member/keranjang/index';
        $this->data['javascript'] = 'sistem/member/keranjang/js';
        $this->load->view('sistem/_layout_main', $this->data);
    }

    public function validate_update_cart()
    {

        // Get the total number of items in cart
        $total = $this->cart->total_items();

        // Retrieve the posted information
        $item = $this->input->post('rowid');
        $qty = $this->input->post('qty');

        // Cycle true all items and update them
        for ($i = 0; $i < $total; $i++) {
            // Create an array with the products rowid's and quantities.
            $data = array(
                'rowid' => $item [$i],
                'qty'   => $qty [$i],
            );

            // Update the cart with the new information
            $this->cart->update($data);
        }
        redirect('member/keranjang');
    }

    public function selesai($id = null)
    {
        if ($this->cart->total_items() == 0) {
            redirect('member/keranjang');
        } else {
            if (intval(date("His")) >= intval($this->data ['buka']) && intval(date("His")) <= intval($this->data ['tutup'])) {
                redirect('member/keranjang?status=tutup');
            } else {
                $info_member = $this->member_m->get($this->session->userdata ['id']);
                $saldo = $info_member->SALDO_MEMBER;
                $idmember = $info_member->ID_MEMBER;
                $idpend = $info_member->ID_PENDIDIKAN;

                $nilai = $saldo - $this->cart->total();
                $now = date('Y-m-d H:i:s');
                if (intval(date("His")) > intval($this->data['tutup'])) {
                    $untuk = date('Y-m-d', strtotime($now . "+2 days"));
                } else {
                    $untuk = date('Y-m-d', strtotime($now . "+1 days"));
                }
                if ($nilai >= 0) {
                    $idnya = $this->transaksi_m->notrans('T');
                    $this->data ['keranjang'] = $this->transaksi_m->get_new();
                    $data = array(

                        'NO_TRANSAKSI'     => $idnya,
                        'ID_JADWAL'        => null,
                        'ID_MEMBER'        => $idmember,
                        'TGL_TRANSAKSI'    => $now,
                        'UNTUK_TRANSAKSI'  => $untuk,
                        'TOTAL_TRANSAKSI'  => $this->cart->total(),
                        'STATUS_TRANSAKSI' => 1,
                    );
                    $this->transaksi_m->save($data, $id);

                    $this->member_m->save(array('SALDO_MEMBER' => $nilai), $idmember);

                    foreach ($this->cart->contents() as $items):
                        $this->data ['transdtl'] = $this->transaksi_dtl_m->get_new();
                        $transaksi = $this->hak_menu_m->get($items['id']);
                        $data = array(

                            'ID_TRANSAKSI_DTL'     => $this->transaksi_dtl_m->increment(),
                            'ID_PENDIDIKAN'        => $transaksi->ID_PENDIDIKAN,
                            'ID_MENU'              => $transaksi->ID_MENU,
                            'NO_TRANSAKSI'         => $idnya,
                            'ID_DAPUR'             => $transaksi->ID_DAPUR,
                            'ID_KANTIN'            => $transaksi->ID_KANTIN,
                            'QTY_TRANSAKSI_DTL'    => $items['qty'],
                            'HARGA_TRANSAKSI_DTL'  => $transaksi->HARGA_HM,
                            'LABA_TRANSAKSI_DTL'   => $transaksi->LABA_HM,
                            'STATUS_TRANSAKSI_DTL' => 0,
                        );
                        $this->transaksi_dtl_m->save($data, $id);
                    endforeach;

                    $this->cart->destroy();
                    redirect('member/keranjang?status=berhasil');
                } else {
                    redirect('member/keranjang?status=gagal');
                }
            }
        }
    }

    public function validate_delete_cart($id)
    {
        $data = array(
            'rowid' => $id,
            'qty'   => 0,
        );

        $this->cart->update($data);
        redirect('member/keranjang');
    }

    public function deletecart()
    {
        $this->cart->destroy();
        redirect('member/keranjang');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */