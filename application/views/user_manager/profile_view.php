<?php
$this->load->view('layouts/header');
?>
<div class="row">
	<div class="col-md-12">
	<h4><?=$user->name; ?></h4>
	</div>
	<div class="col-md-6">
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>

			<div class="form-group">
			  <label for="email">User Name:</label>
			  <?=form_input(array(
					'type' => 'text',
					'name' => 'userName',
					'class'=> 'form-control',
					'readonly'=>'true',
					'value' => set_value('userName', $user->userName)
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Type:</label>
			  <?=form_input(array(
					'type' => 'text',
					'name' => 'type',
					'class'=> 'form-control',
					'readonly'=>'true',
					'value' => set_value('type', $adminTypes[$user->type])
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Status:</label>
			  <?=form_input(array(
					'type' => 'text',
					'name' => 'status',
					'class'=> 'form-control',
					'readonly'=>'true',
					'value' => set_value('status', $adminStatus[$user->status])
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Name:</label>
			  <?=form_input(array(
					'type' => 'text',
					'name' => 'name',
					'class'=> 'form-control',
					'value' => set_value('name', $user->name)
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Address:</label>
			  <?=form_input(array(
					'type' => 'text',
					'name' => 'address',
					'class'=> 'form-control',
					'value' => set_value('address', $user->address)
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Email:</label>
			  <?=form_input(array(
					'type' => 'text',
					'name' => 'email',
					'class'=> 'form-control',
					'value' => set_value('email', $user->email)
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Telephone:</label>
			  <?=form_input(array(
					'type' => 'text',
					'name' => 'telephone',
					'class'=> 'form-control',
					'value' => set_value('telephone', $user->telephone)
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Old Password:</label>
			  <?=form_input(array(
					'type' => 'password',
					'name' => 'old_password',
					'class'=> 'form-control',
					'value' => ''
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">New Password:</label>
			  <?=form_input(array(
					'type' => 'password',
					'name' => 'new_password',
					'class'=> 'form-control',
					'value' => ''
				)) ?>
			</div>
			
			<div class="form-group">
			  <label for="email">Confirm Password:</label>
			  <?=form_input(array(
					'type' => 'password',
					'name' => 'confirm_password',
					'class'=> 'form-control',
					'value' => ''
				)) ?>
			</div>
			<button type="submit" class="btn btn-default btn-sm">Update</button>
		<?=form_close('') ?>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>

<script type="text/javascript">
$(document).ready(function() {

});
</script>    