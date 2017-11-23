<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Floor extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
		$this->load->model('home_model');
        $this->load->model('floor_model');
		$this->load->model('list_model');
    }

	public function index($homeId = 0)
	{
		$data = array();
		$data['homeId'] = $homeId;
		$data['home'] = $this->home_model->getAll('home', 'address ASC');
		$data['floor'] = $this->floor_model->getByWhere('floor', 'home_id', $homeId);

		$data['floorTypes'] = $this->list_model->getListFields('Floor');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-floor-type";

		$this->load->view('grama_niladhari/floor/floor_view', $data);
	}

	public function add_edit($homeId, $floorId = 0) {
		$data = [];

		if (empty($homeId)) {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Home Found!'
			]);

			echo 'reload';
			die();
		}

		$this->form_validation->set_rules('type','Floor Type','required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['floor'] = $this->floor_model->getByWhere('floor', 'id', $floorId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'),
				'home_id' => $homeId
			];

			if ($floorId == 0) {
				$this->floor_model->insert('floor', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Floor Type Added!'
				]);
			} else {
				$this->floor_model->update('floor', 'id', $floorId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Floor Type Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['floorTypes'] = $this->list_model->getListFields('Floor');

		$this->load->view('grama_niladhari/floor/add_edit_view', $data);
	}

	public function delete($floorId = 0)
	{
		$data['floor'] = $this->floor_model->getByWhere('floor', 'id', $floorId, TRUE);

		$homeId = '';
		if ($data['floor']) {
			$this->floor_model->delete('floor', 'id', $floorId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Floor Type Deleted!'
			]);

			$homeId = $data['floor']->home_id;
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Floor Type Found!'
			]);
		}

		redirect('/grama_niladhari/floor/'.$homeId);
	}
} 