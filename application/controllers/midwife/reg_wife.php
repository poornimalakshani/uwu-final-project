<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg_wife extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('reg_wife_model');
    }

	public function index()
	{
		//$data = array();
		//$this->load->model('reg_wife_model');

		$data['field_list'] = $this->reg_wife_model->getCategory();

		$this->form_validation->set_rules('education_condition','Education Condition','trim|required');
		$this->form_validation->set_rules('age_in_marriage','Age in Marriage','trim|required');
		$this->form_validation->set_rules('protected_on_rubella','Protected on Rubella','callback_validate_dropdown');
		$this->form_validation->set_rules('people_id','People_Id','trim|required');
		$this->form_validation->set_rules('people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'education_condition' => $this->input->post('education_condition'), 
				'age_in_marriage' => $this->input->post('age_in_marriage'), 
				'protected_on_rubella' => $this->input->post('protected_on_rubella'), 
				'people_id' => $this->input->post('people_id'),
				'people_home_id' => $this->input->post('people_home_id')
			];
			
			$reg_wife = $this->reg_wife_model->insert('reg_wife', $insert);

			redirect('/midwife/reg_wife');
			
		}

		$data['reg_wife'] = $this->reg_wife_model->getAll('reg_wife');

		$data['menu'] = "midwife";
		$data['submenu'] = "midwife-reg-wife";
		$this->load->view('midwife/reg_wife/reg_wife_view', $data);
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