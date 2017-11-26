<?php
$this->load->view('layouts/header');
?>
<div class="row">
	<div class="col-md-12">
		<h2>Houses Within <?=$distance?> Km distance From School</h2>
	</div>

	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<select class="form-control" id="school-select">
						<option value="0">-- Select School --</option>

						<?php foreach($shoolList as $x) { ?>
						<option value="<?=$x->id?>" <?=($x->id == $schoolId) ? 'selected="selected"': ''; ?>><?=$x->field?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<select class="form-control" id="distance-select">
						<option value="1" <?=($distance == 1)? 'selected="selected"': '' ?>>1 Km</option>
						<option value="2" <?=($distance == 2)? 'selected="selected"': '' ?>>2 Km</option>
						<option value="3" <?=($distance == 3)? 'selected="selected"': '' ?>>3 Km</option>
						<option value="4" <?=($distance == 4)? 'selected="selected"': '' ?>>4 Km</option>
						<option value="5" <?=($distance == 5)? 'selected="selected"': '' ?>>5 Km</option>
						<option value="6" <?=($distance == 6)? 'selected="selected"': '' ?>>6 Km</option>
						<option value="7" <?=($distance == 7)? 'selected="selected"': '' ?>>7 Km</option>
						<option value="8" <?=($distance == 8)? 'selected="selected"': '' ?>>8 Km</option>
						<option value="9" <?=($distance == 9)? 'selected="selected"': '' ?>>9 Km</option>
						<option value="10" <?=($distance == 10)? 'selected="selected"': '' ?>>10 Km</option>
					</select>
				</div>
			</div>
		</div>


		<?php if(empty($homeList)) { ?>
			<p class="text-warning"><?=(empty($schoolId) ? 'Please Select A School!' : "Sorry, No Home Found within {$distance} Km!")?></p>
		<?php } else { ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Home</th>
					<th>Distance</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($homeList as $x) { ?>
				<tr>
					<td><?=$x->address?></td>
					<td><?=round($x->distance, 2)?> Km</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php } ?>
    </div>
</div>
<?php $this->load->view('layouts/footer'); ?>

<script type="text/javascript">
$(document).ready(function() {
	$('#school-select').on('change', function(e) {
		e.preventDefault();

		var urlPart = $('#school-select').val()+'/'+$('#distance-select').val();

		window.location.href = "/dicision/get_home_within_distance_from_school/"+urlPart;
	});

	$('#distance-select').on('change', function(e) {
		e.preventDefault();

		var urlPart = $('#school-select').val()+'/'+$('#distance-select').val();

		window.location.href = "/dicision/get_home_within_distance_from_school/"+urlPart;
	});
});
</script>
