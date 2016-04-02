<?php

class Auth_m extends CI_Model
{

    public $rules_login = array(
        'email'    => array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required',
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required',
        ),
    );

    function __construct()
    {
        parent::__construct();
    }

    public function attempt()
    {
        $sql = "SELECT ID_PEGAWAI, ID_DIVISI DIVISI_PEGAWAI, NULL ID_MEMBER, NULL DIVISI_MEMBER
                FROM pegawai
                WHERE USERNAME_PEGAWAI = '".$this->input->post('username')."'
                AND PASSWORD_PEGAWAI = '".$this->hash($this->input->post('password'))."'
                AND STATUS_PEGAWAI = 1
                UNION
                SELECT NULL ID_PEGAWAI, NULL DIVISI_PEGAWAI, ID_MEMBER, ID_DIVISI DIVISI_MEMBER
                FROM member
                WHERE USERNAME_MEMBER = '".$this->input->post('username')."'
                AND PASSWORD_MEMBER = '".$this->hash($this->input->post('password'))."'
                AND STATUS_MEMBER = 1";

        $user = $this->db->query($sql);

        if ($user = $user->row()) {
            // Log in user
            if ($user->ID_PEGAWAI) {
                $data = array(
                    'id'          => $user->ID_PEGAWAI,
                    'divisi'      => $user->DIVISI_PEGAWAI,
                    'kelompok'    => 1,
                    'logged_type' => 'admin',
                );
            } else {
                $data = array(
                    'id'          => $user->ID_MEMBER,
                    'divisi'      => $user->DIVISI_MEMBER,
                    'kelompok'    => 2,
                    'logged_type' => 'member',
                );
            }

            $this->session->set_userdata($data);
        }
    }

    public function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
    }
}