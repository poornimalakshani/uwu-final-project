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
		//Missed the `SELECT`
        $subsidiesCount = '(SELECT COUNT(*) from government_subsidies)';
        $peopleCount = '(SELECT COUNT(*) from home)';

        $query =$this->db->query("SELECT ({$subsidiesCount}/{$peopleCount})*100 As percentage");

        

      //  $subsidiesCount = 'select count(
    //(SELECT s.id FROM ( SELECT h.*, SUM(i.income) AS income FROM people AS p INNER JOIN `home` h ON (h.id = p.home_id) LEFT JOIN income i ON p.id = i.people_id WHERE p.living_status = 5 GROUP BY h.id) AS s WHERE s.income <= 3000 )';
        //$peopleCount = '(SELECT COUNT(*) from home)';

       //$query =$this->db->query("SELECT ({$subsidiesCount}/{$peopleCount}) * 100 as percentage)");
        
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

    public function filterAverageIncome(){
        $avgIncome = "avg (income) as income from income";
        $query =$this->db->query("SELECT {$avgIncome}");
        
        $result = $query->result();

        return $result;
    }

}