<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roof extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('roof_model');
		$this->load->model('home_model');
		$this->load->model('list_model');
    }

	public function index($homeId = 0)
	{
		$data = array();
		$data['homeId'] = $homeId;
		$data['home'] = $this->home_model->getAll('home', 'address ASC');
		$data['roof'] = $this->roof_model->getByWhere('roof', 'home_id', $homeId);

		$data['roofTypes'] = $this->list_model->getListFields('Roof');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-roof-type";

		$this->load->view('grama_niladhari/roof/roof_view', $data);
	}

	public function add_edit($homeId, $roofId = 0) {
		$data = [];

		if (empty($homeId)) {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Home Found!'
			]);

			echo 'reload';
			die();
		}

		$this->form_validation->set_rules('type','Roof Type','required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['roof'] = $this->roof_model->getByWhere('roof', 'id', $roofId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'),
				'home_id' => $homeId
			];

			if ($roofId == 0) {
				$this->roof_model->insert('roof', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Roof Type Added!'
				]);
			} else {
				$this->roof_model->update('roof', 'id', $roofId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Roof Type Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['roofTypes'] = $this->list_model->getListFields('Roof');

		$this->load->view('grama_niladhari/roof/add_edit_view', $data);
	}

	public function delete($roofId = 0)
	{
		$data['roof'] = $this->roof_model->getByWhere('roof', 'id', $roofId, TRUE);

		$homeId = '';
		if ($data['roof']) {
			$this->roof_model->delete('roof', 'id', $roofId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Floor Type Deleted!'
			]);

			$homeId = $data['roof']->home_id;
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Floor Type Found!'
			]);
		}

		redirect('/grama_niladhari/roof/'.$homeId);
	}
} 