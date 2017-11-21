<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class MalnutritionChart extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Malnutrition_chart_model');

		// $this->load->library('form_validation');

		$this->load->helper('string');
	}

	public function index()
	{
		$data['menu'] = "charts";
		$data['submenu'] = "charts-Malnutrition_Chart_view";
		$this->load->view('Chart/Malnutrition_Chart_view', $data);
	}

	public function getdata()
	{
		$data = $this->Malnutrition_chart_model->get_normal_weight();

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
					"v" => "Get Normal Weight",
					"f" => null
				) ,
				array(
					"v" => (int)$cd->normal_weight_children,
					"f" => null
				)
			);
			
            $data = $this->Malnutrition_chart_model->get_risk_weight();

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
						"v" => "Get Risk Weight",
						"f" => null
					) ,
					array(
						"v" => (int)$cd->risk_weight_children,
						"f" => null
					)
				);

				$data = $this->Malnutrition_chart_model->get_malnutrition();

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
						"v" => "Get Malnutrition",
						"f" => null
					) ,
					array(
						"v" => (int)$cd->malnutrition_children,
						"f" => null
					)
				);
			}

			echo json_encode($responce);
		}
	}
}

}