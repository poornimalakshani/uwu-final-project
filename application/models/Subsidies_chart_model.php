 <?php 
class Subsidies_chart_model extends CI_Model 
{ 
    function __construct() 
    { 
        parent::__construct(); 
    } 
    //get fruts data 
    public function sub_granters() 
    {

       

       $query =$this->db->query("SELECT count(id) AS count from government_subsidies as subsidies_granters");
        
        $result = $query->result();

        return $result;
    } 

    public function non_sub_granters() 
    {

         $homeCount = "(select count(id) from home)";
        $peopleCount = "(select count(id) from government_subsidies)";

       $query =$this->db->query("SELECT ({$homeCount} - {$peopleCount}) as non_subsidies_granters");
        
        $result = $query->result();

        return $result;
      

       //$query =$this->db->query("SELECT ((select count(id) from home) - (select count(id) from government_subsidies) ) as non_subsidies_granters");
        
        //$result = $query->result();

        //return $result;
        //return $this->db->get('Fruits')->result(); 
    } 
}