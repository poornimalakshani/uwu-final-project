<?php 
$this->load->view('layouts/header');
?>	
<div class="row">
	<div class="col-md-12">
		<h4>"<?=$parant_list->list_type; ?>" Lists</h4>
	</div>

	<?php if(!empty($list)) { ?>
    <div class="col-md-6">
		<table class="table table-striped">
			<tbody>
		    <?php
			foreach($list as $x) { ?>
				<tr>
					<td><?=$x->field?></td>
					<td align="right">
						<a class="action" href="/settings/list_data/edit_field/<?=$x->id?>"><i class="fa fa-pencil fa-lg"></i></a>
						<a class="action delete" href="/settings/list_data/delete_field/<?=$x->id?>"><i class="fa fa-trash fa-lg"></i></a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
    </div>
	<?php } ?>
    <div class="col-md-6">
		<h6>Add New Field to "<?=$parant_list->list_type; ?>"</h6>
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>
			<div class="form-group">
			  <label for="email" class="sr-only">New Field:</label>
			  <?=form_input(array(
					'type' => 'text',
					'name' => 'list_field_val',
					'class'=> 'form-control',
					'value' => set_value('list_field_val')
				)) ?>
			</div>
			<button type="submit" class="btn btn-default btn-sm">Create</button>
		<?=form_close('') ?>
    </div>

</div>

<?php $this->load->view('layouts/footer'); ?>    

<script type="text/javascript">
$(document).ready(function() {
	$('.action.delete').on('click', function(e) {
		e.preventDefault();

		var conf = confirm('Are you sure?');
		if (conf) {
			window.location.href = $(this).prop('href');
		}
	});
});
</script>
    