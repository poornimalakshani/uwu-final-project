<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Al_result extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
		$this->load->model('people1_model');
		$this->load->model('home_model');
        $this->load->model('al_result_model');
		$this->load->model('list_model');
    }

	public function index($homeId = 0, $peopleId = 0)
	{
		$data = array();
		$data['homeId'] = $homeId;
		$data['peopleId'] = $peopleId;
		$data['home'] = $this->home_model->getAll('home', 'address ASC');
		$data['peopleList'] = $this->people1_model->getByWhere('people', 'home_id', $homeId, false, 'fullName ASC');
		$data['alResults'] = $this->al_result_model->getByWhere('al_result', 'people_id', $peopleId, false, 'subject ASC');

		$data['people'] = null;

		if(!empty($data['peopleList'])) {
			foreach($data['peopleList'] as $x) {
				if ($x->id == $peopleId) {
					$data['people'] = $x;
				}
			}
		}

		$data['subjects'] = $this->list_model->getListFields('Al Result');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-al-result";

		$this->load->view('grama_niladhari/al_result/al_result_view', $data);
	}

	public function add_edit($homeId, $peopleId = 0, $alResultId = 0)
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

		$this->form_validation->set_rules('subject','Subject','required');
		$this->form_validation->set_rules('result','Result','trim|required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['people'] = $this->people1_model->getByWhere('people', 'id', $peopleId, TRUE);
		$data['alResult'] = $this->al_result_model->getByWhere('al_result', 'id', $alResultId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'subject' => $this->input->post('subject'),
				'result' => $this->input->post('result'),
				'people_id' => $peopleId,
				'people_home_id' => $homeId
			];

			if ($alResultId == 0) {
				$this->al_result_model->insert('al_result', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New A/L Result Added!'
				]);
			} else {
				$this->al_result_model->update('al_result', 'id', $alResultId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'A/L Result Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['subject'] = $this->list_model->getListFields('Al Result');

		$this->load->view('grama_niladhari/al_result/add_edit_view', $data);
	}

	public function delete($alResultId = 0)
	{
		$data['alResult'] = $this->al_result_model->getByWhere('al_result', 'id', $alResultId, TRUE);

		$homeId = '';
		$peopleId = '';
		if ($data['alResult']) {
			$this->al_result_model->delete('al_result', 'id', $alResultId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'A/L Result Deleted!'
			]);

			$peopleId = $data['alResult']->people_id;
			$homeId = $data['alResult']->people_home_id;

			redirect('/grama_niladhari/al_result/'.$homeId.'/'.$peopleId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No A/L Result Found!'
			]);

			redirect('/grama_niladhari/al_result/');
		}
		
	}
/*
	public function index()
	{
		//$data = array();
		//$this->load->model('al_result_model');
		$data['field_list'] = $this->al_result_model->getCategory();



		if ($this->form_validation->run() != FALSE) {


			$al_result = $this->al_result_model->insert('al_result', $insert);
			redirect('/grama_niladhari/al_result');
		}

		$data['al_result'] = $this->al_result_model->getAll('al_result');

		
		

	}
*/
}
