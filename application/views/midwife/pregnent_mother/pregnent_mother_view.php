<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

              echo form_label('Weight:');
             $data=array(
                    'name' => 'weight',
                    'id'   => 'weight',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";

             echo form_label('Pressuer:');
             $data=array(
                    'name' => 'pressuer',
                    'id'   => 'pressuer',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";

             echo form_label('Suger Level:');
             $data=array(
                    'name' => 'suger_level',
                    'id'   => 'suger_level',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";

             echo form_label('Mother Id:');
             $data=array(
                    'name' => 'reg_wife_id',
                    'id'   => 'reg_wife_id',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";

             echo form_label('People Id:');
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
                    'id'   => 'reg_wife_people_home_id',
                    'value' => ''
                );
             
             echo form_input($data);
             echo "</br>";
             
             echo form_submit('submit', 'Save');
            echo form_close('');
        ?>

    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>   



