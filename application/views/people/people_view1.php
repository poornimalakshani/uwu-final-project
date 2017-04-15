<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Full Name:');

             $data=array(
             		'name' => 'fullName',
             		'id'   => 'fullName',
             		'value' => ''
             	);
             echo form_input($data);
            

             echo form_label('Date of Birth:');

             $data=array(
             		'name' => 'dateOfBirth',
             		'id'   => 'dateOfBirth',
             		'value' => ''
             	);
             echo form_input($data);
             

             echo form_label('Gender');

             $data=array(
             		'Male' => '1',
             		'Female'   => '2'
             		);
             echo form_dropdown('gender', $data, 'Male');
             

             echo form_label('Status');

             $data=array(
             		'Single' => '3',
             		'Married'   => '4'
             		);
             echo form_dropdown('status', $data, 'Single');
            
             echo form_label('Living Status');

             $data=array(
             		'Live' => '5',
             		'Dead'   => '6'
             		);
             echo form_dropdown('living_status', $data, 'Live');
            

              echo form_label('NIC:');

             $data=array(
             		'name' => 'nic',
             		'id'   => 'nic',
             		'value' => ''
             	);
             echo form_input($data);
             
              echo form_label('Home_Id:');

             $data=array(
             		'name' => 'home_id',
             		'id'   => 'home_id',
             		'value' => ''
             	);
             
             echo form_input($data);
             
             echo form_submit('submit', 'Save');
            echo form_close('');
        ?>

    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>   



