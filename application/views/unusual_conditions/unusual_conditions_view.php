<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Unusual Conditions Type:');

             $data=array(
                    '54'   => 'Mentally',
                    '55'   => 'Disabled',
                    '56'   => 'Dump',
                    '57'   => 'Deaf',
                    '58'   => 'Blind',
                    '59'   => 'Noncommunicable Disease'
                    );
             echo form_dropdown('type', $data, 'Mentally');
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



