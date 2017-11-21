<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Montisoory_children extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('montisoory_children_model');
    }


	public function index()
	{

		$data['field_list'] = $this->montisoory_children_model->getCategory();
		//$data = array();
		//$this->load->model('people1_model');

		$this->form_validation->set_rules('attendance','Attendance Of Child','callback_validate_dropdown');
		$this->form_validation->set_rules('condition_of_home','Home Condition of Child','callback_validate_dropdown');
		$this->form_validation->set_rules('cleanness','Cleanness','callback_validate_dropdown');
		$this->form_validation->set_rules('activities','Activities','callback_validate_dropdown');
		$this->form_validation->set_rules('behavior_problems','Behavior Problems','callback_validate_dropdown');
		$this->form_validation->set_rules('speaking_problems','Speaking Problems','callback_validate_dropdown');
		$this->form_validation->set_rules('listening_problems','Listenning Problems','callback_validate_dropdown');
		$this->form_validation->set_rules('mental_development','Mental Development','callback_validate_dropdown');
		$this->form_validation->set_rules('asthma','Asthma','callback_validate_dropdown');
		$this->form_validation->set_rules('weight','Weight','trim|required');
		$this->form_validation->set_rules('height','Height','trim|required');
		$this->form_validation->set_rules('lack_of_vitaminA','Lack of Vitamin A','callback_validate_dropdown');
		$this->form_validation->set_rules('strabismus','Strabismus','callback_validate_dropdown');
		$this->form_validation->set_rules('vission','Vision','callback_validate_dropdown');
		$this->form_validation->set_rules('hear','Hear','callback_validate_dropdown');
		$this->form_validation->set_rules('speaking','Speaking','callback_validate_dropdown');
		$this->form_validation->set_rules('dental_defects','Dental Defects','callback_validate_dropdown');
		$this->form_validation->set_rules('bone_defects','Bone Defects','callback_validate_dropdown');
		$this->form_validation->set_rules('heart','Heart','callback_validate_dropdown');
		$this->form_validation->set_rules('lungs','Lungs','callback_validate_dropdown');
		$this->form_validation->set_rules('reg_child_id','Child Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_id','Mother Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_id','People Id','trim|required');
		$this->form_validation->set_rules('reg_child_reg_wife_people_home_id','Home_Id','trim|required');

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'attendance' => $this->input->post('attendance'), 
				'condition_of_home' => $this->input->post('condition_of_home'), 
				'cleanness' => $this->input->post('cleanness'), 
				'activities' => $this->input->post('activities'), 
				'behavior_problems' => $this->input->post('behavior_problems'),
				'speaking_problems' => $this->input->post('speaking_problems'),
				'listening_problems' => $this->input->post('listening_problems'),
				'mental_development' => $this->input->post('mental_development'),
				'asthma' => $this->input->post('asthma'),
				'weight' => $this->input->post('weight'), 
				'height' => $this->input->post('height'), 
				'lack_of_vitaminA' => $this->input->post('lack_of_vitaminA'), 
				'hear' => $this->input->post('hear'), 
				'speaking' => $this->input->post('speaking'), 
				'dental_defects' => $this->input->post('dental_defects'), 
				'heart' => $this->input->post('heart'), 
				'lungs' => $this->input->post('lungs'), 
				'reg_child_id' => $this->input->post('reg_child_id'), 
				'reg_child_reg_wife_id' => $this->input->post('reg_child_reg_wife_id'), 
				'reg_child_reg_wife_people_id' => $this->input->post('reg_child_reg_wife_people_id'), 
				'reg_child_reg_wife_people_home_id' => $this->input->post('reg_child_reg_wife_people_home_id')
				];
			
			$montisoory_children = $this->montisoory_children_model->insert('montisoory_children', $insert);

			redirect('/midwife/montisoory_children');
			
		}

		$data['montisoory_children'] = $this->montisoory_children_model->getAll('montisoory_children');

		$data['menu'] = "midwife";
		$data['submenu'] = "midwife-montisoory";
		$this->load->view('montisoory_children/montisoory_children_view', $data);

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