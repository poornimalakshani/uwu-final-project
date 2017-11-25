<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reg_child_model extends MY_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getChildOfRegWife($regWifeId)
	{
		$this->db->select('*, people.id AS peopleId, people.home_id AS peopleHomeId, reg_child.id AS regChildId, reg_child.reg_wife_id AS regWifeId');
		$this->db->where('reg_wife_id', $regWifeId);

		$this->db->join('people', 'reg_child.people_id = people.id', 'left');

		$result = $this->db->get('reg_child');

		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;
	}

	public function getChildOfHome($homeId)
	{
		$this->db->select('*, people.id AS peopleId, people.home_id AS peopleHomeId, reg_child.id AS regChildId, reg_child.reg_wife_id AS regWifeId');
		$this->db->where('reg_wife_people_home_id', $homeId);

		$this->db->join('people', 'reg_child.people_id = people.id', 'left');

		$result = $this->db->get('reg_child');

		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;
	}

	function getCategory()
    {
        $query = $this->db->get('list_field');
        $result = $query->result();

        $id = array('-CHOOSE-');
        $field = array('-CHOOSE-');
        
        for ($i = 0; $i < count($result); $i++)
        {
            array_push($id, $result[$i]->id);
            array_push($field, $result[$i]->field);
        }
        return array_combine($id, $field);
    }

}