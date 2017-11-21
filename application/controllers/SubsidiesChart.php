<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class SubsidiesChart extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Subsidies_chart_model');

		// $this->load->library('form_validation');

		$this->load->helper('string');
	}

	public function index()
	{
		$data['menu'] = "charts";
		$data['submenu'] = "charts-Subsidies_Chart_view";
		$this->load->view('Chart/Subsidies_Chart_view', $data);
	}

	public function getdata()
	{
		$data = $this->Subsidies_chart_model->sub_granters();

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
					"v" => "Subsidies Granters",
					"f" => null
				) ,
				array(
					"v" => (int)$cd->count,
					"f" => null
				)
			);
			
            $data = $this->Subsidies_chart_model->non_sub_granters();

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
						"v" => "Non Subsidies Granters",
						"f" => null
					) ,
					array(
						"v" => (int)$cd->non_subsidies_granters,
						"f" => null
					)
				);
			}

			echo json_encode($responce);
		}
	}
}