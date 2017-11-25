<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class about_children_model extends MY_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getWifesWithChildren($homeId)
	{
		$this->db->select('*, people.id AS peopleId, people.home_id AS peopleHomeId, reg_wife.id AS regWifeId, about_children.id AS aboutChildrenId');
		$this->db->where('home_id', $homeId);
		$this->db->where('gender', 2);

		$this->db->join('reg_wife', 'reg_wife.people_id = people.id', 'left');
		$this->db->join('about_children', 'about_children.reg_wife_id = reg_wife.id', 'left');

		$result = $this->db->get('people');

		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;
	}
}