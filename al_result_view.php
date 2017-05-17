<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

            echo form_label('Subject ');

             $data=array(
                    '290' => 'Combined Maths',
                    '291'   => 'Physics',
                    '292' => 'Chemistry',
                    '293' => 'Information And Communication Technology',
                    '294' => 'Biology',
                    '295' => 'Agricultural Science',
                    '296' => 'Accounting',
                    '297' => 'Economics',
                    '298' => 'Bussiness Studies',
                    '299' => 'Information Technology',
                    '300' => 'Engineering Technology',
                    '301' => 'Bio System Technology',
                    '302' => 'Science For Technology',
                    '303' => 'Art',
                    '304' => 'Music',
                    '305' => 'Dancing',
                    '306' => 'Languages',
                    '307' => 'Logic',
                    '308' => 'Media',
                    '322' => 'General English',
                    '323' => 'Genaral Knowledge',
                    '327' => 'Sinhala',
                    '328' => 'Geography'
                    );
             echo form_dropdown('subject', $data, 'Combined Maths');
             echo "</br>";

             echo form_label('Result:');

             $data=array(
             		'name' => 'result',
             		'id'   => 'result',
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



