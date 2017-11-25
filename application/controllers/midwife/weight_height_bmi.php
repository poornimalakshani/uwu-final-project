<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weight_height_bmi extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
		$this->load->model('weight_height_bmi_model');
		$this->load->model('people1_model');
		$this->load->model('home_model');
        $this->load->model('reg_child_model');
		$this->load->model('list_model');
    }

	public function index($homeId = 0, $regChildId = 0)
	{
		$data = array();
		$data['homeId'] = $homeId;
		$data['regChildId'] = $regChildId;
		$data['home'] = $this->home_model->getAll('home', 'address ASC');
		$data['regChild'] = $this->reg_child_model->getChildOfHome($homeId);

		$data['weightHeightBmi'] = $this->weight_height_bmi_model->getByWhere('weight_height_bmi', 'reg_child_id', $regChildId);

		$data['ageDuration'] = $this->list_model->getListFields('Age Duration');

		$data['menu'] = "midwife";
		$data['submenu'] = "midwife-bmi";

		$this->load->view('midwife/weight_height_bmi/weight_height_bmi_view', $data);
	}

	public function add_edit($homeId, $regChildId = 0, $weightHeightid = 0)
	{
		$data = [];
		$data['homeId'] = $homeId;
		$data['regChildId'] = $regChildId;
		$data['weightHeightid'] = $weightHeightid;

		$this->form_validation->set_rules('age_duration','Age','required');
		$this->form_validation->set_rules('height','Height','trim|required');
		$this->form_validation->set_rules('weight','Weight','trim|required');
		$this->form_validation->set_rules('bmi','BMI','trim|required');

		$data['regChild'] = $this->reg_child_model->getByWhere('reg_child', 'id', $regChildId, TRUE);
		$data['weightHeighBmi'] = $this->weight_height_bmi_model->getByWhere('weight_height_bmi', 'id', $weightHeightid, TRUE);

		if ($this->form_validation->run() != FALSE) {
			$insert = [
				'age_duration' => $this->input->post('age_duration'),
				'height' => $this->input->post( 'height'),
				'weight' => $this->input->post('weight'),
				'bmi' => $this->input->post('bmi'),
				'reg_child_id' => $regChildId,
				'reg_child_reg_wife_id' => $data['regChild']->reg_wife_id,
				'reg_child_reg_wife_people_id' => $data['regChild']->reg_wife_people_id,
				'reg_child_reg_wife_people_home_id' => $homeId
			];

			if ($weightHeightid == 0) {
				$this->weight_height_bmi_model->insert('weight_height_bmi', $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Weight Height BMI Added!'
				]);
			} else {
				$this->weight_height_bmi_model->update('weight_height_bmi', 'id', $weightHeightid, $insert);

				$this->session->set_flashdata('popup_message', [
					'type' => 'success',
					'message' => 'Weight Height BMI Updated!'
				]);
			}

			echo 'success';
			die();
		}

		$data['ageDuration'] = $this->list_model->getListFields('Age Duration');

		$this->load->view('midwife/weight_height_bmi/add_edit_view', $data);
	}

	public function delete($weightHeightid = 0)
	{
		$data['weightHeight'] = $this->weight_height_bmi_model->getByWhere('weight_height_bmi', 'id', $weightHeightid, TRUE);

		$homeId = '';
		$regChildId = '';
		if ($data['weightHeight']) {
			$this->weight_height_bmi_model->delete('weight_height_bmi', 'id', $weightHeightid);

			$this->session->set_flashdata('popup_message', [
				'type' => 'success',
				'message' => 'Weight Height BMI Deleted!'
			]);

			$regChildId = $data['weightHeight']->reg_child_id;
			$homeId = $data['weightHeight']->reg_child_reg_wife_people_home_id;

			redirect('/midwife/weight_height_bmi/'.$homeId.'/'.$regChildId);
		} else {
			$this->session->set_flashdata('popup_message', [
				'type' => 'danger',
				'message' => 'Sorry, No Weight Height BMI!'
			]);

			redirect('/midwife/weight_height_bmi/');
		}

	}
} 