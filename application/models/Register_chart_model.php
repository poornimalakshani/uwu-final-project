 <?php 
class Register_chart_model extends CI_Model 
{ 
    function __construct() 
    { 
        parent::__construct(); 
    } 
    //get fruts data 
    public function get_election() 
    {

        $participatersCount = "(SELECT count(p.id)FROM people p WHERE DATEDIFF(CURRENT_DATE, p.dateOfBirth)/365 >=18 AND P.register_on_electroral_registry = 81 AND p.living_status = 5)";
        $peopleCount = "(select count(id) from people)";

       $query =$this->db->query("SELECT ({$participatersCount}/{$peopleCount}) * 100 as have_get_election");
        
        $result = $query->result();

        return $result;
    } 

    public function not_get_election() 
    {

      $participatersCount = "(SELECT count(p.id)FROM people p WHERE DATEDIFF(CURRENT_DATE, p.dateOfBirth)/365 < 18 AND  p.living_status = 5)";
        $peopleCount = "(select count(id) from people)";

       $query =$this->db->query("SELECT ({$participatersCount}/{$peopleCount}) * 100 as heve_not_get_election");
        
        $result = $query->result();

        return $result;
        //return $this->db->get('Fruits')->result(); 
    } 
}