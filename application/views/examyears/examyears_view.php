<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

              echo form_label('Exam Type:');

             $data=array(
                    '331' => 'Ordinary Level',
                    '332'   => 'Advanced Level',
                    '333'   => 'Grade 5'
                    );
             echo form_dropdown('examType', $data, 'Ordinary Level');
             echo "</br>";
            

             echo form_label('Year:');

             $data=array(
                    'name' => 'year',
                    'id'   => 'year',
                    'value' => ''
                );
             echo form_input($data);
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



