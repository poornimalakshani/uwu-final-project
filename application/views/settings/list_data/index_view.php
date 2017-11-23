<?php 
$this->load->view('layouts/header');
?>	
<div class="row">
	<div class="col-md-12">
	<h4>Settings List</h4>
	</div>
	<div class="col-md-6">
		<table class="table table-striped">
			<tbody>
		    <?php foreach($list as $x) { ?>
				<tr>
					<td><a href="/settings/list_data/view/<?=$x->id?>"><?=$x->list_type?></a></td>
					<td align="right">
						<a class="action" href="/settings/list_data/view/<?=$x->id?>"><i class="fa fa-eye fa-lg"></i></a>
						<a class="action" href="/settings/list_data/edit/<?=$x->id?>"><i class="fa fa-pencil fa-lg"></i></a>
						<a class="action delete" href="/settings/list_data/delete/<?=$x->id?>"><i class="fa fa-trash fa-lg"></i></a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
    </div>
    <div class="col-md-6">
		<h6>Add New Setting</h6>
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>
			<div class="form-group">
			  <label for="email" class="sr-only">New Setting:</label>
			  <?=form_input(array(
					'type' => 'text',
					'name' => 'list_val',
					'class'=> 'form-control',
					'value' => set_value('list_val')
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