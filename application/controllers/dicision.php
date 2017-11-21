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

		$data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-samurdhi-granters";
   		$this->load->view('samurdhi_view/samurdhi_view', $data);

   }

   public function get_social_service(){
   		$data = array();
   		$this->load->model('people1_model');
   		$data['socialServiceGranters'] = $this->people1_model->filterSocialServiceGranters();

		$data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-social-service";
   		$this->load->view('social_service/social_service_view', $data);
   		
   	}

   public function register(){
   		$data = array();
   		$this->load->model('people1_model');
   		$data['newlyRegisters'] = $this->people1_model->filterNewlyRegisterPeople();

		$data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-register";
   		$this->load->view('newly_registers/newly_registers_view', $data);
   		
   		}

  public function get_disable_subsidies(){
      $data = array();
      $this->load->model('people1_model');
      $data['disableSubsidiesGranters'] = $this->people1_model->filterDisableSubsidiesGranters();

	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-get-disable-subsidies";
      $this->load->view('disable_subsidies/disable_subsidies_view', $data);
      }

     public function newly_register(){
      $data = array();
      $this->load->model('people1_model');
      $data['newlyRegisters'] = $this->people1_model->filterNewlyRegisterPeople1();

	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-newly-register";
      $this->load->view('registers/registers_view', $data);
      
      }

    public function get_percentage_samurdhi_granters(){
		$data = array();
		$this->load->model('income_model');
		$data['samurdhiGranters'] = $this->income_model->filterSamurdhiGranterPersentage();

		$data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-percentage-samurdhi-granters";
		$this->load->view('percentage_samurdhi/percentage_samurdhi_view', $data);

   }

	public function not_get_samurdhi(){
		$data = array();
		$this->load->model('income_model');
		$data['NonSamurdhiGranters'] = $this->income_model->filterNonSamurdhiGranters();

		$data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-not-get-samurdhi";
		$this->load->view('samurdhi_view/Nonsamurdhi_view', $data);

   }

    public function get_scholarship_subsidies(){
      $data = array();
      $this->load->model('grade5result_model');
      $data['scholarship'] = $this->grade5result_model->filterscholarshipGranter();

	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-get-scholarship-subsidies";
      $this->load->view('scholarship_granters/scholarship_granters_view', $data);

   }

     public function focus_on_suwanari_clinic(){
      $data = array();
      $this->load->model('people1_model');
      $data['SuwanariClinic'] = $this->people1_model->filterParticipantsForSuwanariClinic();

	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-focus-on-suwanari-clinic";
      $this->load->view('suwanariClinic/suwanariClinic_view', $data);

   }

   public function filter_low_age_marriage(){
      $data = array();
      $this->load->model('reg_wife_model');
      $data['LowAgeMarriage'] = $this->reg_wife_model->filterLowAgeMarriages();
	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-filter-low-age-marriage";
      $this->load->view('LowAgeMarriage/LowAgeMarriage_view', $data);

   }

      public function filter_A_for_maths(){
      $data = array();
      $this->load->model('ol_result_model');
      $data['AforMaths'] = $this->ol_result_model->filterAforMaths();
	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-filter_A_for_maths";
      $this->load->view('AforMaths/AforMaths_view', $data);

   }

   public function get_percentage_social_service_granters(){
      $data = array();
      $this->load->model('people1_model');
      $data['socialServiceGranters'] = $this->people1_model->filterSocialServiceGranterPersentage();
	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-get_percentage_social_service_granters";
      $this->load->view('percentage_social_service/percentage_social_service_view', $data);

   }

   public function get_average_income(){
      $data = array();
      $this->load->model('income_model');
      $data['averageIncome'] = $this->income_model->filterAverageIncome();
	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-get_average_income";
      $this->load->view('average_income/average_income_view', $data);

   }

    public function percentage_A_for_maths(){
      $data = array();
      $this->load->model('ol_result_model');
      $data['AforMathsPercentage'] = $this->ol_result_model->filterAforMathsPercentage();
	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-percentage_A_for_maths";
      $this->load->view('AforMathsPrecentage/AforMathsPercentage_view', $data);

   }

    public function percentage_subsidies_granters(){
      $data = array();
      $this->load->model('government_subsidies_model');
      $data['SubsidiesGrantersPercentage'] = $this->government_subsidies_model->filterSubsidiesGrantersPercentage();
	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-percentage_subsidies_granters";
      $this->load->view('SubsidiesGrantersPercentage/SubsidiesGrantersPercentage_view', $data);

   }

     public function percentage_get_election(){
      $data = array();
      $this->load->model('people1_model');
      $data['PercentageGetElection'] = $this->people1_model->filterPercentageGetElection();
	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-percentage_get_election";
      $this->load->view('PercentageGetElection/PercentageGetElection_view', $data);

   }
    
    public function ability_to_do_AL(){
      $data = array();
      $this->load->model('ol_result_model');
      $data['AbilityToDoAL'] = $this->ol_result_model->filterStudents();
	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-ability_to_do_AL";
      $this->load->view('Ability_to_do_AL/Ability_to_do_AL_view', $data);

   }

   public function get_normal_weight_children(){
      $data = array();
      $this->load->model('weight_height_bmi_model');
      $data['NormalWeightChildren'] = $this->weight_height_bmi_model->filterNormalWeightChildren();
	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-get_normal_weight_children";
      $this->load->view('Normal_weight_children/Normal_weight_children_view', $data);

   }

   public function get_risk_to_weight_children(){
      $data = array();
      $this->load->model('weight_height_bmi_model');
      $data['RiskWeightChildren'] = $this->weight_height_bmi_model->filterRiskToWeightChildren();
	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-get_risk_to_weight_children";
      $this->load->view('Risk_weight_children/Risk_weight_children_view', $data);

   }

   public function get_malnutrition_children(){
      $data = array();
      $this->load->model('weight_height_bmi_model');
      $data['MalnutritionChildren'] = $this->weight_height_bmi_model->filterMalnutritionChildren();
	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-get_malnutrition_children";
      $this->load->view('Malnutrition_children/Malnutrition_children_view', $data);

   }

   public function get_malnutrition_percentage(){
      $data = array();
      $this->load->model('weight_height_bmi_model');
      $data['MalnutritionPercentage'] = $this->weight_height_bmi_model->filterMalnutritionPercentage();
	  
	  $data['menu'] = "dicisions";
		$data['submenu'] = "dicisions-get_malnutrition_percentage";
      $this->load->view('Malnutrition_percentage/Malnutrition_precentage_view', $data);

   }

  }