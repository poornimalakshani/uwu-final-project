<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wall extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('wall_model');
		$this->load->model('home_model');
		$this->load->model('list_model');
    }

	public function index($homeId = 0)
	{
		$data = array();
		$data['homeId'] = $homeId;
		$data['home'] = $this->home_model->getAll('home', 'address ASC');
		$data['wall'] = $this->wall_model->getByWhere('wall', 'home_id', $homeId);

		$data['wallTypes'] = $this->list_model->getListFields('Wall');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-wall-type";

		$this->load->view('grama_niladhari/wall/wall_view', $data);
	}

	public function add_edit($homeId, $wallId = 0) {
		$data = [];

		if (empty($homeId)) {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Home Found!'
			]);

			echo 'reload';
			die();
		}

		$this->form_validation->set_rules('type','Wall Type','required');

		$data['home'] = $this->home_model->getByWhere('home', 'id', $homeId, TRUE);
		$data['wall'] = $this->wall_model->getByWhere('wall', 'id', $wallId, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'),
				'home_id' => $homeId
			];

			if ($wallId == 0) {
				$this->wall_model->insert('wall', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Wall Type Added!'
				]);
			} else {
				$this->wall_model->update('wall', 'id', $wallId, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Wall Type Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['wallTypes'] = $this->list_model->getListFields('Wall');

		$this->load->view('grama_niladhari/wall/add_edit_view', $data);
	}

	public function delete($wallId = 0)
	{
		$data['wall'] = $this->wall_model->getByWhere('wall', 'id', $wallId, TRUE);

		$homeId = '';
		if ($data['wall']) {
			$this->wall_model->delete('wall', 'id', $wallId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Wall Type Deleted!'
			]);

			$homeId = $data['wall']->home_id;
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Wall Type Found!'
			]);
		}

		redirect('/grama_niladhari/wall/'.$homeId);
	}
/*
	public function index()
	{

		$data['field_list'] = $this->wall_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('type','Wall Type','callback_validate_dropdown');
		$this->form_validation->set_rules('home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'type' => $this->input->post('type'), 
				'home_id' => $this->input->post('home_id')
			];
			
			$wall = $this->wall_model->insert('wall', $insert);

			redirect('/grama_niladhari/wall');
			
		}

		$data['wall'] = $this->wall_model->getAll('wall');

		$data['menu'] = "grama-niladhari";
		$data['submenu'] = "grama-niladhari-wall-type";
		$this->load->view('grama_niladhari/wall/wall_view', $data);
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