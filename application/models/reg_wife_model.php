<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reg_wife_model extends MY_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getFemaleListOfHome($homeId)
	{
		$this->db->select('*, people.id AS peopleId, people.home_id AS peopleHomeId');
		$this->db->where('home_id', $homeId);
		$this->db->where('gender', 2);

		$this->db->join('reg_wife', 'reg_wife.people_id = people.id', 'left');

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

    public function filterLowAgeMarriages(){
             $this->db->select( "p.fullName, rw.age_in_marriage");
        $this->db->where(" rw.age_in_marriage < 18 ");

        $this->db->join('people p', 'p.id = rw.people_id', 'INNER');
        

        $query = $this->db->get('reg_wife rw');

        $result = $query->result();

        return $result;
    }

}