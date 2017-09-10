<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->checkLogin();
	}

	public function checkLogin()
	{
		if (!$this->session->userdata('admin')){ //if user logged in
			redirect('/login');
		}
	}
}
