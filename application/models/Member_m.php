<?php
class Member_m extends MY_Model
{
	
	protected $_table_name = 'member';
	protected $_order_by = 'ID_MEMBER';
	protected $_primary_key = 'ID_MEMBER';
	protected $_primary_filter = 'intval';
	protected $_timestamps = FALSE;
	public $rules_login = array(
		'email' => array(
			'field' => 'username', 
			'label' => 'Username', 
			'rules' => 'trim|required'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		)
	);
	public $rules_profil = array(
	    'email' => array(
	        'field' => 'email',
	        'label' => 'Email',
	        'rules' => 'trim|required'
	    )
	);
	
	public $rules_ganti_password = array(
	    'NEW_PASSWORD' => array(
				'field' => 'new_pass',
				'label' => 'Password Baru',
				'rules' => 'trim|required|matches[con_pass]'
		),
		'CON_PASSWORD' => array(
				'field' => 'con_pass',
				'label' => 'Konfirmasi Password Baru',
				'rules' => 'trim|required'
		)
	);

	function __construct ()
	{
		parent::__construct();
	}

	public function login ()
	{
		$user = $this->get_by(array(
			'USERNAME_MEMBER' => $this->input->post('username'),
			'PASSWORD_MEMBER' => $this->hash($this->input->post('password')),
			'STATUS_MEMBER' => '1'
		), TRUE);
		
		if (count($user)) {
			// Log in user
			$data = array(
				'id' => $user->ID_MEMBER,
				'divisi' => $user->ID_DIVISI,
			    'kelompok' => 2,
				'loggedin_member' => TRUE,
			);
			$this->session->set_userdata($data);
		}
	}

	public function logout ()
	{
		$this->session->sess_destroy();
	}

	public function loggedin_member ()
	{
		return (bool) $this->session->userdata('loggedin_member');
	}

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
}