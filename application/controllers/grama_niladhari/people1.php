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
		$this->load->model('home_model');
    }


	public function index($homeId = 0)
	{

		$data = array();
		$data['homeId'] = $homeId;
		$data['home'] = $this->home_model->getAll('home', 'address ASC');
		$data['people'] = $this->people1_model->getByWhere('people', 'home_id', $homeId, false, 'fullName ASC');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-people";

		$this->load->view('grama_niladhari/people/people_view1', $data);
	}

	public function add_edit($homeId, $peopleId = 0) {
		$data = [];
		$this->load->model('list_model');

		if (empty($homeId)) {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Home Found!'
			]);

			echo 'reload';
			die();
		}

		$this->form_validation->set_rules('fullName','Full Name','trim|required');
		$this->form_validation->set_rules('dateOfBirth','Date Of Birth','trim|required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('living_status','Living Status','trim|required');
		$this->form_validation->set_rules('nic','NIC','trim');
		$this->form_validation->set_rules('register_on_electroral_registry','Register on Electroral Registry', 'required');
		
		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['people'] = $this->people1_model->getByWhere('people', 'id', $peopleId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'fullName' => $this->input->post('fullName'),
				'dateOfBirth' => $this->input->post( 'dateOfBirth'),
				'gender' => $this->input->post('gender'),
				'status' => $this->input->post('status'),
				'living_status' => $this->input->post('living_status'),
				'nic' => $this->input->post('nic'),
				'home_id' => $homeId,
				'register_on_electroral_registry' => $this->input->post('register_on_electroral_registry'),
			];

			if ($peopleId == 0) {
				$this->people1_model->insert('people', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New People Added!'
				]);
			} else {
				$this->people1_model->update('people', 'id', $peopleId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'People Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['gender'] = $this->list_model->getListFields('Gender');
		$data['status'] = $this->list_model->getListFields('Status');
		$data['livingStatus'] = $this->list_model->getListFields('Living Status');
		$data['registerOnElectroralRegistry'] = [
			81 => 'Yes',
			82   => 'No'
		];

		$this->load->view('grama_niladhari/people/add_edit_view', $data);
	}

	public function delete($peopleId = 0)
	{
		$data['people'] = $this->people1_model->getByWhere('people', 'id', $peopleId, TRUE);

		$homeId = '';
		if ($data['people']) {
			$this->people1_model->delete('people', 'id', $peopleId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'People Deleted!'
			]);

			$homeId = $data['people']->home_id;
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No People Found!'
			]);
		}

		redirect('/grama_niladhari/people1/'.$homeId);
	}
} 