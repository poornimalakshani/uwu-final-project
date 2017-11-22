<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Age:');

             $data=array(
                    '96'   => '1-5Days From  Birth',
                    '97'   => '6-10Days From Birth',
                    '98'   => '11-28Days From Birth',
                    '99'   => 'Near 42days'
                    );
             echo form_dropdown('age_duration', $data, '1-5Days From  Birth');
             echo "</br>";

              echo form_label('Skin:');

             $data=array(
                    '136'   => 'Pink',
                    '137'   => 'Black',
                    '138'   => 'Other'
                    );
             echo form_dropdown('skin', $data, 'Pink');
             echo "</br>";

              echo form_label('Eyes:');

             $data=array(
                    '139'   => 'Normal',
                    '140'   => ' Extraordinary'
                     );
             echo form_dropdown('eyes', $data, 'Normal');
             echo "</br>";

              echo form_label('Navel:');

             $data=array(
                    '141'   => 'With Fluids',
                    '142'   => 'Dry'
                    );
             echo form_dropdown('navel', $data, 'With Fluids');
             echo "</br>";

              echo form_label('Breastfeeding Postural:');

             $data=array(
                    '143'   => 'Correct',
                    '144'   => 'Wrong'
                    );
             echo form_dropdown('breasfeeding_postural', $data, 'Correct');
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



