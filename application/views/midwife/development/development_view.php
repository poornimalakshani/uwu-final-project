<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Age:');

             $data=array(
                    '167' => '6Weekas-3Months',
                    '168' => '3Months-6Months',
                    '169' => '6Months-9Months',
                    '170' => '9Months-12Months',
                    '171' => '12Months-18Months',
                    '172' => '18Months-2Years',
                    '173' => '2Years-3Years',
                    '174' => '3Years-4Years',
                    '175' => '4Years-5Years'
                    );
             echo form_dropdown('age', $data, '6Weekas-3Months');
             echo "</br>";
            

             echo form_label('Criterian:');

             $data=array(
                    '219' => 'Emerge Head When Lying Face Downward',
                    '220' => 'Looking At An Object That Move One Location To Another',
                    '221' => 'Stop His Work When Heard Loud sound',
                    '222' => 'Respond To Stimulus',
                    '223' => 'Laughing When Identify His Mother',
                    '224' => 'Emerge Head And Chest When Lying Face Downward',
                    '225' => 'Playing With Hands With Mixing Fingers',
                    '226' => 'Capture Objects Using Palm',
                    '227' => 'Turn Head Toward sounds',
                    '228' => 'Laughing',
                    '229' => 'Emerge Head When Lying Up',
                    '230' => 'Change Objects From One Hand To Another',
                    '231' => 'Siting Without Help',
                    '232' => 'Standing With Help',
                    '233' => 'Take Small Things Using Two Fingers',
                    '234' => 'Imitate sounds',
                    '235' => 'Speak Single words',
                    '236' => 'Understand Small Advices',
                    '237' => 'WalkingWith Help',
                    '238' => 'Can Speak 2-3Words',
                    '239' => 'When Ask Familiar Objects Show It Using Hands',
                    '240' => 'Can Play With Small Ball',
                    '241' => 'Can Identify Atleast One Organ',
                    '242' => 'Walking Without Help',
                    '243' => 'Can Climb Stairs With Help',
                    '244' => 'Can Make Tower Using 2-3Blocks',
                    '245' => 'Can Eating Alone',
                    '246' => 'Can Speak 10Words',
                    '247' => 'Can Run Without Falling',
                    '248' => 'Can Climb Stairs Without Falling',
                    '249' => 'Can Drow Circle',
                    '250' => 'Can Speak Sentence That Having 3-5Words',
                    '251' => 'Stand With One Leg',
                    '252' => 'Can Wear Dress And Shoes',
                    '253' => 'Can Drow Shapes',
                    '254' => 'Count Until_3',
                    '255' => 'Konw Atleast 2Words Such As Up Down Near Far',
                    '256' => 'Can Use Complete Sentences',
                    '257' => 'Can Jumb Using One Leg',
                    '258' => 'Can Wear Derss Alone',
                    '259' => 'Can Eat Alone',
                    '260' => 'Can Drow Simple Human Images',
                    '261' => 'Can Discribe Picture Using Verbs Past Present',
                    '262' => 'Can Tell Own FullName And Age',
                    '263' => 'Can Play With Others'
                    );
             echo form_dropdown('criterian', $data, 'Emerge Head When Lying Face Downward');
             echo "</br>";
            
             

             echo form_label('Recommended Date');

            $data=array(
             		'name' => 'recommended_date',
             		'id'   => 'recommended_date',
             		'value' => ''
             	);
             echo form_input($data);
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



