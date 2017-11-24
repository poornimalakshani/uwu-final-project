<div class="row" style="max-height: 500px; overflow: auto;">
	<div class="col-md-12">
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>
			<div class="form-group">
			  <label for="email">Exam Type:</label>
			  <?=form_dropdown(
					'examType',
					$examTypes,
					set_value('examType', ((empty($examyears)) ? '' : $examyears->examType)),
					'class="form-control"'
				) ?>
			</div>

			<div class="form-group">
			  <label for="email">Exam Year:</label>
			  <?=form_input(array(
					'name' => 'year',
					'id' => 'year',
					'value' => set_value('year', ((empty($examyears)) ? '' : $examyears->year)),
					'class'=> 'form-control',
				)) ?>
			</div>

		<?=form_close('') ?>
    </div>
</div>