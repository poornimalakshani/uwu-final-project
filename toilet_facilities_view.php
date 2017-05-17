<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Toilet Type');

             $data=array(
             		'20' => 'Water Sield Toilets',
             		'21'   => 'Normal Toilets'
                    );
             echo form_dropdown('type', $data, 'Water Sield Toilets');
             echo "</br>";
             

             echo form_label('Home_Id:');

             $data=array(
             		'name' => 'home_id',
             		'id'   => 'home_id',
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



