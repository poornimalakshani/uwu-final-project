<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_children extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('about_children_model');
		$this->load->model('reg_wife_model');
		$this->load->model('people1_model');
		$this->load->model('home_model');
		$this->load->model('list_model');
    }

	public function index($homeId = 0)
	{
		$data = array();
		$data['homeId'] = $homeId;
		$data['home'] = $this->home_model->getAll('home', 'address ASC');
		$data['peopleList'] = $this->about_children_model->getWifesWithChildren($homeId);

		$data['protectedOnRubella'] = [
			'81' => 'Yes',
			'82'   => 'No'
		];

		$data['menu'] = "midwife";
		$data['submenu'] = "midwife-about-children";

		$this->load->view('midwife/about_children/about_children_view', $data);
	}

	public function add_edit($homeId, $peopleId = 0, $regWifeId = 0,$aboutChildrenId = 0)
	{
		$data = [];
		$data['homeId'] = $homeId;
		$data['peopleId'] = $peopleId;
		$data['regWifeId'] = $regWifeId;
		$data['aboutChildrenId'] = $aboutChildrenId;

		$this->form_validation->set_rules('number_in_alive','Number in Alive','trim|required');
		$this->form_validation->set_rules('number_in_below_5years','Number in below 5 years','trim|required');

		//$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		//$data['people'] = $this->people1_model->getByWhere('people', 'id', $peopleId, TRUE);
		//$data['regWife'] = $this->reg_wife_model->getByWhere('reg_wife', 'id', $regWifeId, TRUE);
		$data['aboutChildren'] = $this->about_children_model->getByWhere('about_children', 'id', $aboutChildrenId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'number_in_alive' => $this->input->post('number_in_alive'),
				'number_in_below_5years' => $this->input->post('number_in_below_5years'),
				'reg_wife_id' => $regWifeId,
				'reg_wife_people_id' => $peopleId,
				'reg_wife_people_home_id' => $homeId
			];

			if ($aboutChildrenId == 0) {
				$reg_wife = $this->about_children_model->insert('about_children', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'About Children Added!'
				]);
			} else {
				$this->about_children_model->update('about_children', 'id', $aboutChildrenId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'About Children Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$this->load->view('midwife/about_children/add_edit_view', $data);
	}

	public function delete($aboutChildrenId = 0)
	{
		$data['aboutChildren'] = $this->about_children_model->getByWhere('about_children', 'id', $aboutChildrenId, TRUE);

		$homeId = '';
		$peopleId = '';
		if ($data['aboutChildren']) {
			$this->about_children_model->delete('about_children', 'id', $aboutChildrenId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'About Children Deleted!'
			]);

			$homeId = $data['aboutChildren']->reg_wife_people_home_id;

			redirect('/midwife/about_children/'.$homeId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No About Children Found!'
			]);

			redirect('/midwife/about_children/');
		}

	}
/*
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
*/
} 