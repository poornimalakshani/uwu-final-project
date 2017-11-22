<?php

class income_chart_model extends CI_Model {

    /**
     * @desc load  db
     */
    function __construct() {
        parent::__Construct();
        $this->db = $this->load->database('default', TRUE, TRUE);
    }

    /**
     * @desc: Get data from company_performance table
     * @return: Array()
     */
    function getdata(){
        $this->db->select("'Very Low Income' as category, count(*) as count");
        $this->db->where("income < 10000");
         $this->db->get('income');
         $query1 = $this->db->last_query();

        $this->db->select("'Low Income' as category, count(*) as count");
        $this->db->from("income");
        $this->db->where("income between 10000 and 20000");
       $this->db->get();
        $query2 = $this->db->last_query();

        $this->db->select("'Average Income' as category, count(*) as count");
        $this->db->from("income");
        $this->db->where("income between 20000 and 40000");
        $query = $this->db->get();
        $query3 = $this->db->last_query();

        $this->db->select("'High Income' as category, count(*) as count");
        $this->db->from("income");
        $this->db->where("income between 40000 and 50000");
        $query = $this->db->get();
        $query3 = $this->db->last_query();

        $this->db->select("'Very High Income' as category, count(*) as count");
        $this->db->from("income");
        $this->db->where("income > 500000");
        $query = $this->db->get();
        $query4 = $this->db->last_query();

        $query = $this->db->query($query1." UNION ".$query2. " UNION ".$query3." UNION ".$query4  );

    return $query->result();

    }
}
