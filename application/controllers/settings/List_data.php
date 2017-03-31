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

			redirect('/settings/list_data');
		}

		$data['list'] = $this->list_model->getAll('list');

		$this->load->view('settings/list_data/index_view', $data);
	}

	public function view($id)
	{
		$data = array();
		$this->load->model('list_field_model');

		$this->form_validation->set_rules('list_field_val','List Field','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$list = $this->list_field_model->insert('list_field', ['list_id' => $id, 'field' => $this->input->post('list_field_val')]);

			redirect('/settings/list_data/view/'.$id);
		}
		$data['list'] = $this->list_field_model->getByWhere('list_field', 'list_id', $id);

		$this->load->view('settings/list_data/view', $data);
	}

	public function edit($id)
	{
		$data = array();
		$this->load->model('list_model');

		$data['list'] = $this->list_model->getByWhere('list', 'id', $id, TRUE);

		if (!$data['list']) {
			redirect('/settings/list_data');	
		}

		$this->form_validation->set_rules('list_val','List','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$list = $this->list_model->update('list', 'id', $id, ['list_type' => $this->input->post('list_val')]);

			redirect('/settings/list_data');
		}

		$this->load->view('settings/list_data/edit', $data);
	}

	public function edit_field($id)
	{
		$data = array();
		$this->load->model('list_field_model');

		$data['list'] = $this->list_field_model->getByWhere('list_field', 'id', $id, TRUE);

		if (!$data['list']) {
			redirect('/settings/list_data/view/'.$data['list']->list_id);	
		}

		$this->form_validation->set_rules('list_field_val','List Field','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$list = $this->list_field_model->update('list_field', 'id', $id, ['field' => $this->input->post('list_field_val')]);

			redirect('/settings/list_data/view/'.$data['list']->list_id);
		}

		$this->load->view('settings/list_data/edit_field', $data);
	}


	public function add_new($id)
	{
		$data = array();
		$this->load->model('list_field_model');
		$data['list'] = $this->list_field_model->getByWhere('list_field', 'list_id', $id);

		$this->load->view('settings/list_data/index_view', $data);
	}

	
}
