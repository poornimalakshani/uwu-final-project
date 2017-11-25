<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg_wife extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('reg_wife_model');
		$this->load->model('people1_model');
		$this->load->model('home_model');
		$this->load->model('list_model');
    }

	public function index($homeId = 0)
	{
		$data = array();
		$data['homeId'] = $homeId;
		$data['home'] = $this->home_model->getAll('home', 'address ASC');
		$data['peopleList'] = $this->reg_wife_model->getFemaleListOfHome($homeId);

		$data['protectedOnRubella'] = [
			'81' => 'Yes',
			'82'   => 'No'
		];

		$data['menu'] = "midwife";
		$data['submenu'] = "midwife-reg-wife";

		$this->load->view('midwife/reg_wife/reg_wife_view', $data);
	}

	public function add_edit($homeId, $peopleId = 0, $regWifeId = 0)
	{
		$data = [];
		$data['homeId'] = $homeId;
		$data['peopleId'] = $peopleId;
		$data['regWifeId'] = $regWifeId;

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
		$this->form_validation->set_rules('protected_on_Rubella','Protected on Rubella','trim|required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['people'] = $this->people1_model->getByWhere('people', 'id', $peopleId, TRUE);
		$data['regWife'] = $this->reg_wife_model->getByWhere('reg_wife', 'id', $regWifeId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			if (empty($peopleId)) {
				$insert = [
					'fullName' => $this->input->post('fullName'),
					'dateOfBirth' => $this->input->post( 'dateOfBirth'),
					'gender' => 2,
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
				'protected_on_Rubella' => $this->input->post('protected_on_Rubella'),
				'people_id' => $peopleId,
				'people_home_id' => $homeId
			];

			if ($regWifeId == 0) {
				$reg_wife = $this->reg_wife_model->insert('reg_wife', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Wife Registed!'
				]);
			} else {
				$this->reg_wife_model->update('reg_wife', 'id', $regWifeId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Registed Wife Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['protectedOnRubella'] = [
			'' => '',
			'81' => 'Yes',
			'82'   => 'No'
		];

		$this->load->view('midwife/reg_wife/add_edit_view', $data);
	}

	public function delete($regWifeId = 0)
	{
		$data['regWife'] = $this->reg_wife_model->getByWhere('reg_wife', 'id', $regWifeId, TRUE);

		$homeId = '';
		$peopleId = '';
		if ($data['regWife']) {
			$this->reg_wife_model->delete('reg_wife', 'id', $regWifeId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Registed Wife Deleted!'
			]);

			$homeId = $data['regWife']->people_home_id;

			redirect('/midwife/reg_wife/'.$homeId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Registed Wife Found!'
			]);

			redirect('/midwife/reg_wife/');
		}

	}
} 