<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('income_model');
    }


	public function index()
	{

		$data['field_list'] = $this->income_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');
        $this->form_validation->set_rules('income','Income','trim|required');
		$this->form_validation->set_rules('people_id','People Id','trim|required');
		$this->form_validation->set_rules('people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'income' => $this->input->post('income'), 
				'people_id' => $this->input->post('people_id'), 
				'people_home_id' => $this->input->post('people_home_id')
				];
			
			$income = $this->income_model->insert('income', $insert);

			redirect('/grama_niladhari/income');
			
		}

		$data['income'] = $this->income_model->getAll('income');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-income";
		$this->load->view('income/income_view', $data);

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