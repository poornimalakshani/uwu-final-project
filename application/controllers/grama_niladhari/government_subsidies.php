<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Government_subsidies extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('government_subsidies_model');
    }


	public function index()
	{

		$data['field_list'] = $this->government_subsidies_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');
		
		$this->form_validation->set_rules('type','Subsidies Type','callback_validate_dropdown');
		$this->form_validation->set_rules('home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'), 
				'home_id' => $this->input->post('home_id')
			];
			
			$government_subsidies = $this->government_subsidies_model->insert('government_subsidies', $insert);

			redirect('/grama_niladhari/government_subsidies');
			
		}

		$data['government_subsidies'] = $this->government_subsidies_model->getAll('government_subsidies');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-subsidies-type";
		$this->load->view('government_subsidies/government_subsidies_view', $data);

			}

			function validate_dropdown($str)
    {
        if ($str == '-CHOOSE-')
        {
            //$this->form_validation->set_message('validate_dropdown', 'Please choose a valid %s');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
		} 