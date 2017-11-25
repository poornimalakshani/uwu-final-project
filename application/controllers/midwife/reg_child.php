<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg_child extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
		$this->load->model('reg_wife_model');
		$this->load->model('people1_model');
		$this->load->model('home_model');
        $this->load->model('reg_child_model');
		$this->load->model('list_model');
    }

	public function index($homeId = 0, $regWifeId = 0)
	{
		$data = array();
		$data['homeId'] = $homeId;
		$data['regWifeId'] = $regWifeId;
		$data['home'] = $this->home_model->getAll('home', 'address ASC');

		$regWifeList = $this->reg_wife_model->getFemaleListOfHome($homeId);
		$data['regWifeList'] = [];

		if(!empty($regWifeList)) {
			foreach($regWifeList as $x) {
				if (!empty($x->regWifeId)) {
					$data['regWifeList'][] = $x;
				}
			}
		}
		
		$data['regChild'] = $this->reg_child_model->getChildOfRegWife($regWifeId);
		
		$data['healthCondition'] = $this->list_model->getListFields('Health Condition');

		$data['menu'] = "midwife";
		$data['submenu'] = "midwife-reg-child";

		$this->load->view('midwife/reg_child/reg_child_view', $data);
	}

	public function add_edit($homeId, $regWifeId = 0, $peopleId = 0, $regChildId = 0)
	{
		$data = [];
		$data['homeId'] = $homeId;
		$data['peopleId'] = $peopleId;
		$data['regWifeId'] = $regWifeId;
		$data['regChildId'] = $regChildId;

		if (empty($peopleId)) {
			$this->form_validation->set_rules('fullName','Full Name','trim|required');
			$this->form_validation->set_rules('dateOfBirth','Date Of Birth','trim|required');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('living_status','living Status','required');

			$data['gender'] = $this->list_model->getListFields('Gender');
			$data['livingStatus'] = $this->list_model->getListFields('Living Status');
		}

		$this->form_validation->set_rules('birth_weight','Birth Weight','trim|required');
		$this->form_validation->set_rules('length_at_birth','Length at Birth','trim|required');
		$this->form_validation->set_rules('size_of_head_at_birth','Size of Head at Birth','trim|required');
		$this->form_validation->set_rules('health_condition','Health Condition','trim|required');

		//$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		//$data['people'] = $this->people1_model->getByWhere('people', 'id', $peopleId, TRUE);
		$data['regWife'] = $this->reg_wife_model->getByWhere('reg_wife', 'id', $regWifeId, TRUE);
		$data['regChild'] = $this->reg_child_model->getByWhere('reg_child', 'id', $regChildId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			if (empty($peopleId)) {
				$insert = [
					'fullName' => $this->input->post('fullName'),
					'dateOfBirth' => $this->input->post( 'dateOfBirth'),
					'gender' => $this->input->post( 'gender'),
					'status' => 3,
					'living_status' => $this->input->post( 'living_status'),
					'nic' => '',
					'home_id' => $homeId,
					'register_on_electroral_registry' => 82,
				];

				$peopleId = $this->people1_model->insert('people', $insert);
			}

			//reg wife
			$insert = [
				'birth_weight' => $this->input->post('birth_weight'),
				'length_at_birth' => $this->input->post('length_at_birth'),
				'size_of_head_at_birth' => $this->input->post('size_of_head_at_birth'),
				'health_condition' => $this->input->post('health_condition'),
				'reg_wife_id' => $regWifeId,
				'reg_wife_people_id' => $data['regWife']->people_id,
				'reg_wife_people_home_id' => $homeId,
				'people_id' => $peopleId
			];

			if ($regChildId == 0) {
				$this->reg_child_model->insert('reg_child', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Child Registed!'
				]);
			} else {
				$this->reg_child_model->update('reg_child', 'id', $regChildId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Registed Child Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['healthCondition'] = $this->list_model->getListFields('Health Condition');

		$this->load->view('midwife/reg_child/add_edit_view', $data);
	}

	public function delete($regChildId = 0)
	{
		$data['regChild'] = $this->reg_child_model->getByWhere('reg_child', 'id', $regChildId, TRUE);

		$homeId = '';
		$regWifeId = '';
		if ($data['regChild']) {
			$this->reg_child_model->delete('reg_child', 'id', $regChildId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Registed Chiled Deleted!'
			]);

			$regWifeId = $data['regChild']->reg_wife_id;
			$homeId = $data['regChild']->reg_wife_people_home_id;

			redirect('/midwife/reg_child/'.$homeId.'/'.$regWifeId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Registed Chiled Found!'
			]);

			redirect('/midwife/reg_child/');
		}

	}
} 