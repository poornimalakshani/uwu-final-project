<div class="row" style="max-height: 500px; overflow: auto;">
	<div class="col-md-12">
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>
			<div class="form-group">
			  <label for="email">Roof Type:</label>
			  <?=form_dropdown(
					'type',
					$roofTypes,
					set_value('type', ((empty($roof)) ? '' : $roof->type)),
					'class="form-control"'
				) ?>
			</div>
		<?=form_close('') ?>
    </div>
</div>