<?php 
 
if (!defined('BASEPATH')) exit('No direct script access allowed'); 
class Our_Chart extends CI_Controller 
 
    { 
    function __construct() 
        { 
        parent::__construct(); 
        $this->load->model('Our_chart_model'); 
 
        // $this->load->library('form_validation'); 
 
        $this->load->helper('string'); 
        } 
 
    public 
 
    function index() 
        { 
        $this->load->view('Chart_view'); 
        } 
 
    public 
 
    function getdata() 
        { 
        $data = $this->Our_chart_model->get_samurdhi(); 
 
        //         //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Topping", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
            $responce->rows[]["c"] = array( 
                array( 
                    "v" => "$cd->Samurdhi Granters", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd->count, 
                    "f" => null 
                ) 
            ); 

            $data = $this->Our_chart_model->not_get_samurdhi(); 
 
        //         //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Topping", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
            $responce->rows[]["c"] = array( 
                array( 
                    "v" => "$cd->Non Samurdhi Granters", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd->count, 
                    "f" => null 
                ) 
            ); 
            } 
 
        echo json_encode($responce); 
        } 

       
    }