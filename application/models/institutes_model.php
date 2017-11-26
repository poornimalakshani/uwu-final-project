<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class institutes_model extends MY_Model {

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

	public function getShoolList()
	{
		$this->db->select('list_field.*');
		$this->db->join('list_field', 'list_field.id = institute_location.institute_type', 'inner');
		$result = $this->db->get('institute_location');

		if ($result->num_rows() > 0) {
			return $result->result();
		}

		return FALSE;
	}

}