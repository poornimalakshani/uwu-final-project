<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Manager extends MY_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('list_model');
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
        $this->form_validation->set_rules('email', 'Email', 'required');
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
		$this->load->view('user_manager/profile_view', $data);

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