<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Age:');

             $data=array(
             		'name' => 'age',
             		'id'   => 'age',
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

             echo form_label('Height:');

             $data=array(
                    'name' => 'height',
                    'id'   => 'height',
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
             

             echo form_label('Shorter');

             $data=array(
             		'269' => 'Havent disabilities',
             		'270'   => 'Have disabilities'
             		);
             echo form_dropdown('shorter', $data, 'Havent disabilities');
             echo "</br>";
             

             echo form_label('Slimness');

             $data=array(
                    '269' => 'Havent disabilities',
                    '270'   => 'Have disabilities'
                    );
             echo form_dropdown('slimness', $data, 'Havent disabilities');
             echo "</br>";
            
             echo form_label('High Weight');

             $data=array(
                    '269' => 'Havent disabilities',
                    '270'   => 'Have disabilities'
                    );
             echo form_dropdown('high_weight', $data, 'Havent disabilities');
             echo "</br>";

             echo form_label('Strabismus');

             $data=array(
                    '269' => 'Havent disabilities',
                    '270'   => 'Have disabilities'
                    );
             echo form_dropdown('strabismus', $data, 'Havent disabilities');
             echo "</br>";

             echo form_label('Vision');

             $data=array(
                    '269' => 'Havent disabilities',
                    '270'   => 'Have disabilities'
                    );
             echo form_dropdown('vision', $data, 'Havent disabilities');
             echo "</br>";

             echo form_label('Hear');

             $data=array(
                    '269' => 'Havent disabilities',
                    '270'   => 'Have disabilities'
                    );
             echo form_dropdown('hear', $data, 'Havent disabilities');
             echo "</br>";

             echo form_label('Speaking');

             $data=array(
                    '269' => 'Havent disabilities',
                    '270'   => 'Have disabilities'
                    );
             echo form_dropdown('speaking', $data, 'Havent disabilities');
             echo "</br>";

             echo form_label('Dental Defects');

             $data=array(
                    '269' => 'Havent disabilities',
                    '270'   => 'Have disabilities'
                    );
             echo form_dropdown('dental_defects', $data, 'Havent disabilities');
             echo "</br>";

             echo form_label('Florosiya');

             $data=array(
                    '269' => 'Havent disabilities',
                    '270'   => 'Have disabilities'
                    );
             echo form_dropdown('florosiya', $data, 'Havent disabilities');
             echo "</br>";

             echo form_label('Goitre');

             $data=array(
                    '269' => 'Havent disabilities',
                    '270'   => 'Have disabilities'
                    );
             echo form_dropdown('goitre', $data, 'Havent disabilities');
             echo "</br>";

             echo form_label('Bone Defects');

             $data=array(
                    '269' => 'Havent disabilities',
                    '270'   => 'Have disabilities'
                    );
             echo form_dropdown('bone_defects', $data, 'Havent disabilities');
             echo "</br>";

             echo form_label('Heart');

             $data=array(
                    '269' => 'Havent disabilities',
                    '270'   => 'Have disabilities'
                    );
             echo form_dropdown('heart', $data, 'Havent disabilities');
             echo "</br>";

             echo form_label('Lungs');

             $data=array(
                    '269' => 'Havent disabilities',
                    '270'   => 'Have disabilities'
                    );
             echo form_dropdown('lungs', $data, 'Havent disabilities');
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



