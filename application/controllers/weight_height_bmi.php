<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weight_height_bmi extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('weight_height_bmi_model');
    }


	public function index()
	{

		$data['field_list'] = $this->weight_height_bmi_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('age_duration','Age','callback_validate_dropdown');
		$this->form_validation->set_rules('height','Height','trim');
		$this->form_validation->set_rules('weight','Weight','trim');
		$this->form_validation->set_rules('bmi','BMI','trim');
		$this->form_validation->set_rules('reg_child_id','Child Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_id','Mother Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_id','Mother People Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'age_duration' => $this->input->post('age_duration'), 
				'height' => $this->input->post( 'height'), 
				'weight' => $this->input->post('weight'), 
				'bmi' => $this->input->post('bmi'),
				'reg_child_id' => $this->input->post('reg_child_id'),
				'reg_child_reg_wife_id' => $this->input->post('reg_child_reg_wife_id'),
				'reg_child_reg_wife_people_id' => $this->input->post('reg_child_reg_wife_people_id'),
				'reg_child_reg_wife_people_home_id' => $this->input->post('reg_child_reg_wife_people_home_id')
			];
			
			$weight_height_bmi = $this->weight_height_bmi_model->insert('weight_height_bmi', $insert);

			redirect('/midwife/weight_height_bmi');
			
		}

		$data['weight_height_bmi'] = $this->weight_height_bmi_model->getAll('weight_height_bmi');

		$this->load->view('weight_height_bmi/weight_height_bmi_view', $data);

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