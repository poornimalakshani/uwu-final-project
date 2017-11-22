<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Water Facility Type');

             $data=array(
             		'17' => 'Well',
             		'18'   => 'Borehole',
                    '19'   => 'Tap Water'
                    );
             echo form_dropdown('type', $data, 'Well');
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



