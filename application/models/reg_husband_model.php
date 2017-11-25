<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reg_husband_model extends MY_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getMaleListOfHome($homeId)
	{
		$this->db->select('*, people.id AS peopleId, people.home_id AS peopleHomeId');
		$this->db->where('home_id', $homeId);
		$this->db->where('gender', 1);

		$this->db->join('reg_husband', 'reg_husband.people_id = people.id', 'left');

		$result = $this->db->get('people');

		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;
	}
}