<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toilet_facilities extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('toilet_facilities_model');
    }


	public function index()
	{

		$data['field_list'] = $this->toilet_facilities_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');
		
		$this->form_validation->set_rules('type','Toilet Type','callback_validate_dropdown');
		$this->form_validation->set_rules('home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'), 
				'home_id' => $this->input->post('home_id')
			];
			
			$toilet_facilities = $this->toilet_facilities_model->insert('toilet_facilities', $insert);

			redirect('/grama_niladhari/toilet_facilities');
			
		}

		$data['toilet_facilities'] = $this->toilet_facilities_model->getAll('toilet_facilities');

		$this->load->view('toilet_facilities/toilet_facilities_view', $data);

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