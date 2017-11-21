<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('username','User Name','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$this->load->model('admin_model');

			$admin = $this->admin_model->login($this->input->post('username'), $this->input->post('password'));

			if ($admin) {
				$this->session->set_userdata('admin', $admin);
				redirect('/dashboard');  // redirect to dashboard
			}else{
				$this->form_validation->set_rules('account', 'Account', 'callback__noaccount');
				$this->form_validation->run();
			}
		}

		$this->load->view('login/index_view'); // display login form
	}

	public function logout() {
		$this->session->unset_userdata('admin');
		redirect('/');
	}

	public function _noaccount(){
		$this->form_validation->set_message('_noaccount', 'Sorry, your username or password incorrect'); // display if username or passward is incorrect
		return FALSE;
	}
}
