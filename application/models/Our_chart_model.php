 <?php 
class Our_chart_model extends CI_Model 
{ 
    function __construct() 
    { 
        parent::__construct(); 
    } 
    //get fruts data 
    public function get_samurdhi() 
    {

       $Count = "(SELECT count(s.id) FROM ( SELECT h.*, SUM(i.income) AS income FROM people AS p INNER JOIN `home` h ON (h.id = p.home_id) LEFT JOIN income i ON p.id = i.people_id WHERE p.living_status = 5 GROUP BY h.id) AS s WHERE s.income <= 3000 )";
        
      $homeCount = "(select count(id) from home)";
      $query =$this->db->query("SELECT ({$Count}/{$homeCount}) * 100 as samurdhi_granters");
        
        $result = $query->result();

        return $result;
    } 

    public function not_get_samurdhi() 
    {

        $Count = "(SELECT count(s.id) FROM ( SELECT h.*, SUM(i.income) AS income FROM people AS p INNER JOIN `home` h ON (h.id = p.home_id) LEFT JOIN income i ON p.id = i.people_id WHERE p.living_status = 5 GROUP BY h.id) AS s WHERE s.income > 3000 )";
        
      $homeCount = "(select count(id) from home)";
      $query =$this->db->query("SELECT ({$Count}/{$homeCount}) * 100 as non_samurdhi_granters");
        
        $result = $query->result();

        return $result; 
    } 
}