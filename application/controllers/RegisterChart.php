<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class RegisterChart extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Register_chart_model');

		// $this->load->library('form_validation');

		$this->load->helper('string');
	}

	public function index()
	{
		$data['menu'] = "charts";
		$data['submenu'] = "charts-Register_Chart_view";
		$this->load->view('Chart/Register_Chart_view', $data);
	}

	public function getdata()
	{
		$data = $this->Register_chart_model->get_election();

		//data to json
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
		
        foreach($data as $cd) {
			$responce->rows[]["c"] = array(
				array(
					"v" => "Get Election",
					"f" => null
				) ,
				array(
					"v" => (int)$cd->have_get_election,
					"f" => null
				)
			);
			
            $data = $this->Register_chart_model->not_get_election();

			//data to json
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
            
			foreach($data as $cd) {
				$responce->rows[]["c"] = array(
					array(
						"v" => "Not Get Election",
						"f" => null
					) ,
					array(
						"v" => (int)$cd->heve_not_get_election,
						"f" => null
					)
				);
			}

			echo json_encode($responce);
		}
	}
}