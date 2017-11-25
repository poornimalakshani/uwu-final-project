<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg_husband extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('reg_husband_model');
		$this->load->model('people1_model');
		$this->load->model('home_model');
		$this->load->model('list_model');
    }

	public function index($homeId = 0)
	{
		$data = array();
		$data['homeId'] = $homeId;
		$data['home'] = $this->home_model->getAll('home', 'address ASC');
		$data['peopleList'] = $this->reg_husband_model->getMaleListOfHome($homeId);

		$data['menu'] = "midwife";
		$data['submenu'] = "midwife-reg-husband";

		$this->load->view('midwife/reg_husband/reg_husband_view', $data);
	}

	public function add_edit($homeId, $peopleId = 0, $regHusbandId = 0)
	{
		$data = [];
		$data['homeId'] = $homeId;
		$data['peopleId'] = $peopleId;
		$data['regHusbandId'] = $regHusbandId;

		if (empty($peopleId)) {
			$this->form_validation->set_rules('fullName','Full Name','trim|required');
			$this->form_validation->set_rules('dateOfBirth','Date Of Birth','trim|required');
			$this->form_validation->set_rules('status','Status','required');
			$this->form_validation->set_rules('nic','NIC','trim');

			$data['gender'] = $this->list_model->getListFields('Gender');
			$data['status'] = $this->list_model->getListFields('Status');
			$data['livingStatus'] = $this->list_model->getListFields('Living Status');
			$data['registerOnElectroralRegistry'] = [
				81 => 'Yes',
				82   => 'No'
			];
		}

		$this->form_validation->set_rules('education_condition','Education Condition','trim|required');
		$this->form_validation->set_rules('age_in_marriage','Age in Marriage','trim|required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['people'] = $this->people1_model->getByWhere('people', 'id', $peopleId, TRUE);
		$data['regHusband'] = $this->reg_husband_model->getByWhere('reg_husband', 'id', $regHusbandId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			if (empty($peopleId)) {
				$insert = [
					'fullName' => $this->input->post('fullName'),
					'dateOfBirth' => $this->input->post( 'dateOfBirth'),
					'gender' => 1,
					'status' => $this->input->post('status'),
					'living_status' => 5,
					'nic' => $this->input->post('nic'),
					'home_id' => $homeId,
					'register_on_electroral_registry' => 82,
				];

				$peopleId = $this->people1_model->insert('people', $insert);
			}

			//reg wife
			$insert = [
				'education_condition' => $this->input->post('education_condition'),
				'age_in_marriage' => $this->input->post('age_in_marriage'),
				'people_id' => $peopleId,
				'people_home_id' => $homeId
			];

			if ($regHusbandId == 0) {
				$reg_wife = $this->reg_husband_model->insert('reg_husband', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Husband Registed!'
				]);
			} else {
				$this->reg_husband_model->update('reg_husband', 'id', $regHusbandId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Registed Husband Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$this->load->view('midwife/reg_husband/add_edit_view', $data);
	}

	public function delete($regHusbandId = 0)
	{
		$data['regHusband'] = $this->reg_husband_model->getByWhere('reg_husband', 'id', $regHusbandId, TRUE);

		$homeId = '';
		$peopleId = '';
		if ($data['regHusband']) {
			$this->reg_husband_model->delete('reg_husband', 'id', $regHusbandId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Registed Husband Deleted!'
			]);

			$homeId = $data['regHusband']->people_home_id;

			redirect('/midwife/reg_husband/'.$homeId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Registed Husband Found!'
			]);

			redirect('/midwife/reg_husband/');
		}
	}
} 