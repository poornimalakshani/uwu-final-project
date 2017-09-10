<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital_admissions extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('hospital_admissions_model');
    }


	public function index()
	{

		$data['field_list'] = $this->hospital_admissions_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('reason','Reason for Hospital Admission','trim|required');
		$this->form_validation->set_rules('date','Date','trim|required');
		$this->form_validation->set_rules('reg_child_id','Child Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_id','Mother Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_id','Mother People Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'reason' => $this->input->post('reason'), 
				'date' => $this->input->post('date'),
				'reg_child_id' => $this->input->post('reg_child_id'),
				'reg_child_reg_wife_id' => $this->input->post('reg_child_reg_wife_id'),
				'reg_child_reg_wife_people_id' => $this->input->post('reg_child_reg_wife_people_id'),
				'reg_child_reg_wife_people_home_id' => $this->input->post('reg_child_reg_wife_people_home_id')
				];
			
			$hospital_admissions = $this->hospital_admissions_model->insert('hospital_admissions', $insert);

			redirect('/midwife/hospital_admissions');
			
		}

		$data['hospital_admissions'] = $this->hospital_admissions_model->getAll('hospital_admissions');

		$this->load->view('hospital_admissions/hospital_admissions_view', $data);

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