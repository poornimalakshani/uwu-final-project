<?php 
$this->load->view('layouts/header');
?>	
<div>
    <h5>Settings</h5>
    <ul>
        <?php foreach($list as $x) { ?>
        <li><?=$x->field?> <a href="/settings/list_data/edit_field/<?=$x->id?>">Edit</a> <a href="/settings/list_data/delete_field/<?=$x->id?>">Delete</a></li>
        <?php } ?>
        
    </ul>
</div>

<div class="col-md-6">
        <?php
            echo validation_errors();
            echo form_open('');
            echo form_input(array(
                'type' => 'text',
                'name' => 'list_field_val',
                'value' => set_value('list_field_val')
            ));

            echo form_submit('submit', 'Create');
            echo form_close('');
        ?>

    </div>

<?php $this->load->view('layouts/footer'); ?>    

    