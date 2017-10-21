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

      $Count = "(SELECT s.id FROM ( SELECT h.*, SUM(i.income) AS income FROM people AS p INNER JOIN `home` h ON (h.id = p.home_id) LEFT JOIN income i ON p.id = i.people_id WHERE p.living_status = 5 GROUP BY h.id) AS s WHERE s.income <= 3000 )";
        
       $query =$this->db->query("SELECT COUNT({$Count}) as Samurdgi granters");
        
        $result = $query->result();

        return $result; 
        //return $this->db->get('Fruits')->result(); 
    } 
}