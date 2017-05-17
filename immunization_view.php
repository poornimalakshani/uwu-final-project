<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Age:');

             $data=array(
                    '145'   => 'At birth',
                    '146'   => '2Months Complete',
                    '147'   => '4Months Complete',
                    '148'   => '6Months Complete',
                    '149'   => '9Months Complete',
                    '150'   => '18Months Complete',
                    '151'   => '3Years Complete',
                    '152'   => '5Years Complete',
                    '153'   => '10-14Years Complete'
                    );
             echo form_dropdown('age', $data, 'At birth');
             echo "</br>";


             echo form_label('Vaccine Type:');

             $data=array(
                    '176'   => 'B.C.G',
                    '177'   => 'DPT 1',
                    '178'   => 'OPV 1',
                    '179'   => 'Hepatitis B1',
                    '180'   => 'DPT 2',
                    '181'   => 'OPV 2',
                    '182'   => 'Hepatitis B2',
                    '183'   => 'DPT 3',
                    '184'   => 'OPV 3',
                    '185'   => 'Hepatitis B3',
                    '186'   => 'Measles',
                    '187'   => 'Vitamin A',
                    '188'   => 'DPT 4',
                    '189'   => 'OPV 4',
                    '190'   => 'Vitamin A',
                    '191'   => 'Measles & Rubella',
                    '192'   => 'Vitamin A',
                    '193'   => 'DT',
                    '194'   => 'OPV 5',
                    '195'   => 'Rubella',
                    '196'   => 'atd',
                    '197'   => 'JE1',
                    '198'   => 'JE2',
                    '199'   => 'JE3',
                    '200'   => 'JE4'
                    );
             echo form_dropdown('type_of_vaccine', $data, 'B.C.G');
             echo "</br>";
            

             echo form_label('Date:');
             $data=array(
                    'name' => 'date',
                    'id'   => 'date',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";

             echo form_label('Batch No:');
             $data=array(
                    'name' => 'batch_no',
                    'id'   => 'batch_no',
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



