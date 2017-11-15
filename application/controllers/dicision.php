<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dicision extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        
    }


   public function get_samurdhi(){
   		$data = array();
   		$this->load->model('income_model');
   		$data['samurdhiGranters'] = $this->income_model->filterSamurdhiGranters();
   		$this->load->view('samurdhi_view/samurdhi_view', $data);

   }

   public function get_social_service(){
   		$data = array();
   		$this->load->model('people1_model');
   		$data['socialServiceGranters'] = $this->people1_model->filterSocialServiceGranters();
   		$this->load->view('social_service/social_service_view', $data);
   		
   	}

   public function register(){
   		$data = array();
   		$this->load->model('people1_model');
   		$data['newlyRegisters'] = $this->people1_model->filterNewlyRegisterPeople();
   		$this->load->view('newly_registers/newly_registers_view', $data);
   		
   		}

  public function get_disable_subsidies(){
      $data = array();
      $this->load->model('people1_model');
      $data['disableSubsidiesGranters'] = $this->people1_model->filterDisableSubsidiesGranters();

      $this->load->view('disable_subsidies/disable_subsidies_view', $data);
      }

     public function newly_register(){
      $data = array();
      $this->load->model('people1_model');
      $data['newlyRegisters'] = $this->people1_model->filterNewlyRegisterPeople1();
      $this->load->view('registers/registers_view', $data);
      
      }

      public function get_percentage_samurdhi_granters(){
      $data = array();
      $this->load->model('income_model');
      $data['samurdhiGranters'] = $this->income_model->filterSamurdhiGranterPersentage();
      $this->load->view('percentage_samurdhi/percentage_samurdhi_view', $data);

   }

   public function not_get_samurdhi(){
      $data = array();
      $this->load->model('income_model');
      $data['NonSamurdhiGranters'] = $this->income_model->filterNonSamurdhiGranters();
      $this->load->view('samurdhi_view/Nonsamurdhi_view', $data);

   }

    public function get_scholarship_subsidies(){
      $data = array();
      $this->load->model('grade5result_model');
      $data['scholarship'] = $this->grade5result_model->filterscholarshipGranter();
      $this->load->view('scholarship_granters/scholarship_granters_view', $data);

   }

     public function focus_on_suwanari_clinic(){
      $data = array();
      $this->load->model('people1_model');
      $data['SuwanariClinic'] = $this->people1_model->filterParticipantsForSuwanariClinic();
      $this->load->view('suwanariClinic/suwanariClinic_view', $data);

   }

   public function filter_low_age_marriage(){
      $data = array();
      $this->load->model('reg_wife_model');
      $data['LowAgeMarriage'] = $this->reg_wife_model->filterLowAgeMarriages();
      $this->load->view('LowAgeMarriage/LowAgeMarriage_view', $data);

   }

      public function filter_A_for_maths(){
      $data = array();
      $this->load->model('ol_result_model');
      $data['AforMaths'] = $this->ol_result_model->filterAforMaths();
      $this->load->view('AforMaths/AforMaths_view', $data);

   }

   public function get_percentage_social_service_granters(){
      $data = array();
      $this->load->model('people1_model');
      $data['socialServiceGranters'] = $this->people1_model->filterSocialServiceGranterPersentage();
      $this->load->view('percentage_social_service/percentage_social_service_view', $data);

   }

   public function get_average_income(){
      $data = array();
      $this->load->model('income_model');
      $data['averageIncome'] = $this->income_model->filterAverageIncome();
      $this->load->view('average_income/average_income_view', $data);

   }

    public function percentage_A_for_maths(){
      $data = array();
      $this->load->model('ol_result_model');
      $data['AforMathsPercentage'] = $this->ol_result_model->filterAforMathsPercentage();
      $this->load->view('AforMathsPrecentage/AforMathsPercentage_view', $data);

   }

    public function percentage_subsidies_granters(){
      $data = array();
      $this->load->model('government_subsidies_model');
      $data['SubsidiesGrantersPercentage'] = $this->government_subsidies_model->filterSubsidiesGrantersPercentage();
      $this->load->view('SubsidiesGrantersPercentage/SubsidiesGrantersPercentage_view', $data);

   }

     public function percentage_get_election(){
      $data = array();
      $this->load->model('people1_model');
      $data['PercentageGetElection'] = $this->people1_model->filterPercentageGetElection();
      $this->load->view('PercentageGetElection/PercentageGetElection_view', $data);

   }
    
    public function ability_to_do_AL(){
      $data = array();
      $this->load->model('ol_result_model');
      $data['AbilityToDoAL'] = $this->ol_result_model->filterStudents();
      $this->load->view('Ability_to_do_AL/Ability_to_do_AL_view', $data);

   }

   public function get_normal_weight_children(){
      $data = array();
      $this->load->model('weight_height_bmi_model');
      $data['NormalWeightChildren'] = $this->weight_height_bmi_model->filterNormalWeightChildren();
      $this->load->view('Normal_weight_children/Normal_weight_children_view', $data);

   }

  }