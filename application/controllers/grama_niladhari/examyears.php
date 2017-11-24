<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamYears extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('examyears_model');
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
		$data['examyears'] = $this->examyears_model->getByWhere('examyears', 'people_id', $peopleId);

		$data['people'] = null;

		if(!empty($data['peopleList'])) {
			foreach($data['peopleList'] as $x) {
				if ($x->id == $peopleId) {
					$data['people'] = $x;
				}
			}
		}

		$data['examTypes'] = $this->list_model->getListFields('Exam Type');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-exam-years";

		$this->load->view('grama_niladhari/examyears/examyears_view', $data);
	}

	public function add_edit($homeId, $peopleId = 0, $examyearId = 0)
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

		$this->form_validation->set_rules('examType','Exam Type','required');
		$this->form_validation->set_rules('year','Year','trim|required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['people'] = $this->people1_model->getByWhere('people', 'id', $peopleId, TRUE);
		$data['examyears'] = $this->examyears_model->getByWhere('examyears', 'id', $examyearId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'examType' => $this->input->post('examType'),
				'year' => $this->input->post( 'year'),
				'people_id' => $peopleId,
				'people_home_id' => $homeId
				];

			if ($examyearId == 0) {
				$this->examyears_model->insert('examyears', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Exam Year Added!'
				]);
			} else {
				$this->examyears_model->update('examyears', 'id', $examyearId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Exam Year Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['examTypes'] = $this->list_model->getListFields('Exam Type');

		$this->load->view('grama_niladhari/examyears/add_edit_view', $data);
	}

	public function delete($examyearId = 0)
	{
		$data['examyears'] = $this->examyears_model->getByWhere('examyears', 'id', $examyearId, TRUE);

		$homeId = '';
		$peopleId = '';
		if ($data['examyears']) {
			$this->examyears_model->delete('examyears', 'id', $examyearId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Exam Year Deleted!'
			]);

			$peopleId = $data['examyears']->people_id;
			$homeId = $data['examyears']->people_home_id;

			redirect('/grama_niladhari/examyears/'.$homeId.'/'.$peopleId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Exam Years Found!'
			]);

			redirect('/grama_niladhari/examyears/');
		}

	}
} 