<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class People1 extends MY_Controller {


	public function index()
	{
		$data = array();
		$this->load->model('people1_model');

		$this->form_validation->set_rules('fullName','Full Name','trim|required');
		$this->form_validation->set_rules('dateOfBirth','Date Of Birth','trim|required');
		$this->form_validation->set_rules('gender','Gender','alpha|required');
		$this->form_validation->set_rules('status','Status','alpha|required');
		$this->form_validation->set_rules('living_status','Living Status','alpha|required');
		$this->form_validation->set_rules('nic','NIC','trim|required');
		$this->form_validation->set_rules('home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'fullName' => $this->input->post('fullName'), 
				'dateOfBirth' => $this->input->post( 'dateOfBirth'), 
				'gender' => $this->input->post('gender'), 
				'status' => $this->input->post('status'),
				'living_status' => $this->input->post('living_status'),
				'nic' => $this->input->post('nic'),
				'home_id' => $this->input->post('home_id')
			];
			
			$people1 = $this->people1_model->insert('people', $insert);

			redirect('/people/people1');
			
		}

		$data['people1'] = $this->people1_model->getAll('people');

		$this->load->view('people/people_view1', $data);

			}
		} 