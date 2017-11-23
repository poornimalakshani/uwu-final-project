<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['settings/list_data/view/(:any)'] = "settings/list_data/view/$1";
$route['settings/list_data/edit/(:any)'] = "settings/list_data/edit/$1";
$route['settings/list_data/delete/(:any)'] = "settings/list_data/delete/$1";
$route['settings/list_data/edit_filed/(:any)'] = "settings/list_data/edit_filed/$1";

$route['grama_niladhari/people1/add_edit/(:any)'] = "grama_niladhari/people1/add_edit/$1";
$route['grama_niladhari/people1/delete/(:any)'] = "grama_niladhari/people1/delete/$1";
$route['grama_niladhari/people1/(:any)'] = "grama_niladhari/people1/index/$1";

$route['grama_niladhari/al_result/add_edit/(:any)'] = "grama_niladhari/al_result/add_edit/$1";
$route['grama_niladhari/al_result/delete/(:any)'] = "grama_niladhari/al_result/delete/$1";
$route['grama_niladhari/al_result/(:any)/(:any)'] = "grama_niladhari/al_result/index/$1/$2";
$route['grama_niladhari/al_result/(:any)'] = "grama_niladhari/al_result/index/$1";

$route['grama_niladhari/(:any)/add_edit/(:any)'] = "grama_niladhari/$1/add_edit/$2";
$route['grama_niladhari/(:any)/delete/(:any)'] = "grama_niladhari/$1/delete/$2";
$route['grama_niladhari/(:any)/(:any)'] = "grama_niladhari/$1/index/$2";



$route['home/home_view'] = "home/home_view";
$route['people/people_view1'] = "people/people_view1";
$route['reg_wife/reg_wife_view'] = "reg_wife/reg_wife_view";
$route['reg_husband/reg_husband_view'] = "reg_husband/reg_husband_view";
$route['about_children/about_children_view'] = "about_children/about_children_view";
$route['about_pregnancy/about_pregnancy_view'] = "about_pregnancy/about_pregnancy_view";
$route['reg_child/reg_child_view'] = "reg_child/reg_child_view";
$route['al_result/al_result_view'] = "al_result/al_result_view";
$route['after_schooling/after_schooling_view'] = "after_schooling/after_schooling_view";
$route['development/development_view'] = "development/development_view";
$route['floor/floor_view'] = "floor/floor_view";
$route['government_subsidies/government_subsidies_view'] = "government_subsidies/government_subsidies_view";
$route['roof/roof_view'] = "roof/roof_view";
$route['toilet_facilities/toilet_facilities_view'] = "toilet_facilities/toilet_facilities_view";
$route['water_facilities/water_facilities_view'] = "water_facilities/water_facilities_view";
$route['wall/wall_view'] = "wall/wall_view";
$route['weight_height_bmi/weight_height_bmi_view'] = "weight_height_bmi/weight_height_bmi_view";
$route['vision/vision_view'] = "vision/vision_view";
$route['vehicles/vehicles_view'] = "vehicles/vehicles_view";
$route['unusual_conditions/unusual_conditions_view'] = "unusual_conditions/unusual_conditions_view";
$route['pregnent_mother/pregnent_mother_view'] = "pregnent_mother/pregnent_mother_view";
$route['overseasr/overseas_view'] = "overseasr/overseas_view";
$route['ol_result/ol_result_view'] = "ol_result/ol_result_view";
$route['newly_born_child_health/newly_born_child_health_view'] = "newly_born_child_health/newly_born_child_health_view";
$route['montisoory_children/montisoory_children_view'] = "montisoory_children/montisoory_children_view";
$route['job/job_view'] = "job/job_view";
$route['institutes/institutes_view'] = "institutes/institutes_view";
$route['income/income_view'] = "income/income_view";
$route['immunization/immunization_view'] = "immunization/immunization_view";
$route['hospital_admissions/hospital_admissions_view'] = "hospital_admissions/hospital_admissions_view";
$route['hear/hear_view'] = "hear/hear_view";
$route['examyears/examyears_view'] = "examyears/examyears_view";
$route['grade5result/grade5result_view'] = "grade5result/grade5result_view";
$route['Chart/Chart_view'] = "OurChart/index";
$route['Chart/Register_Chart_view'] = "RegisterChart/index";
$route['Chart/Subsidies_Chart_view'] = "SubsidiesChart/index";
$route['Chart/Malnutrition_Chart_view'] = "MalnutritionChart/index";
$route['Chart/income_chart_view'] = "income_chart/index";