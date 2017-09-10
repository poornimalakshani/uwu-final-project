<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_model extends MY_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getHomeLocation($limit = 10){
		$this->db->limit($limit);

		$result = $this->db->get("home");

		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;

	}

}