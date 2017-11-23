<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicles extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('vehicles_model');
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
		$data['vehicles'] = $this->vehicles_model->getByWhere('vehicles', 'people_id', $peopleId);

		$data['people'] = null;

		if(!empty($data['peopleList'])) {
			foreach($data['peopleList'] as $x) {
				if ($x->id == $peopleId) {
					$data['people'] = $x;
				}
			}
		}

		$data['vehicleTypes'] = $this->list_model->getListFields('Vehicles');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-vehicles";

		$this->load->view('grama_niladhari/vehicles/vehicles_view', $data);
	}

	public function add_edit($homeId, $peopleId = 0, $vehicleId = 0)
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

		$this->form_validation->set_rules('type','Vehicle Type','required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['people'] = $this->people1_model->getByWhere('people', 'id', $peopleId, TRUE);
		$data['vehicles'] = $this->vehicles_model->getByWhere('vehicles', 'id', $vehicleId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'),
				'people_id' => $peopleId,
				'people_home_id' => $homeId
				];

			if ($vehicleId == 0) {
				$this->vehicles_model->insert('vehicles', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Vehicle Type Added!'
				]);
			} else {
				$this->vehicles_model->update('vehicles', 'id', $vehicleId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Vehicle Type Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['vehicleTypes'] = $this->list_model->getListFields('Vehicles');

		$this->load->view('grama_niladhari/vehicles/add_edit_view', $data);
	}

	public function delete($vehicleId = 0)
	{
		$data['vehicles'] = $this->vehicles_model->getByWhere('vehicles', 'id', $vehicleId, TRUE);

		$homeId = '';
		$peopleId = '';
		if ($data['vehicles']) {
			$this->vehicles_model->delete('vehicles', 'id', $vehicleId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Vehicle Type Deleted!'
			]);

			$peopleId = $data['vehicles']->people_id;
			$homeId = $data['vehicles']->people_home_id;

			redirect('/grama_niladhari/vehicles/'.$homeId.'/'.$peopleId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Vehicle Types Found!'
			]);

			redirect('/grama_niladhari/vehicles/');
		}

	}
/*
	public function index()
	{

		$data['field_list'] = $this->vehicles_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('type','Vehicle Type','callback_validate_dropdown');
		$this->form_validation->set_rules('people_id','People Id','trim|required');
		$this->form_validation->set_rules('people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'), 
				'people_id' => $this->input->post('people_id'), 
				'people_home_id' => $this->input->post('people_home_id')
				];
			
			$vehicles = $this->vehicles_model->insert('vehicles', $insert);

			redirect('/grama_niladhari/vehicles');
			
		}

		$data['vehicles'] = $this->vehicles_model->getAll('vehicles');



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