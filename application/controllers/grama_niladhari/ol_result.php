<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ol_result extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('ol_result_model');
    }


	public function index()
	{

		$data['field_list'] = $this->ol_result_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('subject','Subject','callback_validate_dropdown');
		$this->form_validation->set_rules('result','Result','trim|required');
		$this->form_validation->set_rules('people_id','People Id','trim|required');
		$this->form_validation->set_rules('people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'subject' => $this->input->post('subject'), 
				'result' => $this->input->post('result'), 
				'people_id' => $this->input->post('people_id'), 
				'people_home_id' => $this->input->post('people_home_id')
				];
			
			$ol_result = $this->ol_result_model->insert('ol_result', $insert);

			redirect('/grama_niladhari/ol_result');
			
		}

		$data['ol_result'] = $this->ol_result_model->getAll('ol_result');

		$this->load->view('ol_result/ol_result_view', $data);

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