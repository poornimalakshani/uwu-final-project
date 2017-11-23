<div class="row" style="max-height: 500px; overflow: auto;">
	<div class="col-md-12">
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>
			<div class="form-group">
			  <label for="email">Toilet Type:</label>
			  <?=form_dropdown(
					'type',
					$toiletFacilitiesTypes,
					set_value('type', ((empty($toiletFacilities)) ? '' : $toiletFacilities->type)),
					'class="form-control"'
				) ?>
			</div>
		<?=form_close('') ?>
    </div>
</div>