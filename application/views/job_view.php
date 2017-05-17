<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Job Type:');

             $data=array(
                    '22'   => 'Teacher',
                    '23'   => 'Doctor',
                    '24'   => 'Software Engineer',
                    '25'   => 'Nurse',
                    '26'   => 'Engineer',
                    '27'   => 'Accountant',
                    '28'   => 'Clerk',
                    '29'   => 'Business',
                    '30'   => 'Masonary',
                    '31'   => 'Carpentry',
                    '32'   => 'Garment',
                    '33'   => 'Garaj',
                    '34'   => 'Driver',
                    '35'   => 'Conductor',
                    '36'   => 'Army',
                    '37'   => 'Navy',
                    '38'   => 'Air Force',
                    '39'   => 'Police',
                    '40'   => 'Overseas',
                    '226'   => 'Labour'
                    );
             echo form_dropdown('type', $data, 'Teacher');
             echo "</br>";
            

             echo form_label('People Id:');
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
                    'id'   => 'people_home_id',
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



