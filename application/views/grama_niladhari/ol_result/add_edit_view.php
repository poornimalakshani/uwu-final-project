<div class="row" style="max-height: 500px; overflow: auto;">
	<div class="col-md-12">
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>
			<div class="form-group">
			  <label for="email">Subject:</label>
			  <?=form_dropdown(
					'subject',
					$subject,
					set_value('subject', ((empty($olResult)) ? '' : $olResult->subject)),
					'class="form-control"'
				) ?>
			</div>

			<div class="form-group">
			  <label for="email">Result:</label>
			  <?=form_input(array(
					'name' => 'result',
					'id' => 'result',
					'value' => set_value('result', ((empty($olResult)) ? '' : $olResult->result)),
					'class'=> 'form-control',
				)) ?>
			</div>

		<?=form_close('') ?>
    </div>
</div>