<div class="row" style="max-height: 500px; overflow: auto;">
	<div class="col-md-12">
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>

			<div class="form-group">
			  <label for="email">Child number:</label>
			  <?=form_input(array(
					'name' => 'child_no',
					'id' => 'child_no',
					'value' => set_value('child_no', ((empty($aboutPregnancy)) ? '' : $aboutPregnancy->child_no)),
					'class'=> 'form-control',
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Expected Date:</label>
			  <?=form_input(array(
					'name' => 'expected_date',
					'id' => 'expected_date',
					'value' => set_value('expected_date', ((empty($aboutPregnancy)) ? '' : $aboutPregnancy->expected_date)),
					'class'=> 'form-control',
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Birth Condition:</label>
			  <?=form_dropdown(
					'condition',
					$birthCondition,
					set_value('condition', ((empty($aboutPregnancy)) ? '' : $aboutPregnancy->condition)),
					'class="form-control"'
				) ?>
			</div>

		<?=form_close('') ?>
    </div>
</div>