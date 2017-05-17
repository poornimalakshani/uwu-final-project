<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Age:');

             $data=array(
                    '161'   => 'Immediate After Birth',
                    '162'   => '1Month Completed',
                    '163'   => 'After 4Months',
                    '164'   => 'After 7Months',
                    '165'   => '9Months Completed',
                    '166'   => '12Months Completed'
                    
                     );
             echo form_dropdown('age', $data, 'Immediate After Birth');
             echo "</br>";
            

             echo form_label('Criterian:');

             $data=array(
                    '211'   => 'Does Baby Twinkling When Heard Loud Noise',
                    '212'   => 'Does Baby Begin To Listen Or Identify Persistant Noise',
                    '213'   => 'Does Baby Laugh When Heard Mother Or Truste Noise',
                    '214'   => 'Does Baby Turn Head Towards Mother/Trustee When They Speak',
                    '215'   => 'Does Baby Quickly Turn Head TowardsMother/Trustee',
                    '216'   => 'Does Baby Listen Carefully Familiar Sounds',
                    '217'   => 'Does Baby Like To Listen Speak Artistic',
                    '218'   => 'Does Baby Respond Name Or Familiar Sounds'
                    
                    );
             echo form_dropdown('criterian', $data, 'Does Baby Twinkling When Heard Loud Noise');
             echo "</br>";

              echo form_label('Condition:');

             $data=array(
                    '81'   => 'Yes',
                    '82'   => 'No'
                     );
             echo form_dropdown('condition', $data, 'Yes');
             echo "</br>";
             

             
              echo form_label('Child Id:');

             $data=array(
                    'name' => 'reg_child_id',
                    'id'   => 'reg_child_id',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";

             echo form_label('Mother Id:');
             $data=array(
                    'name' => 'reg_child_reg_wife_id',
                    'id'   => 'reg_child_reg_wife_id',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";

             echo form_label('Mother People Id:');
             $data=array(
                    'name' => 'reg_child_reg_wife_people_id',
                    'id'   => 'reg_child_reg_wife_people_id',
                    'value' => ''
                );
             echo form_input($data);
             echo "</br>";
             
              echo form_label('Home_Id:');

             $data=array(
                    'name' => 'reg_child_reg_wife_people_home_id',
                    'id'   => 'reg_child_reg_wife_people_home_id',
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



