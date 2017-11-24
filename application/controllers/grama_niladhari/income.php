<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('income_model');
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
		$data['income'] = $this->income_model->getByWhere('income', 'people_id', $peopleId);

		$data['people'] = null;

		if(!empty($data['peopleList'])) {
			foreach($data['peopleList'] as $x) {
				if ($x->id == $peopleId) {
					$data['people'] = $x;
				}
			}
		}

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-income";

		$this->load->view('grama_niladhari/income/income_view', $data);
	}

	public function add_edit($homeId, $peopleId = 0, $incomeId = 0)
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

		$this->form_validation->set_rules('income','Income','required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['people'] = $this->people1_model->getByWhere('people', 'id', $peopleId, TRUE);
		$data['income'] = $this->income_model->getByWhere('income', 'id', $incomeId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'income' => $this->input->post('income'),
				'people_id' => $peopleId,
				'people_home_id' => $homeId
				];

			if ($incomeId == 0) {
				$this->income_model->insert('income', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Income Added!'
				]);
			} else {
				$this->income_model->update('income', 'id', $incomeId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Income Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$this->load->view('grama_niladhari/income/add_edit_view', $data);
	}

	public function delete($incomeId = 0)
	{
		$data['income'] = $this->income_model->getByWhere('income', 'id', $incomeId, TRUE);

		$homeId = '';
		$peopleId = '';
		if ($data['income']) {
			$this->income_model->delete('income', 'id', $incomeId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Income Deleted!'
			]);

			$peopleId = $data['income']->people_id;
			$homeId = $data['income']->people_home_id;

			redirect('/grama_niladhari/income/'.$homeId.'/'.$peopleId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Income Found!'
			]);

			redirect('/grama_niladhari/income/');
		}

	}
} 