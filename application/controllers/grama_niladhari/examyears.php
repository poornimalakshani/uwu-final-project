<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamYears extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('examyears_model');
    }


	public function index()
	{

		$data['field_list'] = $this->examyears_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('examType','Exam Type','callback_validate_dropdown');
		$this->form_validation->set_rules('year','Year','trim|required');
		$this->form_validation->set_rules('people_id','People Id','trim|required');
		$this->form_validation->set_rules('people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'examType' => $this->input->post('examType'), 
				'year' => $this->input->post( 'year'), 
				'people_id' => $this->input->post('people_id'), 
				'people_home_id' => $this->input->post('people_home_id'),
				
			];
			
			$examyears = $this->examyears_model->insert('examyears', $insert);

			redirect('/grama_niladhari/examyears');
			
		}

		$data['examyears'] = $this->examyears_model->getAll('examyears');

		$this->load->view('examyears/examyears_view', $data);

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