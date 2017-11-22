<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicles extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('vehicles_model');
    }


	public function index()
	{

		$data['field_list'] = $this->vehicles_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('type','Vehicle Type','callback_validate_dropdown');
		$this->form_validation->set_rules('people_id','People Id','trim|required');
		$this->form_validation->set_rules('people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'), 
				'people_id' => $this->input->post('people_id'), 
				'people_home_id' => $this->input->post('people_home_id')
				];
			
			$vehicles = $this->vehicles_model->insert('vehicles', $insert);

			redirect('/grama_niladhari/vehicles');
			
		}

		$data['vehicles'] = $this->vehicles_model->getAll('vehicles');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-vehicles";
		$this->load->view('grama_niladhari/vehicles/vehicles_view', $data);

	}

	function validate_dropdown($str)
    {
        if ($str == '-CHOOSE-') {
            //$this->form_validation->set_message('validate_dropdown', 'Please choose a valid %s');
            return FALSE;
        } else {
            return TRUE;
        }
    }
} 