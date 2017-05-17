<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Child number:');

             $data=array(
             		'name' => 'child_no',
             		'id'   => 'child_no',
             		'value' => ''
             	);
             echo form_input($data);
             echo "</br>";
            

             echo form_label('Expected Date:');

             $data=array(
             		'name' => 'expected_date',
             		'id'   => 'expected_date',
             		'value' => ''
             	);
             echo form_input($data);
             echo "</br>";

             echo form_label('Birth Condition');

             $data=array(
                    '83' => 'Abortion',
                    '84'   => 'Still Birth',
                    '85'   => 'Live Birth'
                    );
             echo form_dropdown('condition', $data, 'Abortion');
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



