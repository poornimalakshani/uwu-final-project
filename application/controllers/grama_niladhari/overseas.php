<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overseas extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('overseas_model');
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
		$data['overseas'] = $this->overseas_model->getByWhere('overseas', 'people_id', $peopleId);

		$data['people'] = null;

		if(!empty($data['peopleList'])) {
			foreach($data['peopleList'] as $x) {
				if ($x->id == $peopleId) {
					$data['people'] = $x;
				}
			}
		}

		$data['overseasTypes'] = $this->list_model->getListFields('Overseas');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-overseas";

		$this->load->view('grama_niladhari/overseas/overseas_view', $data);
	}

	public function add_edit($homeId, $peopleId = 0, $overseasId = 0)
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

		$this->form_validation->set_rules('country','Oversea','required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['people'] = $this->people1_model->getByWhere('people', 'id', $peopleId, TRUE);
		$data['overseas'] = $this->overseas_model->getByWhere('overseas', 'id', $overseasId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'country' => $this->input->post('country'),
				'people_id' => $peopleId,
				'people_home_id' => $homeId
				];

			if ($overseasId == 0) {
				$this->overseas_model->insert('overseas', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Oversea Added!'
				]);
			} else {
				$this->overseas_model->update('overseas', 'id', $overseasId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Oversea Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['overseasTypes'] = $this->list_model->getListFields('Overseas');

		$this->load->view('grama_niladhari/overseas/add_edit_view', $data);
	}

	public function delete($overseasId = 0)
	{
		$data['overseas'] = $this->overseas_model->getByWhere('overseas', 'id', $overseasId, TRUE);

		$homeId = '';
		$peopleId = '';
		if ($data['overseas']) {
			$this->overseas_model->delete('overseas', 'id', $overseasId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Oversea Deleted!'
			]);

			$peopleId = $data['overseas']->people_id;
			$homeId = $data['overseas']->people_home_id;

			redirect('/grama_niladhari/overseas/'.$homeId.'/'.$peopleId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Overseas Found!'
			]);

			redirect('/grama_niladhari/overseas/');
		}

	}
} 