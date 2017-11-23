<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Government_subsidies extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('government_subsidies_model');
		$this->load->model('home_model');
		$this->load->model('list_model');
    }

	public function index($homeId = 0)
	{
		$data = array();
		$data['homeId'] = $homeId;
		$data['home'] = $this->home_model->getAll('home', 'address ASC');
		$data['governmentSubsidies'] = $this->government_subsidies_model->getByWhere('government_subsidies', 'home_id', $homeId);

		$data['governmentSubsidiesTypes'] = $this->list_model->getListFields('Government Subsidies');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-subsidies-type";

		$this->load->view('grama_niladhari/government_subsidies/government_subsidies_view', $data);
	}

	public function add_edit($homeId, $subsidiesId = 0) {
		$data = [];

		if (empty($homeId)) {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Home Found!'
			]);

			echo 'reload';
			die();
		}

		$this->form_validation->set_rules('type','Subsidies Type','required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['governmentSubsidies'] = $this->government_subsidies_model->getByWhere('government_subsidies', 'id', $subsidiesId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'),
				'home_id' => $homeId
			];

			if ($subsidiesId == 0) {
				$this->government_subsidies_model->insert('government_subsidies', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Government Subsidies Type Added!'
				]);
			} else {
				$this->government_subsidies_model->update('government_subsidies', 'id', $subsidiesId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Government Subsidies Type Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['governmentSubsidiesTypes'] = $this->list_model->getListFields('Government Subsidies');

		$this->load->view('grama_niladhari/government_subsidies/add_edit_view', $data);
	}

	public function delete($subsidiesId = 0)
	{
		$data['governmentSubsidies'] = $this->government_subsidies_model->getByWhere('government_subsidies', 'id', $subsidiesId, TRUE);

		$homeId = '';
		if ($data['governmentSubsidies']) {
			$this->government_subsidies_model->delete('government_subsidies', 'id', $subsidiesId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Government Subsidies Type Deleted!'
			]);

			$homeId = $data['governmentSubsidies']->home_id;
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Government Subsidies Type Found!'
			]);
		}

		redirect('/grama_niladhari/government_subsidies/'.$homeId);
	}
} 