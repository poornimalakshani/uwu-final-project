<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overseas extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('overseas_model');
    }


	public function index()
	{

		$data['field_list'] = $this->overseas_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('country','Country','callback_validate_dropdown');
		$this->form_validation->set_rules('people_id','People Id','trim|required');
		$this->form_validation->set_rules('people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'country' => $this->input->post('country'), 
				'people_id' => $this->input->post('people_id'), 
				'people_home_id' => $this->input->post('people_home_id')
				];
			
			$overseas = $this->overseas_model->insert('overseas', $insert);
			redirect('/grama_niladhari/overseas');
		}

		$data['overseas'] = $this->overseas_model->getAll('overseas');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-overseas";
		$this->load->view('grama_niladhari/overseas/overseas_view', $data);
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