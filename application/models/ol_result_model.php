<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ol_result_model extends MY_Model {

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

     public function filterAforMaths(){
        $this->db->select( "ol.people_id, p.fullName");
        $this->db->where("ey.examtype = 331 and ey.year = year(curdate()) and ol.subject = 273 and ol.result = 'A' ");

        $this->db->join('examyears ey', 'ol.people_id = ey.people_id', 'INNER');
        $this->db->join('people p', 'p.id = ol.people_id', 'INNER');
        

        $query = $this->db->get('ol_result ol');

        $result = $query->result();

        return $result;
    }

}