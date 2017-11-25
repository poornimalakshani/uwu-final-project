<?php $this->load->view('layouts/header'); ?>

<div class="row">
	<div class="col-md-12">
	<h4>
		Weight Height BMI
		<?php if(!empty($regChildId)) { ?>
		<span class="pull-right"><small><a href="/midwife/weight_height_bmi/add_edit/<?=$homeId?>/<?=$regChildId?>" data-type="add" class="btn btn-success add-edit">Add New</a></small></span>
		<?php } ?>
	</h4>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<select class="form-control" id="home-select">
				<option value="0">-- Select Home --</option>

				<?php foreach($home as $x) { ?>
				<option value="<?=$x->id?>" <?=($x->id == $homeId) ? 'selected="selected"': ''; ?>><?=$x->address?></option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group">
			<select class="form-control" id="reg-child-select">
				<option value="0">-- Select Child --</option>

				<?php foreach($regChild as $x) { ?>
				<option value="<?=$x->regChildId?>" <?=($x->regChildId == $regChildId) ? 'selected="selected"': ''; ?>><?=$x->fullName?></option>
				<?php } ?>
			</select>
		</div>

		<?php if(empty($weightHeightBmi)) { ?>
			<p class="text-warning">Sorry, No Weight Height Found!</p>
		<?php } else { ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Age Duration</th>
					<th>Weight</th>
					<th>Height</th>
					<th>BMI</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		    <?php foreach($weightHeightBmi as $x) { ?>
				<tr>
					<td><?=(isset($ageDuration[$x->age_duration])) ? $ageDuration[$x->age_duration] : ''?></td>
					<td><?=$x->height?></td>
					<td><?=$x->weight?></td>
					<td><?=$x->bmi?></td>
					<td align="right">
						<a class="action add-edit" data-type="edit" href="/midwife/weight_height_bmi/add_edit/<?=$homeId?>/<?=$regChildId?>/<?=$x->id?>"><i class="fa fa-pencil fa-lg"></i></a>
						<a class="action delete" href="/midwife/weight_height_bmi/delete/<?=$x->id?>"><i class="fa fa-trash fa-lg"></i></a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php } ?>

    </div>
</div>

<?php $this->load->view('layouts/dialog'); ?>

<?php $this->load->view('layouts/footer'); ?>   

<script type="text/javascript">
pageName = "Weight Height BMI";

$(document).ready(function() {
	$('#home-select').on('change', function(e) {
		e.preventDefault();

		var urlPart = $('#home-select').val();

		window.location.href = "/midwife/weight_height_bmi/"+urlPart;
	});

	$('#reg-child-select').on('change', function(e) {
		e.preventDefault();

		var urlPart = $('#home-select').val();
		if (urlPart) {
			if ($('#reg-child-select').val() > 0) {
				urlPart += '/' + $('#reg-child-select').val();
			}
		}

		window.location.href = "/midwife/weight_height_bmi/" + urlPart;
	});
});
</script>
