<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class income_chart extends CI_Controller {
 
    function __Construct() {
        parent::__Construct();
 
        $this->load->helper(array('form', 'url'));
        $this->load->model('income_chart_model');
       
    }
    /**
     * @desc: This method is used to load view
     */

 public function index()
    {
        $data['menu'] = "charts";
        $data['submenu'] = "charts-income_chart_view";
        $this->load->view('Chart/income_chart_view', $data);
    }
        
    /**
     * @desc: This method is used to get data to call model and print it into Json
     * This method called by Ajax
     */
    function getdata(){
        $data  = $this->income_chart_model->getdata();
        print_r(json_encode($data, true));
    }
}