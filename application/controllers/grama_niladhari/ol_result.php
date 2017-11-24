<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ol_result extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('ol_result_model');
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
		$data['olResults'] = $this->ol_result_model->getByWhere('ol_result', 'people_id', $peopleId, false, 'subject ASC');

		$data['people'] = null;

		if(!empty($data['peopleList'])) {
			foreach($data['peopleList'] as $x) {
				if ($x->id == $peopleId) {
					$data['people'] = $x;
				}
			}
		}

		$data['subjects'] = $this->list_model->getListFields('Ol Result');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-ol-results";

		$this->load->view('grama_niladhari/ol_result/ol_result_view', $data);
	}

	public function add_edit($homeId, $peopleId = 0, $olResultId = 0)
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
		$data['olResult'] = $this->ol_result_model->getByWhere('ol_result', 'id', $olResultId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'subject' => $this->input->post('subject'),
				'result' => $this->input->post('result'),
				'people_id' => $peopleId,
				'people_home_id' => $homeId
			];

			if ($olResultId == 0) {
				$this->ol_result_model->insert('ol_result', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New O/ L Result Added!'
				]);
			} else {
				$this->ol_result_model->update('ol_result', 'id', $olResultId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'O/ L Result Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['subject'] = $this->list_model->getListFields('Ol Result');

		$this->load->view('grama_niladhari/ol_result/add_edit_view', $data);
	}

	public function delete($olResultId = 0)
	{
		$data['olResult'] = $this->ol_result_model->getByWhere('ol_result', 'id', $olResultId, TRUE);

		$homeId = '';
		$peopleId = '';
		if ($data['olResult']) {
			$this->ol_result_model->delete('ol_result', 'id', $olResultId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'O/ L Result Deleted!'
			]);

			$peopleId = $data['olResult']->people_id;
			$homeId = $data['olResult']->people_home_id;

			redirect('/grama_niladhari/ol_result/'.$homeId.'/'.$peopleId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No O/ L Result Found!'
			]);

			redirect('/grama_niladhari/ol_result/');
		}

	}

//	public function index()
//	{
//
//		$data['field_list'] = $this->ol_result_model->getCategory();
//		//$data = array();
//		//$this->load->model('people1_model');
//
//		$this->form_validation->set_rules('subject','Subject','callback_validate_dropdown');
//		$this->form_validation->set_rules('result','Result','trim|required');
//		$this->form_validation->set_rules('people_id','People Id','trim|required');
//		$this->form_validation->set_rules('people_home_id','Home_Id','trim|required');
//
//		if ($this->form_validation->run() != FALSE) {
//			$insert = [
//				'subject' => $this->input->post('subject'),
//				'result' => $this->input->post('result'),
//				'people_id' => $this->input->post('people_id'),
//				'people_home_id' => $this->input->post('people_home_id')
//				];
//
//			$ol_result = $this->ol_result_model->insert('ol_result', $insert);
//			redirect('/grama_niladhari/ol_result');
//		}
//
//		$data['ol_result'] = $this->ol_result_model->getAll('ol_result');
//
//		$data['menu'] = "grama-niladhari";
//		$data['submenu'] = "grama-niladhari-ol-results";
//		$this->load->view('grama_niladhari/ol_result/ol_result_view', $data);
//	}
//
//	function validate_dropdown($str)
//    {
//        if ($str == '-CHOOSE-') {
//            //$this->form_validation->set_message('validate_dropdown', 'Please choose a valid %s');
//            return FALSE;
//        } else {
//            return TRUE;
//        }
//    }
} 