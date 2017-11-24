<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unusual_conditions extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('unusual_conditions_model');
		$this->load->model('people1_model');
		$this->load->model('home_model');
		$this->load->model('list_model');
    }

	public function index($homeId = 0, $peopleId = 0)
	{
		$data = array();
		$data['homeId'] = $homeId;
		$data['peopleId'] = $peopleId;
		$data['home'] = $this->home_model->getAll('home', 'address ASC');
		$data['peopleList'] = $this->people1_model->getByWhere('people', 'home_id', $homeId, false, 'fullName ASC');
		$data['unusualConditions'] = $this->unusual_conditions_model->getByWhere('unusual_conditions', 'people_id', $peopleId);

		$data['people'] = null;

		if(!empty($data['peopleList'])) {
			foreach($data['peopleList'] as $x) {
				if ($x->id == $peopleId) {
					$data['people'] = $x;
				}
			}
		}

		$data['unusualConditionsTypes'] = $this->list_model->getListFields('Unusual Conditions');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-unusual-conditions";

		$this->load->view('grama_niladhari/unusual_conditions/unusual_conditions_view', $data);
	}

	public function add_edit($homeId, $peopleId = 0, $unusualConditionId = 0)
	{
		$data = [];

		if (empty($peopleId)) {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No People Found!'
			]);

			echo 'reload';
			die();
		}

		$this->form_validation->set_rules('type','Unusual Conditions Type','required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['people'] = $this->people1_model->getByWhere('people', 'id', $peopleId, TRUE);
		$data['unusualConditions'] = $this->unusual_conditions_model->getByWhere('unusual_conditions', 'id', $unusualConditionId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'),
				'people_id' => $peopleId,
				'people_home_id' => $homeId
				];

			if ($unusualConditionId == 0) {
				$this->unusual_conditions_model->insert('unusual_conditions', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Unusual Conditions Type Added!'
				]);
			} else {
				$this->unusual_conditions_model->update('unusual_conditions', 'id', $unusualConditionId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Unusual Conditions Type Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['unusualConditionsTypes'] = $this->list_model->getListFields('Unusual Conditions');

		$this->load->view('grama_niladhari/unusual_conditions/add_edit_view', $data);
	}

	public function delete($unusualConditionId = 0)
	{
		$data['unusualConditions'] = $this->unusual_conditions_model->getByWhere('unusual_conditions', 'id', $unusualConditionId, TRUE);

		$homeId = '';
		$peopleId = '';
		if ($data['unusualConditions']) {
			$this->unusual_conditions_model->delete('unusual_conditions', 'id', $unusualConditionId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Unusual Conditions Type Deleted!'
			]);

			$peopleId = $data['unusualConditions']->people_id;
			$homeId = $data['unusualConditions']->people_home_id;

			redirect('/grama_niladhari/unusual_conditions/'.$homeId.'/'.$peopleId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Unusual Conditions Types Found!'
			]);

			redirect('/grama_niladhari/unusual_conditions/');
		}

	}

} 