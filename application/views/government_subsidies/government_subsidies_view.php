<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Subsidies Type');

             $data=array(
             		'41' => 'Samurdhi',
             		'42'   => 'Furtilizer Subsidies',
                    '43'   => 'Social Services Subsidies',
                    '44' => 'Gardening Aids',
                    '45' => 'Cancer Aids',
                    '324' => 'Mahapola',
                    '325' => 'Bursary',
                    );
             echo form_dropdown('type', $data, 'Samurdhi');
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



