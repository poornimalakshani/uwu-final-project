<?php 
$this->load->view('layouts/header');
?>	
<div class="col-md-6">
    	<?php
			echo validation_errors();
		    echo form_open('');
		    echo form_input(array(
		    	'type' => 'text',
		    	'name' => 'list_val',
		    	'value' => set_value('list_val', $list->list_type)
		    ));

		    echo form_submit('submit', 'Update');
		    echo form_close('');
    	?>

    </div>

<?php $this->load->view('layouts/footer'); ?>    