<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Number in Alive:');

             $data=array(
             		'name' => 'number_in_alive',
             		'id'   => 'number_in_alive',
             		'value' => ''
             	);
             echo form_input($data);
             echo "</br>";
            

             echo form_label('Number in below 5 years:');

             $data=array(
             		'name' => 'number_in_below_5years',
             		'id'   => 'number_in_below_5years',
             		'value' => ''
             	);
             echo form_input($data);
             echo "</br>";
             

             echo form_label('Wife Registration Id:');

             $data=array(
                    'name' => 'reg_wife_id',
                    'id'   => 'reg_wife_id',
                    'value' => ''
                );
             
             echo form_input($data);
             echo "</br>";

             echo form_label('People_Id:');

             $data=array(
             		'name' => 'reg_wife_people_id',
             		'id'   => 'reg_wife_people_id',
             		'value' => ''
             	);
             
             echo form_input($data);
             echo "</br>";

             echo form_label('Home_Id:');

             $data=array(
                    'name' => 'reg_wife_people_home_id',
                    'id'   => 'reg_wife_people_home_id'
                );
             
             echo form_input($data);
             echo "</br>";
             
             echo form_submit('submit', 'Save');
            echo form_close('');
        ?>

    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>   



