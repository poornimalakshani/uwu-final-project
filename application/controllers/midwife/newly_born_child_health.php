<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newly_born_child_health extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('newly_born_child_health_model');
    }


	public function index()
	{

		$data['field_list'] = $this->newly_born_child_health_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('age_duration','Age','callback_validate_dropdown');
		$this->form_validation->set_rules('skin','Skin','callback_validate_dropdown');
		$this->form_validation->set_rules('eyes','Eyes','callback_validate_dropdown');
		$this->form_validation->set_rules('navel','Navel','callback_validate_dropdown');
		$this->form_validation->set_rules('breasfeeding_postural','Breastfeeding Postural','callback_validate_dropdown');
		$this->form_validation->set_rules('reg_child_id','Child Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_id','Mother Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_id','People Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'age_duration' => $this->input->post('age_duration'), 
				'skin' => $this->input->post('skin'), 
				'eyes' => $this->input->post('eyes'), 
				'navel' => $this->input->post('navel'), 
				'breasfeeding_postural' => $this->input->post('breasfeeding_postural'), 
				'reg_child_id' => $this->input->post('reg_child_id'), 
				'reg_child_reg_wife_id' => $this->input->post('reg_child_reg_wife_id'), 
				'reg_child_reg_wife_people_id' => $this->input->post('reg_child_reg_wife_people_id'), 
				'reg_child_reg_wife_people_home_id' => $this->input->post('reg_child_reg_wife_people_home_id')
				];
			
			$newly_born_child_health = $this->newly_born_child_health_model->insert('newly_born_child_health', $insert);

			redirect('/midwife/newly_born_child_health');
			
		}

		$data['newly_born_child_health'] = $this->newly_born_child_health_model->getAll('newly_born_child_health');

		$this->load->view('newly_born_child_health/newly_born_child_health_view', $data);

			}

			function validate_dropdown($str)
    {
        if ($str == '-CHOOSE-')
        {
            //$this->form_validation->set_message('validate_dropdown', 'Please choose a valid %s');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
		} 