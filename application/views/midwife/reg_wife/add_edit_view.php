<div class="row" style="max-height: 500px; overflow: auto;">
	<div class="col-md-12">
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>

			<?php if (empty($peopleId)) { ?>
			<div class="form-group">
			  <label for="email">Full Name:</label>
			  <?=form_input(array(
					'name' => 'fullName',
					'id' => 'fullName',
					'value' => set_value('fullName'),
					'class'=> 'form-control',
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Date of Birth:</label>
			  <?=form_input(array(
					'name' => 'dateOfBirth',
					'id' => 'dateOfBirth',
					'value' => set_value('dateOfBirth'),
					'class'=> 'form-control',
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Gender:</label>
			  <?=form_dropdown(
					'gender',
					$gender,
					set_value('gender', 2),
					'class="form-control" disabled="disabled"'
				) ?>
			</div>

			<div class="form-group">
			  <label for="email">Status:</label>
			  <?=form_dropdown(
					'status',
					$status,
					set_value('status', 4),
					'class="form-control"'
				) ?>
			</div>

			<div class="form-group">
			  <label for="email">Living Status:</label>
			  <?=form_dropdown(
					'living_status',
					$livingStatus,
					set_value('living_status', 5),
					'class="form-control" disabled="disabled"'
				) ?>
			</div>

			<div class="form-group">
			  <label for="email">NIC:</label>
			  <?=form_input(array(
					'name' => 'nic',
					'id' => 'nic',
					'value' => set_value('nic'),
					'class'=> 'form-control',
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Register on Electroral Registry:</label>
			  <?=form_dropdown(
					'register_on_electroral_registry',
					$registerOnElectroralRegistry,
					set_value('register_on_electroral_registry', 82),
					'class="form-control" disabled="disabled"'
				) ?>
			</div>

			<?php } ?>

			<div class="form-group">
			  <label for="email">Education Condition:</label>
			  <?=form_input(array(
					'name' => 'education_condition',
					'id' => 'education_condition',
					'value' => set_value('education_condition', ((empty($regWife)) ? '' : $regWife->education_condition)),
					'class'=> 'form-control',
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Age in Marriage:</label>
			  <?=form_input(array(
					'name' => 'age_in_marriage',
					'id' => 'age_in_marriage',
					'value' => set_value('age_in_marriage', ((empty($regWife)) ? '' : $regWife->age_in_marriage)),
					'class'=> 'form-control',
				)) ?>
			</div>


			<div class="form-group">
			  <label for="email">Protected on Rubella:</label>
			  <?=form_dropdown(
					'protected_on_Rubella',
					$protectedOnRubella,
					set_value('protected_on_Rubella', ((empty($regWife)) ? '' : $regWife->protected_on_Rubella)),
					'class="form-control"'
				) ?>
			</div>

		<?=form_close('') ?>
    </div>
</div>