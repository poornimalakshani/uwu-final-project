<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             

             echo form_label('Birth Weight:');

             $data=array(
                    'name' => 'birth_weight',
                    'id'   => 'birth_weight',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";

             echo form_label('Length at Birth:');

             $data=array(
                    'name' => 'length_at_birth',
                    'id'   => 'length_at_birth',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";

             echo form_label('Size of Head at Birth:');

             $data=array(
                    'name' => 'size_of_head_at_birth',
                    'id'   => 'size_of_head_at_birth',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";

             echo form_label('Health Condition');

             $data=array(
                    '88' => 'Normal',
                    '89'   => 'Premature Birth',
                    '90' => 'Low Weight',
                    '91' => 'Neonatal Competition',
                    '92' => 'Congenital Disabilities',
                    '93' => 'Difficulty Of Breastfeeding',
                    '94' => 'Mother/Father Death',
                    '95' => 'Mother/Father Separation/Foreign Travel'
                    );
             echo form_dropdown('health_condition', $data, 'Normal');
             echo "</br>";
             
            echo form_label('Mother Registration Id:');

             $data=array(
                    'name' => 'reg_wife_id',
                    'id'   => 'reg_wife_id',
                    'value' => ''
                );
             
             echo form_input($data);
             echo "</br>";

             echo form_label('Mother People Id:');

             $data=array(
                    'name' => 'reg_wife_people_id',
                    'id'   => 'reg_wife_people_id',
                    'value' => ''
                );
             
             echo form_input($data);
             echo "</br>";

             echo form_label('Mother Home Id:');

             $data=array(
                    'name' => 'reg_wife_people_home_id',
                    'id'   => 'reg_wife_people_home_id'
                );
             
             echo form_input($data);
             echo "</br>";

              echo form_label('People Id:');

             $data=array(
                    'name' => 'people_id',
                    'id'   => 'people_id',
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



