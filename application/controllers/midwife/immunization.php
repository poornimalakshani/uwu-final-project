<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Immunization extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('immunization_model');
    }


	public function index()
	{

		$data['field_list'] = $this->immunization_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('age','Age','callback_validate_dropdown');
		$this->form_validation->set_rules('type_of_vaccine','Vaccine Type','callback_validate_dropdown');
		$this->form_validation->set_rules('date','Date','trim|required');
		$this->form_validation->set_rules('batch_no','Batch No','trim|required');
		$this->form_validation->set_rules('reg_child_id','Child Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_id','Mother Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_id','Mother People Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'age' => $this->input->post('age'), 
				'type_of_vaccine' => $this->input->post('type_of_vaccine'), 
				'date' => $this->input->post('date'),
				'batch_no' => $this->input->post('batch_no'),
				'reg_child_id' => $this->input->post('reg_child_id'),
				'reg_child_reg_wife_id' => $this->input->post('reg_child_reg_wife_id'),
				'reg_child_reg_wife_people_id' => $this->input->post('reg_child_reg_wife_people_id'),
				'reg_child_reg_wife_people_home_id' => $this->input->post('reg_child_reg_wife_people_home_id')
				];
			
			$immunization = $this->immunization_model->insert('immunization', $insert);

			redirect('/midwife/immunization');
			
		}

		$data['immunization'] = $this->immunization_model->getAll('immunization');

		$data['menu'] = "midwife";
		$data['submenu'] = "midwife-immunization";
		$this->load->view('immunization/immunization_view', $data);

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