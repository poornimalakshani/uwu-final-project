<?php 
$this->load->view('layouts/header');
	echo validation_errors();
    echo form_open(''); //create form for login
    echo form_input(array(
    	'type' => 'text',
    	'name' => 'username',
    	'value' => set_value('username')
    ));

    echo form_input(array(
    	'type' => 'password',
    	'name' => 'password'
    ));

    echo form_submit('submit', 'Login');
    echo form_close('');
$this->load->view('layouts/footer'); ?>    

    