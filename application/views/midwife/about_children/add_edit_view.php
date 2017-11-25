<div class="row" style="max-height: 500px; overflow: auto;">
	<div class="col-md-12">
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>

			<div class="form-group">
			  <label for="email">Number in Alive:</label>
			  <?=form_input(array(
					'name' => 'number_in_alive',
					'id' => 'number_in_alive',
					'value' => set_value('number_in_alive', ((empty($aboutChildren)) ? '' : $aboutChildren->number_in_alive)),
					'class'=> 'form-control',
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Number in below 5 years:</label>
			  <?=form_input(array(
					'name' => 'number_in_below_5years',
					'id' => 'number_in_below_5years',
					'value' => set_value('number_in_below_5years', ((empty($aboutChildren)) ? '' : $aboutChildren->number_in_below_5years)),
					'class'=> 'form-control',
				)) ?>
			</div>

		<?=form_close('') ?>
    </div>
</div>