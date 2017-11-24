<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade5Result extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('grade5result_model');
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
		$data['grade5result'] = $this->grade5result_model->getByWhere('grade5result', 'people_id', $peopleId);

		$data['people'] = null;

		if(!empty($data['peopleList'])) {
			foreach($data['peopleList'] as $x) {
				if ($x->id == $peopleId) {
					$data['people'] = $x;
				}
			}
		}

		$data['resultTypes'] = $this->list_model->getListFields('Result');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-grade-5";

		$this->load->view('grama_niladhari/grade5result/grade5result_view', $data);
	}

	public function add_edit($homeId, $peopleId = 0, $grade5resultId = 0)
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

		$this->form_validation->set_rules('result','Result','required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['people'] = $this->people1_model->getByWhere('people', 'id', $peopleId, TRUE);
		$data['grade5result'] = $this->grade5result_model->getByWhere('grade5result', 'id', $grade5resultId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'result' => $this->input->post('result'),
				'people_id' => $peopleId,
				'people_home_id' => $homeId
				];

			if ($grade5resultId == 0) {
				$this->grade5result_model->insert('grade5result', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Result Added!'
				]);
			} else {
				$this->grade5result_model->update('grade5result', 'id', $grade5resultId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Result Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['resultTypes'] = $this->list_model->getListFields('Result');

		$this->load->view('grama_niladhari/grade5result/add_edit_view', $data);
	}

	public function delete($grade5resultId = 0)
	{
		$data['grade5result'] = $this->grade5result_model->getByWhere('grade5result', 'id', $grade5resultId, TRUE);

		$homeId = '';
		$peopleId = '';
		if ($data['grade5result']) {
			$this->grade5result_model->delete('grade5result', 'id', $grade5resultId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Result Deleted!'
			]);

			$peopleId = $data['grade5result']->people_id;
			$homeId = $data['grade5result']->people_home_id;

			redirect('/grama_niladhari/grade5result/'.$homeId.'/'.$peopleId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Results Found!'
			]);

			redirect('/grama_niladhari/grade5result/');
		}

	}
} 