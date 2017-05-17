<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roof extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('roof_model');
    }


	public function index()
	{

		$data['field_list'] = $this->roof_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');
		
		$this->form_validation->set_rules('type','Roof Type','callback_validate_dropdown');
		$this->form_validation->set_rules('home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'), 
				'home_id' => $this->input->post('home_id')
			];
			
			$roof = $this->roof_model->insert('roof', $insert);

			redirect('/grama_niladhari/roof');
			
		}

		$data['roof'] = $this->roof_model->getAll('roof');

		$this->load->view('roof/roof_view', $data);

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