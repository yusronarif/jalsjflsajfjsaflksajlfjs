<?php if (! defined('BASEPATH')) {exit('No direct script access allowed');}

class Pesan extends Member_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('hak_menu_m');
    }

    public function index()
    {
        $now = date('Y-m-d H:i:s');
        if (intval(date("His")) > intval($this->data['tutup'])) {
            $this->data['open'] = date('Y-m-d', strtotime($now . "+2 days"));
        } else {
            $this->data['open'] = date('Y-m-d', strtotime($now . "+1 days"));
        }

        $id_pendidikan = $this->member_m->get($this->session->userdata['id']);
        $this->data['item'] = $this->hak_menu_m->getjoin($id_pendidikan->ID_PENDIDIKAN, false);
        $this->data['subview'] = 'sistem/member/pesan/index';
        $this->data['javascript'] = 'sistem/member/pesan/js';
        $this->load->view('sistem/_layout_main', $this->data);
    }

    public function cart()
    {
        if(!$this->input->post('cart_id')){
            //redirect('member/pesan?errors=1');

            $this->data['msg'] = [
                'class' => 'alert-danger',
                'text' => 'Data tidak valid'
            ];

            echo 'error=1';
        }
        else {
            $id = $this->input->post('cart_id');
            $ambil = $this->input->post('cart_jadwal');
            $tanggal = $this->input->post('cart_tanggal');

            $cart = $this->cart->contents(); //get all items in the cart
            $exists = false;             //lets say that the new item we're adding is not in the cart
            $rowid = '';
            foreach ($cart as $item) {
                if ($item['id'] == $id)     //if the item we're adding is in cart add up those two quantities
                {
                    $exists = true;
                    $rowid = $item['rowid'];
                    $qty = $item['qty'] + $this->input->post('cart_qty');

                    $item['put'][$tanggal.'::'.$ambil]++;
                    ksort($item['put']);
                    $ambil = $item['put'];
                }
            }

            if ($exists) {
                $data = array(
                    'rowid'    => $rowid,
                    'qty'      => $qty,
                    'put'      => $ambil
                );

                // Update the cart with the new information
                $this->cart->update($data);
                //redirect('member/pesan?success=2');
                echo 'success=2';
            }
            else {
                $this->data ['tmp'] = $this->hak_menu_m->get($id);
                $this->load->model('menu_m');
                $this->data ['tmpn'] = $this->menu_m->get($this->data ['tmp']->ID_MENU);
                $data = array(
                    'id'       => $this->data ['tmp']->ID_HM,
                    'qty'      => 1,
                    'price'    => $this->data ['tmp']->LABA_HM,
                    'name'     => $this->data ['tmpn']->NAMA_MENU,
                    'put'      => [$tanggal.'::'.$ambil => 1]
                );
                $this->cart->insert($data);
                //redirect('member/pesan?success=1');
                echo 'success=1';
            }
        }
    }

    public function deletecart()
    {
        $this->cart->destroy();
        redirect('member/pesan');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
