<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class OurChart extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Our_chart_model');

		// $this->load->library('form_validation');

		$this->load->helper('string');
	}

	public function index()
	{
		$data['menu'] = "charts";
		$data['submenu'] = "charts-Chart_view";
		$this->load->view('Chart/Chart_view', $data);
	}

	public function getdata()
	{
		$data = $this->Our_chart_model->get_samurdhi();

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
					"v" => "Get Samurdhi",
					"f" => null
				) ,
				array(
					"v" => (int)$cd->samurdhi_granters,
					"f" => null
				)
			);
			
            $data = $this->Our_chart_model->not_get_samurdhi();

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
						"v" => "Not Get Samurdhi",
						"f" => null
					) ,
					array(
						"v" => (int)$cd->non_samurdhi_granters,
						"f" => null
					)
				);
			}

			echo json_encode($responce);
		}
	}
}