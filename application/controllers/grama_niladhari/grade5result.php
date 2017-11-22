<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade5Result extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('grade5result_model');
    }


	public function index()
	{
		$data['field_list'] = $this->grade5result_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('result','Result','callback_validate_dropdown');
		$this->form_validation->set_rules('people_id','People Id','trim|required');
		$this->form_validation->set_rules('people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'result' => $this->input->post('result'), 
				'people_id' => $this->input->post('people_id'), 
				'people_home_id' => $this->input->post('people_home_id'),
				
			];
			
			$grade5result = $this->grade5result_model->insert('grade5result', $insert);
			redirect('/grama_niladhari/grade5result');
		}

		$data['grade5result'] = $this->grade5result_model->getAll('grade5result');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-grade-5";
		$this->load->view('grama_niladhari/grade5result/grade5result_view', $data);

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