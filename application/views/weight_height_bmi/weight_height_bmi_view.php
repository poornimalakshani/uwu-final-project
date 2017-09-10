<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Age:');

             $data=array(
                    '100'   => '1st Month',
                    '101'   => '2nd Month',
                    '102'   => '3rd Month',
                    '103'   => '4th Month',
                    '104'   => '5th Month',
                    '105'   => '6th Month',
                    '106'   => '7th Month',
                    '107'   => '8th Month',
                    '108'   => '9th Month',
                    '109'   => '10th Month',
                    '110'   => '11th Month',
                    '111'   => '12th Month',
                    '112'   => '13th Month',
                    '113'   => '14th Month',
                    '114'   => '15th Month',
                    '115'   => '16th Month',
                    '116'   => '17th Month',
                    '117'   => '18th Month',
                    '118'   => '19th Month',
                    '119'   => '20th Month',
                    '120'   => '21th Month',
                    '121'   => '22th Month',
                    '122'   => '23th Month',
                    '123'   => '24th Month',
                    '124'   => '27th Month',
                    '125'   => '30th Month',
                    '126'   => '33th Month',
                    '127'   => '36th Month',
                    '128'   => '39th Month',
                    '129'   => '42th Month',
                    '130'   => '45th Month',
                    '131'   => '48th Month',
                    '132'   => '51th Month',
                    '133'   => '54th Month',
                    '134'   => '57th Month',
                    '135'   => '69th Month'
                     );
             echo form_dropdown('age_duration', $data, '1st Month');
             echo "</br>";
            

             echo form_label('Height:');

             $data=array(
             		'name' => 'height',
             		'id'   => 'height',
             		'value' => ''
             	);
             echo form_input($data);
             echo "</br>";
             

             echo form_label('Weight:');

             $data=array(
             		'name' => 'weight',
             		'id'   => 'weight',
             		'value' => ''
             	);
             echo form_input($data);
             echo "</br>";

              echo form_label('BMI:');

             $data=array(
                    'name' => 'bmi',
                    'id'   => 'bmi',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";
             
              echo form_label('Child Id:');

             $data=array(
                    'name' => 'reg_child_id',
                    'id'   => 'reg_child_id',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";

             echo form_label('Mother Id:');
             $data=array(
                    'name' => 'reg_child_reg_wife_id',
                    'id'   => 'reg_child_reg_wife_id',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";

             echo form_label('Mother People Id:');
             $data=array(
                    'name' => 'reg_child_reg_wife_people_id',
                    'id'   => 'reg_child_reg_wife_people_id',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";
             
              echo form_label('Home_Id:');

             $data=array(
                    'name' => 'reg_child_reg_wife_people_home_id',
                    'id'   => 'reg_child_reg_wife_people_home_id',
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



