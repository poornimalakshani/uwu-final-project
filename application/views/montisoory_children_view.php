<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Attendance Of Child:');

             $data=array(
                    '264'   => 'Very Good',
                    '265'   => 'Satisfactory',
                    '266'   => 'Normal',
                    '267'   => 'Dissatisfactory',
                    '268'   => 'Have Disabilities',
                    '269'   => 'Havent Disabilities'
                    );
             echo form_dropdown('attendance', $data, 'Very Good');
             echo "</br>";

             echo form_label('Home Condition of Child:');

             $data=array(
                    '264'   => 'Very Good',
                    '265'   => 'Satisfactory',
                    '266'   => 'Normal',
                    '267'   => 'Dissatisfactory',
                    '268'   => 'Have Disabilities',
                    '269'   => 'Havent Disabilities'
                    );
             echo form_dropdown('condition_of_home', $data, 'Very Good');
             echo "</br>";

             echo form_label('Cleanness:');

             $data=array(
                    '264'   => 'Very Good',
                    '265'   => 'Satisfactory',
                    '266'   => 'Normal',
                    '267'   => 'Dissatisfactory',
                    '268'   => 'Have Disabilities',
                    '269'   => 'Havent Disabilities'
                    );
             echo form_dropdown('cleanness', $data, 'Very Good');
             echo "</br>";

             echo form_label('Activities:');

             $data=array(
                    '264'   => 'Very Good',
                    '265'   => 'Satisfactory',
                    '266'   => 'Normal',
                    '267'   => 'Dissatisfactory',
                    '268'   => 'Have Disabilities',
                    '269'   => 'Havent Disabilities'
                    );
             echo form_dropdown('activities', $data, 'Very Good');
             echo "</br>";

             echo form_label('Behavior Problems:');

             $data=array(
                    '264'   => 'Very Good',
                    '265'   => 'Satisfactory',
                    '266'   => 'Normal',
                    '267'   => 'Dissatisfactory',
                    '268'   => 'Have Disabilities',
                    '269'   => 'Havent Disabilities'
                    );
             echo form_dropdown('behavior_problems', $data, 'Very Good');
             echo "</br>";

             echo form_label('Speaking Problems:');

             $data=array(
                    '264'   => 'Very Good',
                    '265'   => 'Satisfactory',
                    '266'   => 'Normal',
                    '267'   => 'Dissatisfactory',
                    '268'   => 'Have Disabilities',
                    '269'   => 'Havent Disabilities'
                    );
             echo form_dropdown('speaking_problems', $data, 'Very Good');
             echo "</br>";

             echo form_label('Listenning Problems:');

             $data=array(
                    '264'   => 'Very Good',
                    '265'   => 'Satisfactory',
                    '266'   => 'Normal',
                    '267'   => 'Dissatisfactory',
                    '268'   => 'Have Disabilities',
                    '269'   => 'Havent Disabilities'
                    );
             echo form_dropdown('listening_problems', $data, 'Very Good');
             echo "</br>";

             echo form_label('Mental Development:');

             $data=array(
                    '264'   => 'Very Good',
                    '265'   => 'Satisfactory',
                    '266'   => 'Normal',
                    '267'   => 'Dissatisfactory',
                    '268'   => 'Have Disabilities',
                    '269'   => 'Havent Disabilities'
                    );
             echo form_dropdown('mental_development', $data, 'Very Good');
             echo "</br>";

             echo form_label('Asthma:');

             $data=array(
                    '264'   => 'Very Good',
                    '265'   => 'Satisfactory',
                    '266'   => 'Normal',
                    '267'   => 'Dissatisfactory',
                    '268'   => 'Have Disabilities',
                    '269'   => 'Havent Disabilities'
                    );
             echo form_dropdown('asthma', $data, 'Very Good');
             echo "</br>";

             echo form_label('Weight:');
             $data=array(
                    'name' => 'weight',
                    'id'   => 'weight',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";

             echo form_label('Height:');
             $data=array(
                    'name' => 'height',
                    'id'   => 'height',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";

             echo form_label('Lack of Vitamin A:');

             $data=array(
                   '270'   => 'Have Disabilities',
                    '271'   => 'Havent Disabilities'
                    );
             echo form_dropdown('lack_of_vitaminA', $data, 'Have Disabilities');
             echo "</br>";

              echo form_label('Strabismus:');

             $data=array(
                   '270'   => 'Have Disabilities',
                    '271'   => 'Havent Disabilities'
                    );
             echo form_dropdown('strabismus', $data, 'Have Disabilities');
             echo "</br>";

              echo form_label('Vision:');

             $data=array(
                   '270'   => 'Have Disabilities',
                    '271'   => 'Havent Disabilities'
                    );
             echo form_dropdown('vission', $data, 'Have Disabilities');
             echo "</br>";

              echo form_label('Hear:');

             $data=array(
                   '270'   => 'Have Disabilities',
                    '271'   => 'Havent Disabilities'
                    );
             echo form_dropdown('hear', $data, 'Have Disabilities');
             echo "</br>";

              echo form_label('Speaking:');

             $data=array(
                   '270'   => 'Have Disabilities',
                    '271'   => 'Havent Disabilities'
                    );
             echo form_dropdown('speaking', $data, 'Have Disabilities');
             echo "</br>";

              echo form_label('Dental Defects:');

             $data=array(
                   '270'   => 'Have Disabilities',
                    '271'   => 'Havent Disabilities'
                    );
             echo form_dropdown('dental_defects', $data, 'Have Disabilities');
             echo "</br>";

              echo form_label('Bone Defects:');

             $data=array(
                   '270'   => 'Have Disabilities',
                    '271'   => 'Havent Disabilities'
                    );
             echo form_dropdown('bone_defects', $data, 'Have Disabilities');
             echo "</br>";

              echo form_label('Heart:');

             $data=array(
                   '270'   => 'Have Disabilities',
                    '271'   => 'Havent Disabilities'
                    );
             echo form_dropdown('heart', $data, 'Have Disabilities');
             echo "</br>";

              echo form_label('Lungs:');

             $data=array(
                   '270'   => 'Have Disabilities',
                    '271'   => 'Havent Disabilities'
                    );
             echo form_dropdown('lungs', $data, 'Have Disabilities');
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

             echo form_label('People Id:');
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



