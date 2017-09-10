<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_pregnancy extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('about_pregnancy_model');
    }


	public function index()
	{
		//$data = array();
		//$this->load->model('about_pregnancy_model');

		$data['field_list'] = $this->about_pregnancy_model->getCategory();

		$this->form_validation->set_rules('child_no','Child number','trim|required');
		$this->form_validation->set_rules('expected_date','Expected Date','trim|required');
		$this->form_validation->set_rules('condition','Birth Condition','callback_validate_dropdown');
		$this->form_validation->set_rules('reg_wife_id','Wife Registration Id','trim|required');
		$this->form_validation->set_rules('reg_wife_people_id','People_Id','trim|required');
		$this->form_validation->set_rules('reg_wife_people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'child_no' => $this->input->post('child_no'), 
				'expected_date' => $this->input->post('expected_date'),
				'condition' => $this->input->post('condition'), 
				'reg_wife_id' => $this->input->post('reg_wife_id'),
				'reg_wife_people_id' => $this->input->post('reg_wife_people_id'),
				'reg_wife_people_home_id' => $this->input->post('reg_wife_people_home_id')
			];
			
			$about_pregnancy = $this->about_pregnancy_model->insert('about_pregnancy', $insert);

			redirect('/midwife/about_pregnancy');
			
		}

		$data['about_pregnancy'] = $this->about_pregnancy_model->getAll('about_pregnancy');

		$this->load->view('about_pregnancy/about_pregnancy_view', $data);

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