<?php 
$this->load->view('layouts/header');
?>	
<div class="row">
	<div class="col-md-6">
    <h5>Settings</h5>
    <ul>
        <?php foreach($list as $x) { ?>
        <li><a href="/settings/list_data/view/<?=$x->id?>"><?=$x->list_type?></a> <a href="/settings/list_data/edit/<?=$x->id?>">Edit</a> <a href="/settings/list_data/delete/<?=$x->id?>">Delete</a></li>
        <?php } ?>
        
    </ul>
    </div>
    <div class="col-md-6">
    	<?php
			echo validation_errors();
		    echo form_open('');
		    echo form_input(array(
		    	'type' => 'text',
		    	'name' => 'list_val',
		    	'value' => set_value('list_val')
		    ));

		    echo form_submit('submit', 'Create');
		    echo form_close('');
    	?>

    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>    

    