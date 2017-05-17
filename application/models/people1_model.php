<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class people1_model extends MY_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getCategory()
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

    public function filterSocialServiceGranters(){
        $age = "(DATEDIFF('".date('Y-m-d')."', STR_TO_DATE(p.dateOfBirth, '%Y-%m-%d'))/365)";
        $this->db->select("*, ({$age}) AS ageInYears");
        $this->db->where("({$age}) > 70");

        $query = $this->db->get('people p');
        $result = $query->result();

        return $result;
    }

    public function filterNewlyRegisterPeople(){
        $age = "(DATEDIFF('".date('Y-m-d')."', STR_TO_DATE(p.dateOfBirth, '%Y-%m-%d'))/365)";
        $this->db->select("*, ({$age}) AS ageInYears");
        $this->db->where("({$age}) > 18");
        $this->db->where("living_status", 5);//living_status 5 when particular person is live 

        $query = $this->db->get('people p');
        $result = $query->result();

        return $result;
    }

}