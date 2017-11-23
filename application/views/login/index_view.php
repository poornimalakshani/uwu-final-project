<?php $this->load->view('layouts/header'); ?>
<div class="login">
	<?=form_open('') ?>
		<div class="bg-danger text-white error-text">
			<?=validation_errors(); ?>
		</div>
		<div class="form-group">
		  <label for="email">User Name:</label>
		  <?=form_input(array(
				'type' => 'text',
				'name' => 'username',
				'class'=> 'form-control',
				'value' => set_value('username')
			)); ?>
		</div>

		<div class="form-group">
		  <label for="email">Passward:</label>
		  <?=form_input(array(
				'type' => 'password',
				'name' => 'password',
				'class'=> 'form-control',
			)); ?>
		</div>

		<button type="submit" class="btn btn-default btn-sm">Login</button>
	<?=form_close('') ?>
</div>

<?php $this->load->view('layouts/footer'); ?>    