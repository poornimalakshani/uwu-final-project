<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toilet_facilities extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('toilet_facilities_model');
		$this->load->model('home_model');
		$this->load->model('list_model');
    }

	public function index($homeId = 0)
	{
		$data = array();
		$data['homeId'] = $homeId;
		$data['home'] = $this->home_model->getAll('home', 'address ASC');
		$data['toiletFacilities'] = $this->toilet_facilities_model->getByWhere('toilet_facilities', 'home_id', $homeId);

		$data['toiletFacilitiesTypes'] = $this->list_model->getListFields('Toilet Facilities');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-toilet-type";

		$this->load->view('grama_niladhari/toilet_facilities/toilet_facilities_view', $data);
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

		$this->form_validation->set_rules('type','Toilet Type','required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['toiletFacilities'] = $this->toilet_facilities_model->getByWhere('toilet_facilities', 'id', $floorId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'),
				'home_id' => $homeId
			];

			if ($floorId == 0) {
				$this->toilet_facilities_model->insert('toilet_facilities', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Toilet Facility Type Added!'
				]);
			} else {
				$this->toilet_facilities_model->update('toilet_facilities', 'id', $floorId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Toilet Facility Type Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['toiletFacilitiesTypes'] = $this->list_model->getListFields('Toilet Facilities');

		$this->load->view('grama_niladhari/toilet_facilities/add_edit_view', $data);
	}

	public function delete($floorId = 0)
	{
		$data['toiletFacilities'] = $this->toilet_facilities_model->getByWhere('toilet_facilities', 'id', $floorId, TRUE);

		$homeId = '';
		if ($data['toiletFacilities']) {
			$this->toilet_facilities_model->delete('toilet_facilities', 'id', $floorId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Toilet Facility Type Deleted!'
			]);

			$homeId = $data['toiletFacilities']->home_id;
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Toilet Facility Type Found!'
			]);
		}

		redirect('/grama_niladhari/toilet_facilities/'.$homeId);
	}

/*
	public function index()
	{

		$data['field_list'] = $this->toilet_facilities_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('type','Toilet Type','callback_validate_dropdown');
		$this->form_validation->set_rules('home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'), 
				'home_id' => $this->input->post('home_id')
			];
			
			$toilet_facilities = $this->toilet_facilities_model->insert('toilet_facilities', $insert);

			redirect('/grama_niladhari/toilet_facilities');
			
		}

		$data['toilet_facilities'] = $this->toilet_facilities_model->getAll('toilet_facilities');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-toilet-type";
		$this->load->view('grama_niladhari/toilet_facilities/toilet_facilities_view', $data);

	}

	function validate_dropdown($str)
    {
        if ($str == '-CHOOSE-') {
            //$this->form_validation->set_message('validate_dropdown', 'Please choose a valid %s');
            return FALSE;
        } else {
            return TRUE;
        }
    }
*/
} 