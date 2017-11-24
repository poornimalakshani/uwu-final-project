<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Manager extends MY_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('list_model');
	}

    public function index() {
        $data = array();

        $data['users'] = $this->admin_model->getAll('admin');

        $data['adminTypes'] = $this->list_model->getListFields('AdminType');
        $data['adminStatus'] = $this->list_model->getListFields('adminStatus');

        $data['menu'] = "profile_manager";
        $data['submenu'] = "user_list";

		$this->load->view('user_manager/index_view', $data);
    }

	public function profile(){
		$data = array();
        $admin = $this->session->userdata('admin');

		$data['user'] = $this->admin_model->getByWhere('admin', 'id', $admin->id, TRUE);

        if (!$data['user']) {
            redirect('login/logout');
        }

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required');

        if ($this->input->post('old_password')) {
            $this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_password_matches');
            $this->form_validation->set_rules('new_password', 'New Password', 'required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
        }

        if ($this->form_validation->run() != FALSE) {
            $update = [
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'telephone' => $this->input->post('telephone'),
            ];

            if ($this->input->post('old_password')) {
                $update['password'] = md5($this->input->post('new_password'));
            }

            $this->admin_model->update('admin', 'id', $admin->id, $update);

            $admin = $this->admin_model->getByWhere('admin', 'id', $admin->id, TRUE);
            $this->session->set_userdata('admin', $admin);

            $this->session->set_flashdata('popup_message', [
                'type' => 'success',
                'message' => 'Profile Data Updated!'
            ]);

            redirect('/user_manager/profile');
        }

        $data['adminTypes'] = $this->list_model->getListFields('AdminType');
        $data['adminStatus'] = $this->list_model->getListFields('adminStatus');

		$data['menu'] = "profile_manager";
        $data['submenu'] = "my_profile";

		$this->load->view('user_manager/profile_view', $data);

	}

    public function add_edit($adminId = 0)
	{
		$data = array();

		$data['admin'] = $this->admin_model->getByWhere('admin', 'id', $adminId, TRUE);

        if ($adminId == 0) {
            $this->form_validation->set_rules('userName', 'User Name', 'required|callback_check_username');
        }

        $this->form_validation->set_rules('type', 'Admin Type', 'required');
        $this->form_validation->set_rules('status', 'Admin Status', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required');

        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'required');
        } else if ($adminId == 0) {
            $this->form_validation->set_rules('password', 'Password', 'required');
        }

		if ($this->form_validation->run() != FALSE) {
            $ins = [
                'userName' => $this->input->post('userName'),
                'type' => $this->input->post('type'),
                'status' => $this->input->post('status'),
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'telephone' => $this->input->post('telephone'),
            ];

            if ($this->input->post('password')) {
                $update['password'] = md5($this->input->post('password'));
            }

			if ($adminId == 0) {
				$home = $this->admin_model->insert('admin', $ins);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'New Admin Added!'
				]);
			} else {
				$home = $this->admin_model->update('admin', 'id', $adminId, $ins);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Admin Updated!'
				]);
			}

			echo 'success';
			die();
		}

        $data['adminTypes'] = $this->list_model->getListFields('AdminType');
        $data['adminStatus'] = $this->list_model->getListFields('adminStatus');

		$this->load->view('user_manager/add_edit_view', $data);
	}

	public function delete($adminId = 0)
	{
		$data['admin'] = $this->admin_model->getByWhere('admin', 'id', $adminId, TRUE);

		if ($data['admin']) {
			$this->admin_model->delete('admin', 'id', $adminId);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Admin Deleted!'
			]);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Admin Found!'
			]);
		}

		redirect('/user_manager');
	}

    public function check_username($submitted_value) {
        if ($this->admin_model->checkUserName($submitted_value) == TRUE) {
            $this->form_validation->set_message('check_username', 'The username already exists.');
            return FALSE;
        }

        return TRUE;
    }

    public function password_matches($submitted_value)
    {
        $admin = $this->session->userdata('admin');

        //load your admin by id, validate current password.
        if ($admin->password != md5($submitted_value))
        {
            $this->form_validation->set_message('password_matches', 'The password you supplied does not match your existing password.');
            return FALSE;
        }

        //check to see if the new password matches the reentered new password...
        if ($this->input->post('new_password') !== $this->input->post('confirm_password'))
        {
            $this->form_validation->set_message('password_matches', 'The confirmation password does not match.');
            return FALSE;
        }

        //passed...
        return TRUE;
    }


}