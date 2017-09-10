<?php 
$this->load->view('layouts/header');
	echo validation_errors();
    echo form_open(''); //create form for login

    echo form_label('User Name :');
    echo form_input(array(
    	'type' => 'text',
    	'name' => 'username',
    	'value' => set_value('username')
    ));
    echo "</br>";

    echo form_label('Passward :');
    echo form_input(array(
    	'type' => 'password',
    	'name' => 'password'
    ));
    echo "</br>";

    echo form_submit('submit', 'Login');
    echo form_close('');
$this->load->view('layouts/footer'); ?>    

    