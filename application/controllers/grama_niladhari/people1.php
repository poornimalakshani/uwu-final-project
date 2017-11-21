<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class People1 extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('people1_model');
    }


	public function index()
	{

		$data['field_list'] = $this->people1_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('fullName','Full Name','trim|required');
		$this->form_validation->set_rules('dateOfBirth','Date Of Birth','trim|required');
		$this->form_validation->set_rules('gender','Gender','callback_validate_dropdown');
		$this->form_validation->set_rules('status','Status','callback_validate_dropdown');
		$this->form_validation->set_rules('living_status','Living Status','callback_validate_dropdown');
		$this->form_validation->set_rules('nic','NIC','trim');
		$this->form_validation->set_rules('home_id','Home_Id','trim|required');
		$this->form_validation->set_rules('register_on_electroral_registry','Register on Electroral Registry','callback_validate_dropdown');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'fullName' => $this->input->post('fullName'), 
				'dateOfBirth' => $this->input->post( 'dateOfBirth'), 
				'gender' => $this->input->post('gender'), 
				'status' => $this->input->post('status'),
				'living_status' => $this->input->post('living_status'),
				'nic' => $this->input->post('nic'),
				'home_id' => $this->input->post('home_id'),
				'register_on_electroral_registry' => $this->input->post('register_on_electroral_registry'), 
			];
			
			$people1 = $this->people1_model->insert('people', $insert);

			redirect('/grama_niladhari/people1');
			
		}

		$data['people1'] = $this->people1_model->getAll('people');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-people";

		$this->load->view('people/people_view1', $data);

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