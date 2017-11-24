<div class="row" style="max-height: 500px; overflow: auto;">
	<div class="col-md-12">
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>
			<div class="form-group">
			  <label for="email">User Name:</label>
			  <?php
			  $input = [
				'type' => 'text',
				'name' => 'userName',
				'class'=> 'form-control',
				'value' => set_value('userName', ((empty($admin)) ? '' : $admin->userName))
			  ];

			  if (!empty($admin)) {
				  $input['readonly'] = 'true';
			  }
			  ?>
			  <?=form_input($input) ?>
			</div>

			<div class="form-group">
			  <label for="email">Type:</label>
				<?=form_dropdown(
					'type',
					$adminTypes,
					set_value('type', ((empty($admin)) ? '' : $admin->type)),
					'class="form-control"'
				) ?>
			</div>

			<div class="form-group">
			  <label for="email">Status:</label>
				<?=form_dropdown(
					'status',
					$adminStatus,
					set_value('status', ((empty($admin)) ? '' : $admin->status)),
					'class="form-control"'
				) ?>
			</div>

			<div class="form-group">
			  <label for="email">Name:</label>
			  <?=form_input(array(
					'type' => 'text',
					'name' => 'name',
					'class'=> 'form-control',
					'value' => set_value('name', ((empty($admin)) ? '' : $admin->name))
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Address:</label>
			  <?=form_input(array(
					'type' => 'text',
					'name' => 'address',
					'class'=> 'form-control',
					'value' => set_value('address', ((empty($admin)) ? '' : $admin->address))
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Email:</label>
			  <?=form_input(array(
					'type' => 'text',
					'name' => 'email',
					'class'=> 'form-control',
					'value' => set_value('email', ((empty($admin)) ? '' : $admin->email))
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Telephone:</label>
			  <?=form_input(array(
					'type' => 'text',
					'name' => 'telephone',
					'class'=> 'form-control',
					'value' => set_value('telephone', ((empty($admin)) ? '' : $admin->telephone))
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Password:</label>
			  <?=form_input(array(
					'type' => 'text',
					'name' => 'password',
					'class'=> 'form-control',
					'value' => set_value('password')
				)) ?>
			</div>
		<?=form_close('') ?>
    </div>
</div>