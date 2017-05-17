<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg_child extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('reg_child_model');
    }


	public function index()
	{
		//$data = array();
		//$this->load->model('reg_child_model');
		$data['field_list'] = $this->reg_child_model->getCategory();

		
		$this->form_validation->set_rules('birth_weight','Birth Weight','trim|required');
		$this->form_validation->set_rules('length_at_birth','Length at Birth','trim|required');
		$this->form_validation->set_rules('size_of_head_at_birth','Size of Head at Birth','trim|required');
		$this->form_validation->set_rules('health_condition','Health Condition','callback_validate_dropdown');
		$this->form_validation->set_rules('reg_wife_id','Wife Registration Id','trim|required');
		$this->form_validation->set_rules('reg_wife_people_id','People_Id','trim|required');
		$this->form_validation->set_rules('reg_wife_people_home_id','Home_Id','trim|required');
		$this->form_validation->set_rules('people_id','People_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				
				'birth_weight' => $this->input->post('birth_weight'), 
				'length_at_birth' => $this->input->post('length_at_birth'),
				'size_of_head_at_birth' => $this->input->post('size_of_head_at_birth'),
				'health_condition' => $this->input->post('health_condition'),
				'reg_wife_id' => $this->input->post('reg_wife_id'),
				'reg_wife_people_id' => $this->input->post('reg_wife_people_id'),
				'reg_wife_people_home_id' => $this->input->post('reg_wife_people_home_id'),
				'people_id' => $this->input->post('people_id')
			];
			
			$reg_child = $this->reg_child_model->insert('reg_child', $insert);

			redirect('/midwife/reg_child');
			
		}

		$data['reg_child'] = $this->reg_child_model->getAll('reg_child');

		$this->load->view('reg_child/reg_child_view', $data);

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