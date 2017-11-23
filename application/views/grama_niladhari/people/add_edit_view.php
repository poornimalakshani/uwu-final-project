<div class="row" style="max-height: 500px; overflow: auto;">
	<div class="col-md-12">
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>
			<div class="form-group">
			  <label for="email">Full Name:</label>
			  <?=form_input(array(
					'name' => 'fullName',
					'id' => 'fullName',
					'value' => set_value('fullName', ((empty($people)) ? '' : $people->fullName)),
					'class'=> 'form-control',
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Date of Birth:</label>
			  <?=form_input(array(
					'name' => 'dateOfBirth',
					'id' => 'dateOfBirth',
					'value' => set_value('dateOfBirth', ((empty($people)) ? '' : $people->dateOfBirth)),
					'class'=> 'form-control',
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Gender:</label>
			  <?=form_dropdown(
					'gender',
					$gender,
					set_value('gender', ((empty($people)) ? '' : $people->gender)),
					'class="form-control"'
				) ?>
			</div>

			<div class="form-group">
			  <label for="email">Status:</label>
			  <?=form_dropdown(
					'status',
					$status,
					set_value('status', ((empty($people)) ? '' : $people->status)),
					'class="form-control"'
				) ?>
			</div>

			<div class="form-group">
			  <label for="email">Living Status:</label>
			  <?=form_dropdown(
					'living_status',
					$livingStatus,
					set_value('living_status', ((empty($people)) ? '' : $people->living_status)),
					'class="form-control"'
				) ?>
			</div>

			<div class="form-group">
			  <label for="email">NIC:</label>
			  <?=form_input(array(
					'name' => 'nic',
					'id' => 'nic',
					'value' => set_value('nic', ((empty($people)) ? '' : $people->nic)),
					'class'=> 'form-control',
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Register on Electroral Registry:</label>
			  <?=form_dropdown(
					'register_on_electroral_registry',
					$registerOnElectroralRegistry,
					set_value('register_on_electroral_registry', ((empty($people)) ? '' : $people->register_on_electroral_registry)),
					'class="form-control"'
				) ?>
			</div>
		<?=form_close('') ?>
    </div>
</div>