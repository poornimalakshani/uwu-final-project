<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_pregnancy extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('about_pregnancy_model');
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
		$data['peopleList'] = $this->about_pregnancy_model->getWifesWithPregnancy($homeId);

		$data['protectedOnRubella'] = [
			'81' => 'Yes',
			'82'   => 'No'
		];

		$data['birthCondition'] = [
			'83' => 'Abortion',
			'84'   => 'Still Birth',
			'85'   => 'Live Birth'
		];

		$data['menu'] = "midwife";
		$data['submenu'] = "midwife-about-pregnancy";

		$this->load->view('midwife/about_pregnancy/about_pregnancy_view', $data);
	}

	public function add_edit($homeId, $peopleId = 0, $regWifeId = 0, $aboutPregnancyId = 0)
	{
		$data = [];
		$data['homeId'] = $homeId;
		$data['peopleId'] = $peopleId;
		$data['regWifeId'] = $regWifeId;
		$data['aboutPregnancyId'] = $aboutPregnancyId;

		$this->form_validation->set_rules('child_no','Child number','trim|required');
		$this->form_validation->set_rules('expected_date','Expected Date','trim|required');
		$this->form_validation->set_rules('condition','Birth Condition','trim|required');

		$data['aboutPregnancy'] = $this->about_pregnancy_model->getByWhere('about_pregnancy', 'id', $aboutPregnancyId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'child_no' => $this->input->post('child_no'),
				'expected_date' => $this->input->post('expected_date'),
				'condition' => $this->input->post('condition'),
				'reg_wife_id' => $regWifeId,
				'reg_wife_people_id' => $peopleId,
				'reg_wife_people_home_id' => $homeId
			];

			if ($aboutPregnancyId == 0) {
				$reg_wife = $this->about_pregnancy_model->insert('about_pregnancy', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'About Pregnancy Added!'
				]);
			} else {
				$this->about_pregnancy_model->update('about_pregnancy', 'id', $aboutPregnancyId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'About Pregnancy Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['birthCondition'] = [
			'' => '',
			'83' => 'Abortion',
			'84'   => 'Still Birth',
			'85'   => 'Live Birth'
		];

		$this->load->view('midwife/about_pregnancy/add_edit_view', $data);
	}

	public function delete($aboutPregnancyId = 0)
	{
		$data['aboutPregnancy'] = $this->about_pregnancy_model->getByWhere('about_pregnancy', 'id', $aboutPregnancyId, TRUE);

		$homeId = '';
		$peopleId = '';
		if ($data['aboutPregnancy']) {
			$this->about_pregnancy_model->delete('about_pregnancy', 'id', $aboutPregnancyId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'About Pregnancy Deleted!'
			]);

			$homeId = $data['aboutPregnancy']->reg_wife_people_home_id;

			redirect('/midwife/about_pregnancy/'.$homeId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No About Pregnancy Found!'
			]);

			redirect('/midwife/about_pregnancy/');
		}

	}
} 