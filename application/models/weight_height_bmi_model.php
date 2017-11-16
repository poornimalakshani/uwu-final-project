<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class weight_height_bmi_model extends MY_Model {

	public function __construct(){
		parent::__construct();
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

     public function filterNormalWeightChildren(){
        $this->db->select( "p.fullName");
        $this->db->where("(w.age_duration = 100 AND (w.weight BETWEEN 3.4 AND 4.8))");
				$this->db->or_where("(w.age_duration = 101 AND (w.weight BETWEEN 4.8 AND 5.8))");
				$this->db->or_where("(w.age_duration = 102 AND (w.weight BETWEEN 5.2 AND 6.6))");
				$this->db->or_where("(w.age_duration = 103 AND (w.weight BETWEEN 5.7 AND 7.3))");
				$this->db->or_where("(w.age_duration = 104 AND (w.weight BETWEEN 6 AND 7.8))");
				$this->db->or_where("(w.age_duration = 105 AND (w.weight BETWEEN 6.5 AND 8.2))");
				$this->db->or_where("(w.age_duration = 106 AND (w.weight BETWEEN 6.8 AND 8.6))");
				$this->db->or_where("(w.age_duration = 107 AND (w.weight BETWEEN 7 AND 9))");
				$this->db->or_where("(w.age_duration = 108 AND (w.weight BETWEEN 7.3 AND 9.3))");
				$this->db->or_where("(w.age_duration = 109 AND (w.weight BETWEEN 7.5 AND 9.5))");
				$this->db->or_where("(w.age_duration = 110 AND (w.weight BETWEEN 7.8 AND 9.8))");
				$this->db->or_where("(w.age_duration = 111 AND (w.weight BETWEEN 8 AND 10))");
				$this->db->or_where("(w.age_duration = 114 AND (w.weight BETWEEN 8.5 AND 10.8))");
				$this->db->or_where("(w.age_duration = 117 AND (w.weight BETWEEN 9 AND 11.5))");
				$this->db->or_where("(w.age_duration = 120 AND (w.weight BETWEEN 9.6 AND 12.4))");
				$this->db->or_where("(w.age_duration = 123 AND (w.weight BETWEEN 10.2 AND 13))");

        $this->db->join('reg_child r', 'w.reg_child_id = r.id', 'INNER');
        $this->db->join('people p', 'r.people_id = p.id', 'INNER');

				$this->db->group_by('p.fullName');
				
        $query = $this->db->get('weight_height_bmi w');

        $result = $query->result();

        return $result;
    }

}
