<?php 
$this->load->view('layouts/header');
?>  

<div class="container">
        <?php
           echo validation_errors();
            echo form_open('');

             echo form_label('Full Name:'); 
             echo form_input(array('id' => 'fullName', 'name' => 'fullNmae'));

             echo form_label('Date of Birth:'); 
             echo form_input(array('id' => 'dateOfBirth', 'name' => 'dateOfBirth'));

             /*echo form_label('Gender:'); 
             echo form_checkbox('Male', 1, true);
             echo form_checkbox('Female', 2, true);*/
             echo "<p><label for='album'>Album: </label>";
			echo "<select name='id' id='id'>";
			if (count($album)) {
    		foreach ($album as $list) {
        echo "<option value='". $list['id'] . "'>" . $list['title'] . "</option>";
    }
}
echo "</select><br/>";

             echo form_label('Status:'); 
             echo form_checkbox('Single', 3, true);
             echo form_checkbox('Married', 4, true);

             echo form_label('Living Status:'); 
             echo form_checkbox('Live', 5, true);
             echo form_checkbox('Dead', 6, true);

             echo form_label('NIC No :');
             echo form_input(array(
                'name' => 'nic',
                'id' => 'nic',
                'value' => set_value('nic')
                ));

             echo form_label('Home Id :');
             echo form_input(array(
                'name' => 'home_id',
                'id' => 'home_id',
                'value' => set_value('home_id')
            )); 
            

            echo form_submit('submit', 'Save');
            echo form_close('');
        ?>

    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>   