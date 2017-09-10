<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Roof Type');

             $data=array(
             		'7' => 'Tiles',
             		'8'   => 'Tin',
                    '9'   => 'Thatched',
                    '10'   => 'Asbestos',
                    );
             echo form_dropdown('type', $data, 'Tiles');
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



