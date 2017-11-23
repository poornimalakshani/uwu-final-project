<?php 
$this->load->view('layouts/header');
?>

<div class="row">
	<div class="col-md-12">
		<h4>Edit List</h4>
	</div>

	<div class="col-md-6">
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>
			<div class="form-group">
			  <label for="email" class="sr-only">Edit List:</label>
			  <?=form_input(array(
					'type' => 'text',
					'name' => 'list_val',
					'class'=> 'form-control',
					'value' => set_value('list_val', $list->list_type)
				)) ?>
			</div>
			<button type="submit" class="btn btn-default btn-sm">Update</button>
			<button type="button" id="cancel-btn" class="btn btn-default btn-sm">Cancel</button>
		<?=form_close('') ?>
	</div>
</div>

<?php $this->load->view('layouts/footer'); ?>

<script type="text/javascript">
$(document).ready(function() {
	$('#cancel-btn').on('click', function(e) {
		e.preventDefault();
		window.location.href = '/settings/list_data';
	});
});
</script>
    