<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Vehicle Type:');

             $data=array(
                    '46'   => 'Car',
                    '47'   => 'Van',
                    '48'   => 'Bus',
                    '49'   => 'Motor Bicycle',
                    '50'   => 'Bicycle',
                    '51'   => 'Three Wheel',
                    '52'   => 'Scooter',
                    '50'   => 'Lorry',
                    '329'   => 'Bicycle'
                    );
             echo form_dropdown('type', $data, 'Car');
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



