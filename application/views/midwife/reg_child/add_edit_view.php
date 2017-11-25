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
					'value' => set_value('fullName', 'Newly Born'),
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
					set_value('gender'),
					'class="form-control"'
				) ?>
			</div>

			<div class="form-group">
			  <label for="email">Living Status:</label>
			  <?=form_dropdown(
					'living_status',
					$livingStatus,
					set_value('living_status'),
					'class="form-control"'
				) ?>
			</div>

			<?php } ?>

			<div class="form-group">
			  <label for="email">Birth Weight:</label>
			  <?=form_input(array(
					'name' => 'birth_weight',
					'id' => 'birth_weight',
					'value' => set_value('birth_weight', ((empty($regChild)) ? '' : $regChild->birth_weight)),
					'class'=> 'form-control',
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Length at Birth:</label>
			  <?=form_input(array(
					'name' => 'length_at_birth',
					'id' => 'length_at_birth',
					'value' => set_value('length_at_birth', ((empty($regChild)) ? '' : $regChild->length_at_birth)),
					'class'=> 'form-control',
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Size of Head at Birth:</label>
			  <?=form_input(array(
					'name' => 'size_of_head_at_birth',
					'id' => 'size_of_head_at_birth',
					'value' => set_value('size_of_head_at_birth', ((empty($regChild)) ? '' : $regChild->size_of_head_at_birth)),
					'class'=> 'form-control',
				)) ?>
			</div>


			<div class="form-group">
			  <label for="email">Health Condition:</label>
			  <?=form_dropdown(
					'health_condition',
					$healthCondition,
					set_value('health_condition', ((empty($regChild)) ? '' : $regChild->health_condition)),
					'class="form-control"'
				) ?>
			</div>

		<?=form_close('') ?>
    </div>
</div>