<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends MY_Model {

	public function __construct(){
		parent::__construct();
	}

	public function login($username,$password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));

		$query = $this->db->get('admin');

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return FALSE;
		}
	}
}
?>