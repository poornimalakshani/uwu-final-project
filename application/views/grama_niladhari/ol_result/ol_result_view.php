<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Subject:');

             $data=array(
                    '272'   => 'Sinhala',
                    '273'   => 'Mathematics',
                    '274'   => 'Science And Technology',
                    '275'   => 'English',
                    '276'   => 'Buddhism',
                    '277'   => 'Development Studies',
                    '278'   => ' History',
                    '279'   => 'Citizen Education',
                    '280'   => ' Home Science',
                    '281'   => ' Physical Education',
                    '282'   => ' Information Technology',
                    '283'   => ' Geography',
                    '284'   => ' Art',
                    '285'   => ' Music',
                    '286'   => ' Dancing',
                    '287'   => ' English Liturature',
                    '288'   => ' Communication And Media',
                    '289'   => ' Bussiness And Accounting Studies'
                    );
             echo form_dropdown('subject', $data, 'Sinhala');
             echo "</br>";
            

            echo form_label('Result:');
             $data=array(
                    'name' => 'result',
                    'id'   => 'result',
                    'value' => ''
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



