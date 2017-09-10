<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institutes extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('institutes_model');
    }


	public function index()
	{

		$data['field_list'] = $this->institutes_model->getCategory();
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
			
			$institutes = $this->institutes_model->insert('institutes', $insert);

			redirect('/grama_niladhari/institutes');
			
		}

		$data['institutes'] = $this->institutes_model->getAll('institutes');

		$this->load->view('institutes/institutes_view', $data);

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