
<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
           echo validation_errors();
            echo form_open('');
           /* echo form_input(array(
                'type' => 'text',
                'name' => 'id',
                'value' => set_value('id')
                ));
            
            echo form_input(array(
                'type' => 'text',
                'name' => 'address',
                'value' => set_value('address')
            ));

            echo form_input(array(
                'type' => 'double',
                'name' => 'longitude',
                'value' => set_value('longitude')
            ));

            echo form_input(array(
                'type' => 'doubless',
                'name' => 'latitude',
                'value' => set_value('latitude')
            ));*/

             echo form_label('Address :');
             echo form_input(array(
                'name'          => 'address',
                'id'            => 'address',
                'value'         => set_value('address'),
                'maxlength'     => '100'
                //'size'          => '50',
                //'style'         => 'width:50%'
            )); 
             echo "</br>";
             //echo form_input(array('id' => 'address', 'name' => 'address'));

             echo form_label('Longitude :');
             echo form_input(array(
                'name' => 'longitude',
                'id' => 'longitude',
                'value' => set_value('longitude')
            )); 
             echo "</br>";
             //echo form_input(array('id' => 'longitude', 'name' => 'longitude'));

             echo form_label('Latitude :');
             echo form_input(array(
                'name' => 'latitude',
                'id' => 'latitude',
                'value' => set_value('latitude')
            )); 
             echo "</br>";
             //echo form_input(array('id' => 'latitude', 'name' => 'latitude'));

            echo form_submit('submit', 'Save');
            echo form_close('');
        ?>

    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>    
