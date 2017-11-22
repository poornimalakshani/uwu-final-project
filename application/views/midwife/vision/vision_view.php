<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Age:');

             $data=array(
                    '155'   => 'From_1stWeek',
                    '146'   => '2Months Complete',
                    '148'   => '6Months Complete',
                    '149'   => '9Months Complete',
                    '166'   => '12Months Completed'
                    
                     );
             echo form_dropdown('age', $data, 'From_1stWeek');
             echo "</br>";
            

             echo form_label('Criterian:');

             $data=array(
                    '201'   => 'Does Baby Directed Eyes Towards Light',
                    '202'   => 'Does Baby See Your Face Well',
                    '203'   => 'Does Baby Laugh When Your Face Turn Both Side',
                    '204'   => 'Does Then Babys Eyes Move Together',
                    '205'   => 'Does Baby Carefully Watch Around',
                    '206'   => 'Does BabyTry To Catch Something',
                    '207'   => 'Do You Think That Baby Has Strabismus',
                    '208'   => 'Does Baby Have Ability To Take Something Using two fingurs',
                    '209'   => 'Does Baby Ask Many Things Using Hand',
                    '210'   => 'Does Child Idendify Known People'
                    );
             echo form_dropdown('criterian', $data, 'Does Baby Directed Eyes Towards Light');
             echo "</br>";

              echo form_label('Condition:');

             $data=array(
                    '81'   => 'Yes',
                    '82'   => 'No'
                     );
             echo form_dropdown('condition', $data, 'Yes');
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



