<?php

class age_chart_model extends CI_Model {

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
        $this->db->select("'Children' as category, count(*) as count");
        $this->db->where("DATEDIFF(now(), STR_TO_DATE(p.dateOfBirth, '%Y-%m-%d'))/365 < 5 ");
         $this->db->get('people p');
         $query1 = $this->db->last_query();

        $this->db->select("'School Children' as category, count(*) as count");
        $this->db->where("DATEDIFF(now(), STR_TO_DATE(p.dateOfBirth, '%Y-%m-%d'))/365 between 5 and 19 ");
         $this->db->get('people p');
         $query2 = $this->db->last_query();

          $this->db->select("'Youth' as category, count(*) as count");
        $this->db->where("DATEDIFF(now(), STR_TO_DATE(p.dateOfBirth, '%Y-%m-%d'))/365 between 19 and 30 ");
         $this->db->get('people p');
         $query3 = $this->db->last_query();

          $this->db->select("'Middle Age' as category, count(*) as count");
        $this->db->where("DATEDIFF(now(), STR_TO_DATE(p.dateOfBirth, '%Y-%m-%d'))/365 between 30 and 60 ");
         $this->db->get('people p');
         $query4 = $this->db->last_query();

          $this->db->select("'Senior Citizen' as category, count(*) as count");
        $this->db->where("DATEDIFF(now(), STR_TO_DATE(p.dateOfBirth, '%Y-%m-%d'))/365 > 60 ");
         $this->db->get('people p');
         $query5 = $this->db->last_query();

        $query = $this->db->query($query1." UNION ".$query2." UNION ".$query3." UNION ".$query4." UNION ".$query5);

    return $query->result();

    }
}
