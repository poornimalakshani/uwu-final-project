<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class After_schooling extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('after_schooling_model');
    }


	public function index()
	{

		$data['field_list'] = $this->after_schooling_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('age','Age','trim|required');
		$this->form_validation->set_rules('weight','Weight','trim|required');
		$this->form_validation->set_rules('height','Height','trim|required');
		$this->form_validation->set_rules('bmi','BMI','trim|required');
		$this->form_validation->set_rules('shorter','Shorter','callback_validate_dropdown');
		$this->form_validation->set_rules('slimness','Slimness','callback_validate_dropdown');
		$this->form_validation->set_rules('high_weight','High Weight','callback_validate_dropdown');
		$this->form_validation->set_rules('strabismus','Strabismus','callback_validate_dropdown');
		$this->form_validation->set_rules('vision','Vision','callback_validate_dropdown');
		$this->form_validation->set_rules('hear','Hear','callback_validate_dropdown');
		$this->form_validation->set_rules('speaking','Speaking','callback_validate_dropdown');
		$this->form_validation->set_rules('dental_defects','Dental Defects','callback_validate_dropdown');
		$this->form_validation->set_rules('florosiya','Florosiya','callback_validate_dropdown');
		$this->form_validation->set_rules('goitre','Goitre','callback_validate_dropdown');
		$this->form_validation->set_rules('bone_defects','Bone Defects','callback_validate_dropdown');
		$this->form_validation->set_rules('heart','Heart','callback_validate_dropdown');
		$this->form_validation->set_rules('lungs','Lungs','callback_validate_dropdown');
		$this->form_validation->set_rules('reg_child_id','Child Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_id','Mother Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_id','Mother People Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'age' => $this->input->post('age'), 
				'weight' => $this->input->post('weight'), 
				'height' => $this->input->post('height'), 
				'bmi' => $this->input->post('bmi'),
				'shorter' => $this->input->post('shorter'),
				'slimness' => $this->input->post('slimness'),
				'high_weight' => $this->input->post('high_weight'),
				'strabismus' => $this->input->post('strabismus'),
				'vision' => $this->input->post('vision'),
				'hear' => $this->input->post('hear'),
				'speaking' => $this->input->post('speaking'),
				'dental_defects' => $this->input->post('dental_defects'),
				'florosiya' => $this->input->post('florosiya'),
				'goitre' => $this->input->post('goitre'),
				'bone_defects' => $this->input->post('bone_defects'),
				'heart' => $this->input->post('heart'),
				'lungs' => $this->input->post('lungs'),
				'reg_child_id' => $this->input->post('reg_child_id'),
				'reg_child_reg_wife_id' => $this->input->post('reg_child_reg_wife_id'),
				'reg_child_reg_wife_people_id' => $this->input->post('reg_child_reg_wife_people_id'),
				'reg_child_reg_wife_people_home_id' => $this->input->post('reg_child_reg_wife_people_home_id')
			];
			
			$after_schooling = $this->after_schooling_model->insert('after_schooling', $insert);

			redirect('/midwife/after_schooling');
			
		}

		$data['after_schooling'] = $this->after_schooling_model->getAll('after_schooling');

		$this->load->view('after_schooling/after_schooling_view', $data);

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