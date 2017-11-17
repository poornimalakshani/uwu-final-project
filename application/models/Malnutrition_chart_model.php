 <?php 
class Malnutrition_chart_model extends CI_Model 
{ 
    function __construct() 
    { 
        parent::__construct(); 
    } 
    //get fruts data 
    public function get_normal_weight() 
    {

        $normalWeightCount = "(select count(distinct w.reg_child_id) from weight_height_bmi w inner join reg_child r on w.reg_child_id = r.id inner join people p on r.people_id = p.id where (w.age_duration = 100 and 3.4< w.weight <4.8) or (w.age_duration = 101 and 4.8< w.weight <5.8) or (w.age_duration = 102 and 5.2< w.weight <6.6) or (w.age_duration = 103 and 5.7< w.weight <7.3) or (w.age_duration = 104 and 6< w.weight <7.8) or (w.age_duration = 105 and 6.5< w.weight <8.2) or (w.age_duration = 106 and 6.8< w.weight <8.6) or (w.age_duration = 107 and 7< w.weight <9) or (w.age_duration = 108 and 7.3< w.weight <9.3) or (w.age_duration = 109 and 7.5< w.weight <9.5) or (w.age_duration = 110 and 7.8< w.weight <9.8) or (w.age_duration = 111 and 8< w.weight <10) or (w.age_duration = 114 and 8.5< w.weight <10.8) or (w.age_duration = 117 and 9< w.weight <11.5) or (w.age_duration = 120 and 9.6< w.weight <12.4) or (w.age_duration = 123 and 10.2< w.weight <13))";

        $childrenCount = "(select count(distinct reg_child_id) from weight_height_bmi )";

       $query =$this->db->query("SELECT ({$normalWeightCount}/{$childrenCount}) * 100 as normal_weight_children");
        
        $result = $query->result();

        return $result;
    } 

    public function get_risk_weight() 
    {

      $riskWeightCount = "(select count(distinct w.reg_child_id) from weight_height_bmi w inner join reg_child r on w.reg_child_id = r.id inner join people p on r.people_id = p.id where (w.age_duration = 100 and 3.2< w.weight <3.5) and (w.age_duration = 101 and 4< w.weight <4.5) and (w.age_duration = 102 and 4.5< w.weight <5.2) and (w.age_duration = 103 and 5< w.weight <5.6) and (w.age_duration = 104 and 5.4< w.weight <6.0) and (w.age_duration = 105 and 5.7< w.weight <6.4) and (w.age_duration = 106 and 6< w.weight <6.8) and (w.age_duration = 107 and 6.2< w.weight <7) and (w.age_duration = 108 and 6.5< w.weight <7.3) and (w.age_duration = 109 and 6.6< w.weight <7.5) and (w.age_duration = 110 and 6.8< w.weight <7.8) and (w.age_duration = 111 and 7< w.weight <8) and (w.age_duration = 114 and 7.5< w.weight <8.5) and (w.age_duration = 117 and 8< w.weight <9) and (w.age_duration = 120 and 8.5< w.weight <9.5) and (w.age_duration = 123 and 9< w.weight <10))";

        $childrenCount = "(select count(distinct reg_child_id) from weight_height_bmi)";

       $query =$this->db->query("SELECT ({$riskWeightCount}/{$childrenCount}) * 100 as risk_weight_children");
        
        $result = $query->result();

        return $result;
       
    } 

    public function get_malnutrition() 
    {

      $malnutritionCount = "(select count(distinct w.reg_child_id) from weight_height_bmi w inner join reg_child r on w.reg_child_id = r.id inner join people p on r.people_id = p.id where (w.age_duration = 100 and 2.7< w.weight <3) and (w.age_duration = 101 and 3.5< w.weight <3.9) and (w.age_duration = 102 and 4< w.weight <4.5) and (w.age_duration = 103 and 4.5< w.weight <5) and (w.age_duration = 104 and 4.8< w.weight <5.3) and (w.age_duration = 105 and 5.1< w.weight <5.7) and (w.age_duration = 106 and 5.4< w.weight <6) and (w.age_duration = 107 and 5.6< w.weight <6.2) and (w.age_duration = 108 and 5.7< w.weight <6.5) and (w.age_duration = 109 and 6< w.weight <6.6) and (w.age_duration = 110 and 6.2< w.weight <6.8) and (w.age_duration = 111 and 6.3< w.weight <7) and (w.age_duration = 114 and 6.8< w.weight <7.4) and (w.age_duration = 117 and 7.2< w.weight <8) and (w.age_duration = 120 and 7.6< w.weight <8.5) and (w.age_duration = 123 and 8< w.weight <9))";

        $childrenCount = "(select count(distinct reg_child_id) from weight_height_bmi)";

       $query =$this->db->query("SELECT ({$malnutritionCount}/{$childrenCount}) * 100 as malnutrition_children");
        
        $result = $query->result();

        return $result;
        //return $this->db->get('Fruits')->result(); 
    } 
}