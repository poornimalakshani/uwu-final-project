<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Water_facilities extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('water_facilities_model');
		$this->load->model('home_model');
		$this->load->model('list_model');
    }

	public function index($homeId = 0)
	{
		$data = array();
		$data['homeId'] = $homeId;
		$data['home'] = $this->home_model->getAll('home', 'address ASC');
		$data['waterFacilities'] = $this->water_facilities_model->getByWhere('water_facilities', 'home_id', $homeId);

		$data['waterFacilitiesTypes'] = $this->list_model->getListFields('Water Facilities');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-water-facility-type";

		$this->load->view('grama_niladhari/water_facilities/water_facilities_view', $data);
	}

	public function add_edit($homeId, $waterFacilities = 0) {
		$data = [];

		if (empty($homeId)) {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Home Found!'
			]);

			echo 'reload';
			die();
		}

		$this->form_validation->set_rules('type','Water Facility Type','required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['waterFacilities'] = $this->water_facilities_model->getByWhere('water_facilities', 'id', $waterFacilities, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'),
				'home_id' => $homeId
			];

			if ($waterFacilities == 0) {
				$this->water_facilities_model->insert('water_facilities', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Water Facility Type Added!'
				]);
			} else {
				$this->water_facilities_model->update('water_facilities', 'id', $waterFacilities, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Water Facility Type Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['waterFacilitiesTypes'] = $this->list_model->getListFields('Water Facilities');

		$this->load->view('grama_niladhari/water_facilities/add_edit_view', $data);
	}

	public function delete($waterFacilities = 0)
	{
		$data['waterFacilities'] = $this->water_facilities_model->getByWhere('water_facilities', 'id', $waterFacilities, TRUE);

		$homeId = '';
		if ($data['waterFacilities']) {
			$this->water_facilities_model->delete('water_facilities', 'id', $waterFacilities);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Water Facility Type Deleted!'
			]);

			$homeId = $data['waterFacilities']->home_id;
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Water Facility Type Found!'
			]);
		}

		redirect('/grama_niladhari/water_facilities/'.$homeId);
	}
} 