<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_data extends MY_Controller {

	public function index()
	{
		$data = array();
		$this->load->model('list_model');

		$this->form_validation->set_rules('list_val','List','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$list = $this->list_model->insert('list', ['list_type' => $this->input->post('list_val')]);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'New List Created!'
			]);

			redirect('/settings/list_data');
		}

		$data['list'] = $this->list_model->getAll('list');
		$data['menu'] = 'settings-list';

		$this->load->view('settings/list_data/index_view', $data);
	}

	public function view($id)
	{
		$data = array();
		$this->load->model('list_field_model');

		$this->form_validation->set_rules('list_field_val','List Field','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$list = $this->list_field_model->insert('list_field', ['list_id' => $id, 'field' => $this->input->post('list_field_val')]);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'New Field Created!'
			]);

			redirect('/settings/list_data/view/'.$id);
		}

		$data['parant_list'] = $this->list_field_model->getByWhere('list', 'id', $id, true);
		$data['list'] = $this->list_field_model->getByWhere('list_field', 'list_id', $id);
		$data['menu'] = 'settings-list';

		$this->load->view('settings/list_data/view', $data);
	}

	public function edit($id)
	{
		$data = array();
		$this->load->model('list_model');

		$data['list'] = $this->list_model->getByWhere('list', 'id', $id, TRUE);

		if (!$data['list']) {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No List Found!'
			]);

			redirect('/settings/list_data');	
		}

		$this->form_validation->set_rules('list_val','List','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$list = $this->list_model->update('list', 'id', $id, ['list_type' => $this->input->post('list_val')]);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'List Updated!'
			]);

			redirect('/settings/list_data');
		}

		$data['menu'] = 'settings-list';
		
		$this->load->view('settings/list_data/edit', $data);
	}

	public function edit_field($id)
	{
		$data = array();
		$this->load->model('list_field_model');

		$data['list'] = $this->list_field_model->getByWhere('list_field', 'id', $id, TRUE);

		if (!$data['list']) {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Field Found!'
			]);

			redirect('/settings/list_data/view/'.$data['list']->list_id);	
		}

		$this->form_validation->set_rules('list_field_val','List Field','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$list = $this->list_field_model->update('list_field', 'id', $id, ['field' => $this->input->post('list_field_val')]);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Field Updated!'
			]);

			redirect('/settings/list_data/view/'.$data['list']->list_id);
		}

		$data['menu'] = 'settings-list';
		$this->load->view('settings/list_data/edit_field', $data);
	}

	public function add_new($id)
	{
		$data = array();
		$this->load->model('list_field_model');
		$data['list'] = $this->list_field_model->getByWhere('list_field', 'list_id', $id);

		$data['menu'] = 'settings-list';
		$this->load->view('settings/list_data/index_view', $data);
	}

	public function delete($id = 0) {
		$this->load->model('list_model');

		$data['list'] = $this->list_model->getByWhere('list', 'id', $id, TRUE);

		if ($data['list']) {
			$this->list_model->delete('list', 'id', $id);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'List Deleted!'
			]);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No List Found!'
			]);
		}

		redirect('/settings/list_data');

	}

	public function delete_field($id = 0) {
		$this->load->model('list_field_model');

		$data['field'] = $this->list_field_model->getByWhere('list_field', 'id', $id, TRUE);

		$list_id = '';
		if ($data['field']) {
			$this->list_field_model->delete('list_field', 'id', $id);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Field Deleted!'
			]);

			$list_id = $data['field']->list_id;
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Field Found!'
			]);
		}

		redirect('/settings/list_data/view/'.$list_id);

	}
}
