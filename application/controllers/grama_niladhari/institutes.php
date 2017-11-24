<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institutes extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('institutes_model');
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
		$data['institutes'] = $this->institutes_model->getByWhere('institutes', 'people_id', $peopleId);

		$data['people'] = null;

		if(!empty($data['peopleList'])) {
			foreach($data['peopleList'] as $x) {
				if ($x->id == $peopleId) {
					$data['people'] = $x;
				}
			}
		}

		$data['instituteTypes'] = $this->list_model->getListFields('Institutes');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-institutes";

		$this->load->view('grama_niladhari/institutes/institutes_view', $data);
	}

	public function add_edit($homeId, $peopleId = 0, $instituteId = 0)
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

		$this->form_validation->set_rules('type','Institute','required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['people'] = $this->people1_model->getByWhere('people', 'id', $peopleId, TRUE);
		$data['institutes'] = $this->institutes_model->getByWhere('institutes', 'id', $instituteId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'),
				'people_id' => $peopleId,
				'people_home_id' => $homeId
				];

			if ($instituteId == 0) {
				$this->institutes_model->insert('institutes', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Institute Added!'
				]);
			} else {
				$this->institutes_model->update('institutes', 'id', $instituteId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Institute Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['instituteTypes'] = $this->list_model->getListFields('Institutes');

		$this->load->view('grama_niladhari/institutes/add_edit_view', $data);
	}

	public function delete($instituteId = 0)
	{
		$data['institutes'] = $this->institutes_model->getByWhere('institutes', 'id', $instituteId, TRUE);

		$homeId = '';
		$peopleId = '';
		if ($data['institutes']) {
			$this->institutes_model->delete('institutes', 'id', $instituteId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Institute Deleted!'
			]);

			$peopleId = $data['institutes']->people_id;
			$homeId = $data['institutes']->people_home_id;

			redirect('/grama_niladhari/institutes/'.$homeId.'/'.$peopleId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Institutes Found!'
			]);

			redirect('/grama_niladhari/institutes/');
		}

	}
} 