<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Al_result extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('al_result_model');
    }


	public function index()
	{
		//$data = array();
		//$this->load->model('al_result_model');
		$data['field_list'] = $this->al_result_model->getCategory();

		$this->form_validation->set_rules('subject','Subject','callback_validate_dropdown');
		$this->form_validation->set_rules('result','Result','trim|required');
		$this->form_validation->set_rules('people_id','People_Id','trim|required');
		$this->form_validation->set_rules('people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'subject' => $this->input->post('subject'), 
				'result' => $this->input->post('result'), 
				'people_id' => $this->input->post('people_id'), 
				'people_home_id' => $this->input->post('people_home_id')
				];
				
			$al_result = $this->al_result_model->insert('al_result', $insert);

			redirect('/grama_niladhari/al_result');
			
		}

		$data['al_result'] = $this->al_result_model->getAll('al_result');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-al-result";
		$this->load->view('al_result/al_result_view', $data);

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