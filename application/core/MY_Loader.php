<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

	function __construct()
	{
		parent::__construct();
	}

	public function view($view, $vars = array(), $return = FALSE)
	{
		$CI =& get_instance();
		$admin = $CI->session->userdata('admin');

		$userType = '';
		if($admin) {
			if ($admin->type == 309) {
				$userType = 'superadmin';
			} else if ($admin->type == 310) {
				$userType = 'admin';
			} else if ($admin->type == 311) {
				$userType = 'grama_niladhari';
			} else if ($admin->type == 312) {
				$userType = 'midwife';
			} else if ($admin->type == 338) {
				$userType = 'principal';
			} else if ($admin->type == 337) {
				$userType = 'divisional_secretory';
			} else if ($admin->type == 336) {
				$userType = 'moh';
			}
		}

		$vars['loggedInUserType'] = $userType;
		
		return parent::view($view, $vars, $return);
	}

	private function checkAllowedUser($vars)
	{
		//if (isset($vars[''])) {
		//
		//}
	}
}
