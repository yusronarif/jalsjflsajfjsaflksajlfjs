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
        $id_pendidikan = $this->member_m->get($this->session->userdata['id']);
        $this->data['item'] = $this->hak_menu_m->getjoin($id_pendidikan->ID_PENDIDIKAN, false);
        $this->data['subview'] = 'sistem/member/pesan/index';
        $this->data['javascript'] = 'sistem/member/pesan/js';
        $this->load->view('sistem/_layout_main', $this->data);
    }

    public function cart($id)
    {
        if(preg_match('::', $id)) list($id, $ambil) = explode('::', $id);

        $cart = $this->cart->contents(); //get all items in the cart
        $exists = false;             //lets say that the new item we're adding is not in the cart
        $rowid = '';
        foreach ($cart as $item) {
            if ($item['id'] == $id)     //if the item we're adding is in cart add up those two quantities
            {
                $exists = true;
                $rowid = $item['rowid'];
                $qty = $item['qty'] + 1;
                array_push($item['put_when'], $ambil);
                $ambil = $item['put_when'];
            }
        }
        if ($exists) {
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty,
                'put_when' => $ambil
            );

            // Update the cart with the new information
            $this->cart->update($data);
            redirect('member/pesan?success=2');
        } else {
            $this->data ['tmp'] = $this->hak_menu_m->get($id);
            $this->load->model('menu_m');
            $this->data ['tmpn'] = $this->menu_m->get($this->data ['tmp']->ID_MENU);
            $data = array(
                'id'    => $this->data ['tmp']->ID_HM,
                'qty'   => 1,
                'price' => $this->data ['tmp']->LABA_HM,
                'name'  => $this->data ['tmpn']->NAMA_MENU,
                'put_when' => [$ambil]
            );
            $this->cart->insert($data);
            redirect('member/pesan?success=1');
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