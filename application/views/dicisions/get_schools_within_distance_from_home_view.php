<?php
$this->load->view('layouts/header');
?>
<div class="row">
	<div class="col-md-12">
		<h2>Distance to Schools from Home</h2>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<select class="form-control" id="home-select">
				<option value="0">-- Select Home --</option>

				<?php foreach($homes as $x) { ?>
				<option value="<?=$x->id?>" <?=($x->id == $homeId) ? 'selected="selected"': ''; ?>><?=$x->address?></option>
				<?php } ?>
			</select>
		</div>

		<?php if(empty($schoolList)) { ?>
			<p class="text-warning"><?=(empty($homeId) ? 'Please Select A Home!' : 'Sorry, No School Found!')?></p>
		<?php } else { ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>School</th>
					<th>Distance</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($schoolList as $x) { ?>
				<tr>
					<td><?=$x->field?></td>
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
	$('#home-select').on('change', function(e) {
		e.preventDefault();

		var urlPart = $('#home-select').val();

		window.location.href = "/dicision/get_schools_within_distance_from_home/"+urlPart;
	});
});
</script>
