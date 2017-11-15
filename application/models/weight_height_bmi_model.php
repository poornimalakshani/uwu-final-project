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
        $this->db->select( " p.fullName");
        $this->db->where("(w.age_duration = 100 and 3.4< w.weight <4.8) or 
            (w.age_duration = 101 and 4.8< w.weight <5.8) or 
            (w.age_duration = 102 and 5.2< w.weight <6.6) or 
            (w.age_duration = 103 and 5.7< w.weight <7.3) or 
            (w.age_duration = 104 and 6.0< w.weight <7.8) or 
            (w.age_duration = 105 and 6.5< w.weight <8.2) or 
            (w.age_duration = 106 and 6.8< w.weight <8.6) or 
            (w.age_duration = 107 and 7.0< w.weight <9.0) or 
            (w.age_duration = 108 and 7.3< w.weight <9.3) or
             (w.age_duration = 109 and 7.5< w.weight <9.5) or 
            (w.age_duration = 110 and 7.8< w.weight <9.8) or
             (w.age_duration = 111 and 8.0< w.weight <10.0) or 
            (w.age_duration = 114 and 8.5< w.weight <10.8) or 
            (w.age_duration = 117 and 9.0< w.weight <11.5) or 
            (w.age_duration = 120 and 9.6< w.weight <12.4) or 
            (w.age_duration = 123 and 10.2< w.weight <13.0)");

        $this->db->join('reg_child r', 'w.reg_child_id = r.id', 'INNER');
        $this->db->join('people p', 'r.people_id = p.id', 'INNER');
        

        $query = $this->db->get('weight_height_bmi w');

        $result = $query->result();

        return $result;
    }

}