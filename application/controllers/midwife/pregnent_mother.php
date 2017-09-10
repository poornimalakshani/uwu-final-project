<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pregnent_mother extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('pregnent_mother_model');
    }


	public function index()
	{

		$data['field_list'] = $this->pregnent_mother_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('weight','Weight','trim|required');
		$this->form_validation->set_rules('pressuer','Pressure','trim|required');
		$this->form_validation->set_rules('suger_level','Suger Level','trim|required');
		$this->form_validation->set_rules('reg_wife_id','Mother Id','trim|required');
		$this->form_validation->set_rules('reg_wife_people_id','People Id','trim|required');
		$this->form_validation->set_rules('reg_wife_people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'weight' => $this->input->post('weight'), 
				'pressuer' => $this->input->post('pressuer'), 
				'suger_level' => $this->input->post('suger_level'), 
				'reg_wife_id' => $this->input->post('reg_wife_id'), 
				'reg_wife_people_id' => $this->input->post('reg_wife_people_id'), 
				'reg_wife_people_home_id' => $this->input->post('reg_wife_people_home_id')
				];
			
			$pregnent_mother = $this->pregnent_mother_model->insert('pregnent_mother', $insert);

			redirect('/midwife/pregnent_mother');
			
		}

		$data['pregnent_mother'] = $this->pregnent_mother_model->getAll('pregnent_mother');

		$this->load->view('pregnent_mother/pregnent_mother_view', $data);

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