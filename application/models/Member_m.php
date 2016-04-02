<?php

class Member_m extends MY_Model
{
    protected $_table_name = 'member';
    protected $_order_by = 'ID_MEMBER';
    protected $_primary_key = 'ID_MEMBER';
    protected $_primary_filter = 'intval';
    protected $_timestamps = false;
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
    public $rules_profil = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required',
        ),
    );

    public $rules_ganti_password = array(
        'NEW_PASSWORD' => array(
            'field' => 'new_pass',
            'label' => 'Password Baru',
            'rules' => 'trim|required|matches[con_pass]',
        ),
        'CON_PASSWORD' => array(
            'field' => 'con_pass',
            'label' => 'Konfirmasi Password Baru',
            'rules' => 'trim|required',
        ),
    );

    function __construct()
    {
        parent::__construct();
    }
}