<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

              echo form_label('Result:');

             $data=array(
                    '334' => 'Pass',
                    '335'   => 'Fail'
                    
                    );
             echo form_dropdown('result', $data, 'Pass');
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



