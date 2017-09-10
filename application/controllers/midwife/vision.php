<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vision extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('vision_model');
    }


	public function index()
	{

		$data['field_list'] = $this->vision_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('age','Age','callback_validate_dropdown');
		$this->form_validation->set_rules('criterian','Criterian','callback_validate_dropdown');
		$this->form_validation->set_rules('condition','Condition','callback_validate_dropdown');
		$this->form_validation->set_rules('reg_child_id','Child Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_id','Mother Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_id','Mother People Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'age' => $this->input->post('age'), 
				'criterian' => $this->input->post( 'criterian'), 
				'condition' => $this->input->post('condition'), 
				'reg_child_id' => $this->input->post('reg_child_id'),
				'reg_child_reg_wife_id' => $this->input->post('reg_child_reg_wife_id'),
				'reg_child_reg_wife_people_id' => $this->input->post('reg_child_reg_wife_people_id'),
				'reg_child_reg_wife_people_home_id' => $this->input->post('reg_child_reg_wife_people_home_id')
			];
			
			$vision = $this->vision_model->insert('vision', $insert);

			redirect('/midwife/vision');
			
		}

		$data['vision'] = $this->vision_model->getAll('vision');

		$this->load->view('vision/vision_view', $data);

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