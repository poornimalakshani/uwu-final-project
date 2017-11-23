<div class="row">
	<div class="col-md-12">
		<?=form_open('') ?>
			<div class="bg-danger text-white error-text">
				<?=validation_errors(); ?>
			</div>
			<div class="form-group">
			  <label for="email">Address:</label>
			  <?=form_input(array(
					'name' => 'address',
					'id' => 'address',
					'value' => set_value('address', ((empty($home)) ? '' : $home->address)),
					'class'=> 'form-control',
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Longitude:</label>
			  <?=form_input(array(
					'name' => 'longitude',
					'id' => 'longitude',
					'value' => set_value('longitude', ((empty($home)) ? '' : $home->longitude)),
					'class'=> 'form-control',
				)) ?>
			</div>

			<div class="form-group">
			  <label for="email">Latitude:</label>
			  <?=form_input(array(
					'name' => 'latitude',
					'id' => 'latitude',
					'value' => set_value('latitude', ((empty($home)) ? '' : $home->latitude)),
					'class'=> 'form-control',
				)) ?>
			</div>
		<?=form_close('') ?>
    </div>
</div>