<?php if($this->session->userdata('admin')) { ?>
<div class="nav-side-menu navbar-inverse bg-inverse">
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
            <li <?=(isset($menu) && $menu=='dashboard') ? 'class="active"':''; ?>><a href="/"><i class="fa fa-dashboard fa-lg"></i> Dashboard</a></li>
			<li <?=(isset($menu) && $menu=='settings-list') ? 'class="active"':''; ?>><a href="/settings/list_data"><i class="fa fa-wrench fa-lg"></i> Settings List</a></li>
            <li data-toggle="collapse" data-target="#grama-niladhari" class="collapsed ">
                <a href="#"><i class="fa fa-file fa-lg"></i> Grama Niladhari <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse <?=(isset($menu) && $menu=='grama-niladhari')?'show':''?>" id="grama-niladhari">
                <li <?=(isset($submenu) && $submenu=='grama-niladhari-home') ? 'class="active"':''; ?>><a href="/grama_niladhari/home">Home </a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-people') ? 'class="active"':''; ?>><a href="/grama_niladhari/people1">People</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-al-result') ? 'class="active"':''; ?>><a href="/grama_niladhari/al_result">A/L Result</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-floor-type') ? 'class="active"':''; ?>><a href="/grama_niladhari/floor">Floor Type</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-subsidies-type') ? 'class="active"':''; ?>><a href="/grama_niladhari/government_subsidies">Subsidies Type</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-roof-type') ? 'class="active"':''; ?>><a href="/grama_niladhari/roof">Roof Type</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-toilet-type') ? 'class="active"':''; ?>><a href="/grama_niladhari/toilet_facilities">Toilet Type</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-water-facility-type') ? 'class="active"':''; ?>><a href="/grama_niladhari/water_facilities">Water Facility Type</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-wall-type') ? 'class="active"':''; ?>><a href="/grama_niladhari/wall">Wall Type</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-vehicles') ? 'class="active"':''; ?>><a href="/grama_niladhari/vehicles">Vehicles</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-unusual-conditions') ? 'class="active"':''; ?>><a href="/grama_niladhari/unusual_conditions">Unusual Conditions</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-overseas') ? 'class="active"':''; ?>><a href="/grama_niladhari/overseas">Overseas</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-ol-results') ? 'class="active"':''; ?>><a href="/grama_niladhari/ol_result">O/L Results</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-jobs') ? 'class="active"':''; ?>><a href="/grama_niladhari/job">Jobs</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-institutes') ? 'class="active"':''; ?>><a href="/grama_niladhari/institutes">Institutes</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-exam-years') ? 'class="active"':''; ?>><a href="/grama_niladhari/examyears">Exam Years</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-grade-5') ? 'class="active"':''; ?>><a href="/grama_niladhari/grade5result">Grade 5 Result</a></li>
				<li <?=(isset($submenu) && $submenu=='grama-niladhari-income') ? 'class="active"':''; ?>><a href="/grama_niladhari/income">Income</a></li>
            </ul>
            <li data-toggle="collapse" data-target="#midwife" class="collapsed">
                <a href="#"><i class="fa fa-heartbeat fa-lg"></i> Midwife <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse <?=(isset($menu) && $menu=='midwife')?'show':''?>" id="midwife">
                <li <?=(isset($submenu) && $submenu=='midwife-reg-wife') ? 'class="active"':''; ?>><a href="/midwife/reg_wife">Register Wife </a></li>
				<li <?=(isset($submenu) && $submenu=='midwife-reg-husband') ? 'class="active"':''; ?>><a href="/midwife/reg_husband">Register Husband </a></li>
				<li <?=(isset($submenu) && $submenu=='midwife-about-children') ? 'class="active"':''; ?>><a href="/midwife/about_children">About children</a></li>
				<li <?=(isset($submenu) && $submenu=='midwife-about-pregnancy') ? 'class="active"':''; ?>><a href="/midwife/about_pregnancy">About Pregnancy</a></li>
				<li <?=(isset($submenu) && $submenu=='midwife-reg-child') ? 'class="active"':''; ?>><a href="/midwife/reg_child">Child Registration</a></li>
				<li <?=(isset($submenu) && $submenu=='midwife-after-schooling') ? 'class="active"':''; ?>><a href="/midwife/after_schooling">After Schooling</a></li>
				<li <?=(isset($submenu) && $submenu=='midwife-development') ? 'class="active"':''; ?>><a href="/midwife/development">Development</a></li>
				<li <?=(isset($submenu) && $submenu=='midwife-bmi') ? 'class="active"':''; ?>><a href="/midwife/weight_height_bmi">Weight Height BMI</a></li>
				<li <?=(isset($submenu) && $submenu=='midwife-vision') ? 'class="active"':''; ?>><a href="/midwife/vision">Vision</a></li>
				<li <?=(isset($submenu) && $submenu=='midwife-child-health') ? 'class="active"':''; ?>><a href="/midwife/newly_born_child_health">Newly Born Child Health</a></li>
				<li <?=(isset($submenu) && $submenu=='midwife-montisoory') ? 'class="active"':''; ?>><a href="/midwife/montisoory_children">Montisoory Children</a></li>
				<li <?=(isset($submenu) && $submenu=='midwife-immunization') ? 'class="active"':''; ?>><a href="/midwife/immunization">Immunization</a></li>
				<li <?=(isset($submenu) && $submenu=='midwife-hospital') ? 'class="active"':''; ?>><a href="/midwife/hospital_admissions">Hospital Admissions</a></li>
				<li <?=(isset($submenu) && $submenu=='midwife-hear') ? 'class="active"':''; ?>><a href="/midwife/hear">Hear</a></li>
				<li <?=(isset($submenu) && $submenu=='midwife-mother') ? 'class="active"':''; ?>><a href="/midwife/pregnent_mother">Pregnent Mother</a></li>
            </ul>


            <li data-toggle="collapse" data-target="#dicisions" class="collapsed">
                <a href="#"><i class="fa fa-search fa-lg"></i> Dicisions <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse <?=(isset($menu) && $menu=='dicisions')?'show':''?>" id="dicisions">
				<li <?=(isset($submenu) && $submenu=='dicisions-samurdhi-granters') ? 'class="active"':''; ?>><a href="/dicision/get_samurdhi">Who grant Samurdhi?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-social-service') ? 'class="active"':''; ?>><a href="/dicision/get_social_service">Who grant Social Service Subsidies?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-register') ? 'class="active"':''; ?>><a href="/dicision/register">Who register in list?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-get-disable-subsidies') ? 'class="active"':''; ?>><a href="/dicision/get_disable_subsidies">Who grant Disable Subsidies?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-newly-register') ? 'class="active"':''; ?>><a href="/dicision/newly_register">Who Register?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-percentage-samurdhi-granters') ? 'class="active"':''; ?>><a href="/dicision/get_percentage_samurdhi_granters">Percentage of Samurdhi Granters?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-not-get-samurdhi') ? 'class="active"':''; ?>><a href="/dicision/not_get_samurdhi">Who do not grant Samurdhi?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-get-scholarship-subsidies') ? 'class="active"':''; ?>><a href="/dicision/get_scholarship_subsidies">Who grant Scholarship?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-focus-on-suwanari-clinic') ? 'class="active"':''; ?>><a href="/dicision/focus_on_suwanari_clinic">Who Participate For Suwanari Clinic?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-filter-low-age-marriage') ? 'class="active"':''; ?>><a href="/dicision/filter_low_age_marriage">Who get married in low age?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-filter_A_for_maths') ? 'class="active"':''; ?>><a href="/dicision/filter_A_for_maths">Who get A pass for Ordinary Level Mathamatics?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-get_percentage_social_service_granters') ? 'class="active"':''; ?>><a href="/dicision/get_percentage_social_service_granters">Percentage of Social Service Granters?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-get_average_income') ? 'class="active"':''; ?>><a href="/dicision/get_average_income">Average Income?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-percentage_A_for_maths') ? 'class="active"':''; ?>><a href="/dicision/percentage_A_for_maths">Who get A pass for Mathamatics in Ordinary Level?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-percentage_subsidies_granters') ? 'class="active"':''; ?>><a href="/dicision/percentage_subsidies_granters">Percentage of all subsidies granters?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-percentage_get_election') ? 'class="active"':''; ?>><a href="/dicision/percentage_get_election">Percentage of who have ability to get Election?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-ability_to_do_AL') ? 'class="active"':''; ?>><a href="/dicision/ability_to_do_AL">Who have ability to do Advanced Level?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-get_normal_weight_children') ? 'class="active"':''; ?>><a href="/dicision/get_normal_weight_children">Children who have Normal Weight?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-get_risk_to_weight_children') ? 'class="active"':''; ?>><a href="/dicision/get_risk_to_weight_children">Children who have Risk For Malnutrition ?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-get_malnutrition_children') ? 'class="active"':''; ?>><a href="/dicision/get_malnutrition_children">Children who have Malnutrition ?</a></li>
				<li <?=(isset($submenu) && $submenu=='dicisions-get_malnutrition_percentage') ? 'class="active"':''; ?>><a href="/dicision/get_malnutrition_percentage">Percentage pf Malnutrition Children ?</a></li>
            </ul>
			<li data-toggle="collapse" data-target="#charts" class="collapsed">
                <a href="#"><i class="fa fa-pie-chart fa-lg"></i> Charts <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse <?=(isset($menu) && $menu=='charts')?'show':''?>" id="charts">
                <li <?=(isset($submenu) && $submenu=='charts-Chart_view') ? 'class="active"':''; ?>><a href="/Chart/Chart_view">Who Get Samurdhi?</a></li>
                <li <?=(isset($submenu) && $submenu=='charts-Register_Chart_view') ? 'class="active"':''; ?>><a href="/Chart/Register_Chart_view">Who Get Election?</a></li>
                <li <?=(isset($submenu) && $submenu=='charts-Subsidies_Chart_view') ? 'class="active"':''; ?>><a href="/Chart/Subsidies_Chart_view">All Subsidies Granters?</a></li>
                <li <?=(isset($submenu) && $submenu=='charts-Malnutrition_Chart_view') ? 'class="active"':''; ?>><a href="/Chart/Malnutrition_Chart_view">Distrinution of Normal, Risk for Malnutrition and Malnutrition?</a></li>
                <li <?=(isset($submenu) && $submenu=='charts-income-chart_view') ? 'class="active"':''; ?>><a href="/Chart/income_chart_view">Population based on the Income?</a></li>
            </ul>
            <li <?=(isset($menu) && $menu=='profile_manager') ? 'class="active"':''; ?>>
                <a href="/user_manager/profile">
                    <i class="fa fa-user fa-lg"></i> Profile
                </a>
            </li>
            <li>
                <a href="/login/logout">
                    <i class="fa fa-sign-out fa-lg"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</div>
<?php } ?>
