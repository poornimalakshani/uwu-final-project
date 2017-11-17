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
        $this->db->select( "p.fullName, p.home_id");
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

    public function filterRiskToWeightChildren(){
        $this->db->select( "p.fullName, p.home_id");
        $this->db->where("(w.age_duration = 100 AND (w.weight BETWEEN 3.2 AND 3.5))");
                $this->db->or_where("(w.age_duration = 101 AND (w.weight BETWEEN 4 AND 4.5))");
                $this->db->or_where("(w.age_duration = 102 AND (w.weight BETWEEN 4.5 AND 5.2))");
                $this->db->or_where("(w.age_duration = 103 AND (w.weight BETWEEN 5 AND 5.6))");
                $this->db->or_where("(w.age_duration = 104 AND (w.weight BETWEEN 5.4 AND 6))");
                $this->db->or_where("(w.age_duration = 105 AND (w.weight BETWEEN 5.7 AND 6.4))");
                $this->db->or_where("(w.age_duration = 106 AND (w.weight BETWEEN 6 AND 6.8))");
                $this->db->or_where("(w.age_duration = 107 AND (w.weight BETWEEN 6.2 AND 7))");
                $this->db->or_where("(w.age_duration = 108 AND (w.weight BETWEEN 6.5 AND 7.3))");
                $this->db->or_where("(w.age_duration = 109 AND (w.weight BETWEEN 6.6 AND 7.5))");
                $this->db->or_where("(w.age_duration = 110 AND (w.weight BETWEEN 6.8 AND 7.8))");
                $this->db->or_where("(w.age_duration = 111 AND (w.weight BETWEEN 7 AND 8))");
                $this->db->or_where("(w.age_duration = 114 AND (w.weight BETWEEN 7.5 AND 8.5))");
                $this->db->or_where("(w.age_duration = 117 AND (w.weight BETWEEN 8 AND 9))");
                $this->db->or_where("(w.age_duration = 120 AND (w.weight BETWEEN 8.5 AND 9.5))");
                $this->db->or_where("(w.age_duration = 123 AND (w.weight BETWEEN 9 AND 10))");

        $this->db->join('reg_child r', 'w.reg_child_id = r.id', 'INNER');
        $this->db->join('people p', 'r.people_id = p.id', 'INNER');

                $this->db->group_by('p.fullName');
                
        $query = $this->db->get('weight_height_bmi w');

        $result = $query->result();

        return $result;
    }

    public function filterMalnutritionChildren(){
        $this->db->select( "p.fullName, p.home_id");
        $this->db->where("(w.age_duration = 100 AND (w.weight BETWEEN 3.7 AND 3))");
                $this->db->or_where("(w.age_duration = 101 AND (w.weight BETWEEN 3.5 AND 3.9))");
                $this->db->or_where("(w.age_duration = 102 AND (w.weight BETWEEN 4 AND 4.5))");
                $this->db->or_where("(w.age_duration = 103 AND (w.weight BETWEEN 4.5 AND 5.0))");
                $this->db->or_where("(w.age_duration = 104 AND (w.weight BETWEEN 4.8 AND 5.3))");
                $this->db->or_where("(w.age_duration = 105 AND (w.weight BETWEEN 5.1 AND 5.7))");
                $this->db->or_where("(w.age_duration = 106 AND (w.weight BETWEEN 5.4 AND 6))");
                $this->db->or_where("(w.age_duration = 107 AND (w.weight BETWEEN 5.6 AND 6.2))");
                $this->db->or_where("(w.age_duration = 108 AND (w.weight BETWEEN 5.7 AND 6.5))");
                $this->db->or_where("(w.age_duration = 109 AND (w.weight BETWEEN 6 AND 6.6))");
                $this->db->or_where("(w.age_duration = 110 AND (w.weight BETWEEN 6.2 AND 6.8))");
                $this->db->or_where("(w.age_duration = 111 AND (w.weight BETWEEN 6.3 AND 7))");
                $this->db->or_where("(w.age_duration = 114 AND (w.weight BETWEEN 6.8 AND 7.4))");
                $this->db->or_where("(w.age_duration = 117 AND (w.weight BETWEEN 7.2 AND 8))");
                $this->db->or_where("(w.age_duration = 120 AND (w.weight BETWEEN 7.6 AND 8.5))");
                $this->db->or_where("(w.age_duration = 123 AND (w.weight BETWEEN 8 AND 9))");

        $this->db->join('reg_child r', 'w.reg_child_id = r.id', 'INNER');
        $this->db->join('people p', 'r.people_id = p.id', 'INNER');

                $this->db->group_by('p.fullName');
                
        $query = $this->db->get('weight_height_bmi w');

        $result = $query->result();

        return $result;
    }

    public function filterMalnutritionPercentage(){
        
        $malnutritionChildrenCount = "(select count(distinct w.reg_child_id) from weight_height_bmi w inner join reg_child r on w.reg_child_id = r.id inner join people p on r.people_id = p.id where (w.age_duration = 100 and 2.7< w.weight <3) and (w.age_duration = 101 and 3.5< w.weight <3.9) and (w.age_duration = 102 and 4< w.weight <4.5) and (w.age_duration = 103 and 4.5< w.weight <5) and (w.age_duration = 104 and 4.8< w.weight <5.3) and (w.age_duration = 105 and 5.1< w.weight <5.7) and (w.age_duration = 106 and 5.4< w.weight <6) and (w.age_duration = 107 and 5.6< w.weight <6.2) and (w.age_duration = 108 and 5.7< w.weight <6.5) and (w.age_duration = 109 and 6< w.weight <6.6) and (w.age_duration = 110 and 6.2< w.weight <6.8) and (w.age_duration = 111 and 6.3< w.weight <7.0) and (w.age_duration = 114 and 6.8< w.weight <7.4) and (w.age_duration = 117 and 7.2< w.weight <8) and (w.age_duration = 120 and 7.6< w.weight <8.5) and (w.age_duration = 123 and 8< w.weight <9))";

        $childrenCount = "(select count(distinct reg_child_id) from weight_height_bmi)";

       $query =$this->db->query("SELECT ({$malnutritionChildrenCount}/{$childrenCount}) * 100 as percentage");
        
        $result = $query->result();

        return $result;
 }

}
