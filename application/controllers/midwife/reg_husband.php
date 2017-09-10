<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg_husband extends MY_Controller {


	public function index()
	{
		$data = array();
		$this->load->model('reg_husband_model');

		$this->form_validation->set_rules('education_condition','Education Condition','trim|required');
		$this->form_validation->set_rules('age_in_marriage','Age in Marriage','trim|required');
		$this->form_validation->set_rules('people_id','People_Id','trim|required');
		$this->form_validation->set_rules('people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'education_condition' => $this->input->post('education_condition'), 
				'age_in_marriage' => $this->input->post('age_in_marriage'), 
				'people_id' => $this->input->post('people_id'),
				'people_home_id' => $this->input->post('people_home_id')
			];
			
			$reg_husband = $this->reg_husband_model->insert('reg_husband', $insert);

			redirect('/midwife/reg_husband');
			
		}

		$data['reg_husband'] = $this->reg_husband_model->getAll('reg_husband');

		$this->load->view('reg_husband/reg_husband_view', $data);

			}
		} 