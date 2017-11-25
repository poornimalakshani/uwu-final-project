<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class about_pregnancy_model extends MY_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getWifesWithPregnancy($homeId)
	{
		$this->db->select('*, people.id AS peopleId, people.home_id AS peopleHomeId, reg_wife.id AS regWifeId, about_pregnancy.id AS aboutPregnancyId');
		$this->db->where('home_id', $homeId);
		$this->db->where('gender', 2);

		$this->db->join('reg_wife', 'reg_wife.people_id = people.id', 'left');
		$this->db->join('about_pregnancy', 'about_pregnancy.reg_wife_id = reg_wife.id', 'left');

		$result = $this->db->get('people');

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