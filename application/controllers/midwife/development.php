<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Development extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('development_model');
    }


	public function index()
	{

		$data['field_list'] = $this->development_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('age','Age','callback_validate_dropdown');
		$this->form_validation->set_rules('criterian','Criterian','callback_validate_dropdown');
		$this->form_validation->set_rules('recommended_date','Recommended Date','trim');
		$this->form_validation->set_rules('reg_child_id','Child Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_id','Mother Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_id','Mother People Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_home_id','Home_Id','trim|required');
		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'age' => $this->input->post('age'), 
				'criterian' => $this->input->post('criterian'), 
				'recommended_date' => $this->input->post('recommended_date'), 
				'reg_child_id' => $this->input->post('reg_child_id'),
				'reg_child_reg_wife_id' => $this->input->post('reg_child_reg_wife_id'),
				'reg_child_reg_wife_people_id' => $this->input->post('reg_child_reg_wife_people_id'),
				'reg_child_reg_wife_people_home_id' => $this->input->post('reg_child_reg_wife_people_home_id')
			];
			
			$development = $this->development_model->insert('development', $insert);

			redirect('/midwife/development');
			
		}

		$data['development'] = $this->development_model->getAll('development');

		$this->load->view('development/development_view', $data);

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