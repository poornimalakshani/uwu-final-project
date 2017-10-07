<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grade5result_model extends MY_Model {

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

     public function filterscholarshipGranter(){
              $this->db->select( "p.id, p.fullName, i.income");
        $this->db->where("i.income < 4500 AND gs.result =334");

        $this->db->join('income i', 'p.id = i.people_id', 'LEFT');
        $this->db->join('grade5result gs', 'p.id = gs.people_id', 'INNER');
        

        $query = $this->db->get('people p');

        $result = $query->result();

        return $result;
    }

}