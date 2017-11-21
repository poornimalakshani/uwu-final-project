<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {


	public function index()
	{
		$data = array();
		$this->load->model('home_model');

		//$this->form_validation->set_rules('id','Id','trim|required');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('longitude','Longitude','trim|required');
		$this->form_validation->set_rules('latitude','Latitude','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$home = $this->home_model->insert('home', ['address' => $this->input->post('address'), 'longitude' => $this->input->post( 'longitude'), 'latitude' => $this->input->post('latitude')]); 

			redirect('/grama_niladhari/home');
			
		}

		$data['home'] = $this->home_model->getAll('home');
		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-home";

		$this->load->view('home/home_view', $data);

	}
}