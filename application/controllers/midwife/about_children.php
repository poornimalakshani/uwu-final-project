<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_children extends MY_Controller {


	public function index()
	{
		$data = array();
		$this->load->model('about_children_model');

		$this->form_validation->set_rules('number_in_alive','Number in Alive','trim|required');
		$this->form_validation->set_rules('number_in_below_5years','Number in below 5 years','trim|required');
		$this->form_validation->set_rules('reg_wife_id','Wife Registration Id','trim|required');
		$this->form_validation->set_rules('reg_wife_people_id','People_Id','trim|required');
		$this->form_validation->set_rules('reg_wife_people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'number_in_alive' => $this->input->post('number_in_alive'), 
				'number_in_below_5years' => $this->input->post('number_in_below_5years'), 
				'reg_wife_id' => $this->input->post('reg_wife_id'),
				'reg_wife_people_id' => $this->input->post('reg_wife_people_id'),
				'reg_wife_people_home_id' => $this->input->post('reg_wife_people_home_id')
			];
			
			$about_children = $this->about_children_model->insert('about_children', $insert);

			redirect('/midwife/about_children');
			
		}

		$data['about_children'] = $this->about_children_model->getAll('about_children');

		$data['menu'] = "midwife";
		$data['submenu'] = "midwife-about-children";
		$this->load->view('midwife/about_children/about_children_view', $data);

	}
} 