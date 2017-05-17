<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index()
	{
		$data = array();
		$this->load->model('home_model');
		$data['homeLocation'] = $this->home_model->getHomeLocation();
		
		$this->load->view('dashboard/index_view', $data);
	}
}
