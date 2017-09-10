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
             echo "</br>";
            

             echo form_label('Date of Birth:');

             $data=array(
             		'name' => 'dateOfBirth',
             		'id'   => 'dateOfBirth',
             		'value' => ''
             	);
             echo form_input($data);
             echo "</br>";
             

             echo form_label('Gender');

             $data=array(
             		'1' => 'Male',
             		'2'   => 'Female'
             		);
             echo form_dropdown('gender', $data, 'Male');
             echo "</br>";
             

             echo form_label('Status');

             $data=array(
             		'3' => 'Single',
             		'4'   => 'Married'
             		);
             echo form_dropdown('status', $data, 'Single');
             echo "</br>";
            
             echo form_label('Living Status');

             $data=array(
             		'5' => 'Live',
             		'6'   => 'Dead'
             		);
             echo form_dropdown('living_status', $data, 'Live');
             echo "</br>";
            

              echo form_label('NIC:');

             $data=array(
             		'name' => 'nic',
             		'id'   => 'nic',
             		'value' => ''
             	);
             echo form_input($data);
             echo "</br>";
             
              echo form_label('Home_Id:');

             $data=array(
             		'name' => 'home_id',
             		'id'   => 'home_id',
             		'value' => ''
             	);
             
             echo form_input($data);
             echo "</br>";

             echo form_label('Register on Electroral Registry');

             $data=array(
                    '81' => 'Yes',
                    '82'   => 'No'
                    );
             echo form_dropdown('register_on_electroral_registry', $data, 'Yes');
             echo "</br>";
             
             echo form_submit('submit', 'Save');
            echo form_close('');
        ?>

    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>   



