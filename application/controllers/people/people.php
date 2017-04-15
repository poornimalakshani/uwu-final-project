<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class People extends MY_Controller {


	public function index()
	{
		$data = array();
		$this->load->model('people_model');

		//$this->form_validation->set_rules('id','Id','trim|required');
		$this->form_validation->set_rules('fullName','Full Name','trim|required');
		$this->form_validation->set_rules('dateOfBirth','Date Of Birth','trim|required');
		$this->form_validation->set_rules('gender','Gender','trim|required');
		$this->form_validation->set_rules('status','Status','trim|required');
		$this->form_validation->set_rules('living_status','Living Status','trim|required');
		$this->form_validation->set_rules('nic','GNIC No','trim|required');
		$this->form_validation->set_rules('home_id','home Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$people = $this->people_model->insert('people', ['fullName' => $this->input->post('fullName')], ['dateOfBirth' => $this->input->post( 'dateOfBirth')], ['gender' => $this->input->post('gender')], ['status' => $this->input->post('status')], ['living_status' => $this->input->post('living_status')], ['nic' => $this->input->post('nic')], ['home_id' => $this->input->post('home_id')]);

			redirect('/people/people');
			
		}

		$data['people'] = $this->people_model->getAll('people');

		$this->load->view('people/people_view', $data);

			}
		}