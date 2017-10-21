<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class government_subsidies_model extends MY_Model {

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

    public function filterSubsidiesGrantersPercentage(){
        
       $subsidiesCount = "(select count(id) from government_subsidies)";
        $peopleCount = "(select count(id) from home)";

        $query =$this->db->query("SELECT ({$subsidiesCount}/{$peopleCount})*100 As percentage");

        
        $result = $query->result();

        return $result;
 }
   

}