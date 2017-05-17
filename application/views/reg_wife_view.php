<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Education condition:');

             $data=array(
             		'name' => 'education_condition',
             		'id'   => 'education_condition',
             		'value' => ''
             	);
             echo form_input($data);
             echo "</br>";
            

             echo form_label('Age in Marriage:');

             $data=array(
             		'name' => 'age_in_marriage',
             		'id'   => 'age_in_marriage',
             		'value' => ''
             	);
             echo form_input($data);
             echo "</br>";
             

             echo form_label('Protected on Rubella');

             $data=array(
             		'81' => 'Yes',
             		'82'   => 'No'
             		);
             echo form_dropdown('protected_on_rubella', $data, 'Yes');
             echo "</br>";
             
             echo form_label('People_Id:');

             $data=array(
             		'name' => 'people_id',
             		'id'   => 'people_id',
             		'value' => ''
             	);
             
             echo form_input($data);
             echo "</br>";

             echo form_label('Home_Id:');

             $data=array(
                    'name' => 'people_home_id',
                    'id'   => 'people_home_id'
                );
             
             echo form_input($data);
             echo "</br>";
             
             echo form_submit('submit', 'Save');
            echo form_close('');
        ?>

    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>   



