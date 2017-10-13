<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class income_model extends MY_Model {

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

    public function filterSamurdhiGranters(){
        $incomeCount = '(SELECT sum(i.income) FROM income i WHERE i.people_home_id = h.id)';

        $this->db->select("*, ({$incomeCount}) AS income");
        $this->db->where("({$incomeCount}) < 3000");

        $query = $this->db->get('home h');
        $result = $query->result();

        return $result;
    }

     public function filterSamurdhiGranterPersentage(){
            $subsidiesCount = '(COUNT(*) from government_subsidies )';
        $peopleCount = '( COUNT(*) from home)';

        $query =$this->db->select("({$subsidiesCount}/{$peopleCount})*100 As Percentage");
        
        
        //$query = $this->db->get('home h');
        $result = $query->result();

        return $result;
 }

   public function filterNonSamurdhiGranters(){
        $incomeCount = '(SELECT sum(i.income) FROM income i WHERE i.people_home_id = h.id)';

        $this->db->select("*, ({$incomeCount}) AS income");
        $this->db->where("({$incomeCount}) > 3000");

        $query = $this->db->get('home h');
        $result = $query->result();

        return $result;
    }

}