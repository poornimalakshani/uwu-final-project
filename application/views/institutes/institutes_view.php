<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
        echo validation_errors();
        echo form_open('');

             echo form_label('Institute Type:');

             $data=array(
                    '60'   => 'Hunuwala Dharmaraja MV',
                    '61'   => 'Opanayaka Vidyakara MV',
                    '62'   => 'Gankanda MMV',
                    '63'   => 'Dandeniya MV ',
                    '64'   => 'Mahinda VIdyalaya',
                    '65'   => 'UWU',
                    '66'   => 'Jayawadhanapura University',
                    '67'   => 'Colombo University',
                    '68'   => 'Sabaragamuwa University',
                    '69'   => 'Rajarata University',
                    '70'   => 'Kelaniya University',
                    '71'   => 'Peradeniya University',
                    '72'   => 'Wayaba University',
                    '73'   => 'NorthEast University',
                    '74'   => 'Easten Universuty',
                    '75'   => 'Moratuwa University',
                    '66'   => 'Teaching Collage',
                    '330'   => 'Vidyaloka MV'
                    );
             echo form_dropdown('type', $data, 'Hunuwala Dharmaraja MV');
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



