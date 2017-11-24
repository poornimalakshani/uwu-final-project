<div class="row" style="max-height: 500px; overflow: auto;">
	<div class="col-md-12">
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>
			<div class="form-group">
			  <label for="email">Income:</label>
			  <?=form_input(array(
					'name' => 'income',
					'id' => 'income',
					'value' => set_value('income', ((empty($income)) ? '' : $income->income)),
					'class'=> 'form-control',
				)) ?>
			</div>

		<?=form_close('') ?>
    </div>
</div>