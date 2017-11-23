<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {


	public function index()
	{
		$data = array();
		$this->load->model('home_model');

		if ($this->form_validation->run() != FALSE) {
			$home = $this->home_model->insert('home', ['address' => $this->input->post('address'), 'longitude' => $this->input->post( 'longitude'), 'latitude' => $this->input->post('latitude')]); 
			redirect('/grama_niladhari/home');
		}

		$data['home'] = $this->home_model->getAll('home');
		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-home";

		$this->load->view('grama_niladhari/home/home_view', $data);
	}

	public function add_edit($homeId = 0)
	{
		$data = array();
		$this->load->model('home_model');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);

		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('longitude','Longitude','trim|required');
		$this->form_validation->set_rules('latitude','Latitude','trim|required');

		if ($this->form_validation->run() != FALSE) {
			if ($homeId == 0) {
				$home = $this->home_model->insert('home', ['address' => $this->input->post('address'), 'longitude' => $this->input->post( 'longitude'), 'latitude' => $this->input->post('latitude')]);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Home Added!'
				]);
			} else {
				$home = $this->home_model->update('home', 'id', $homeId, ['address' => $this->input->post('address'), 'longitude' => $this->input->post( 'longitude'), 'latitude' => $this->input->post('latitude')]);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Home Updated!'
				]);
			}


			echo 'success';
			die();
		}

		$this->load->view('grama_niladhari/home/add_edit_view', $data);
	}

	public function delete($homeId = 0)
	{
		$this->load->model('home_model');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);

		if ($data['home']) {
			$this->home_model->delete('home', 'id', $homeId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Home Deleted!'
			]);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Home Found!'
			]);
		}

		redirect('/grama_niladhari/home');
	}
}