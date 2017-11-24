<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JOb extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('job_model');
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
		$data['job'] = $this->job_model->getByWhere('job', 'people_id', $peopleId);

		$data['people'] = null;

		if(!empty($data['peopleList'])) {
			foreach($data['peopleList'] as $x) {
				if ($x->id == $peopleId) {
					$data['people'] = $x;
				}
			}
		}

		$data['jobTypes'] = $this->list_model->getListFields('Job');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-jobs";

		$this->load->view('grama_niladhari/job/job_view', $data);
	}

	public function add_edit($homeId, $peopleId = 0, $jobId = 0)
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

		$this->form_validation->set_rules('type','Job Type','required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['people'] = $this->people1_model->getByWhere('people', 'id', $peopleId, TRUE);
		$data['job'] = $this->job_model->getByWhere('job', 'id', $jobId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'),
				'people_id' => $peopleId,
				'people_home_id' => $homeId
				];

			if ($jobId == 0) {
				$this->job_model->insert('job', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Job Type Added!'
				]);
			} else {
				$this->job_model->update('job', 'id', $jobId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Job Type Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['jobTypes'] = $this->list_model->getListFields('Job');

		$this->load->view('grama_niladhari/job/add_edit_view', $data);
	}

	public function delete($jobId = 0)
	{
		$data['job'] = $this->job_model->getByWhere('job', 'id', $jobId, TRUE);

		$homeId = '';
		$peopleId = '';
		if ($data['job']) {
			$this->job_model->delete('job', 'id', $jobId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Job Type Deleted!'
			]);

			$peopleId = $data['job']->people_id;
			$homeId = $data['job']->people_home_id;

			redirect('/grama_niladhari/job/'.$homeId.'/'.$peopleId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Job Types Found!'
			]);

			redirect('/grama_niladhari/job/');
		}

	}
} 