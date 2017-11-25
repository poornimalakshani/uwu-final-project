<div class="row" style="max-height: 500px; overflow: auto;">
	<div class="col-md-12">
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>

			<div class="form-group">
			  <label for="email">Age:</label>
			  <?=form_dropdown(
					'age_duration',
					$ageDuration,
					set_value('age_duration', ((empty($weightHeighBmi)) ? '' : $weightHeighBmi->age_duration)),
					'class="form-control"'
				) ?>
			</div>

			<div class="form-group">
			  <label for="email">Height:</label>
			  <?=form_input(array(
					'name' => 'height',
					'id' => 'height',
					'value' => set_value('height', ((empty($weightHeighBmi)) ? '' : $weightHeighBmi->height)),
					'class'=> 'form-control',
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Weight:</label>
			  <?=form_input(array(
					'name' => 'weight',
					'id' => 'weight',
					'value' => set_value('weight', ((empty($weightHeighBmi)) ? '' : $weightHeighBmi->weight)),
					'class'=> 'form-control',
				)) ?>
			</div>


			<div class="form-group">
			  <label for="email">BMI:</label>
			  <?=form_input(array(
					'name' => 'bmi',
					'id' => 'bmi',
					'value' => set_value('bmi', ((empty($weightHeighBmi)) ? '' : $weightHeighBmi->bmi)),
					'class'=> 'form-control',
				)) ?>
			</div>

		<?=form_close('') ?>
    </div>
</div>