<?php $this->load->view('layouts/header'); ?>

<div class="row">
	<div class="col-md-12">
	<h4>
		Child Registration
		<?php if(!empty($regWifeId)) { ?>
		<span class="pull-right"><small><a href="/midwife/reg_child/add_edit/<?=$homeId?>/<?=$regWifeId?>" data-type="add" class="btn btn-success add-edit">Add New</a></small></span>
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
			<select class="form-control" id="people-select">
				<option value="0">-- Select Registed Wife --</option>

				<?php if(!empty($regWifeList)) {
					foreach($regWifeList as $x) { ?>
				<option value="<?=$x->id?>" <?=($x->id == $regWifeId) ? 'selected="selected"': ''; ?>><?=$x->fullName?></option>
				<?php }
				} ?>
			</select>
		</div>

		<?php if(empty($regChild)) { ?>
			<p class="text-warning"><?=(empty($regWifeId) ? 'Please Select A Registed Wife!' : 'Sorry, No Registed Child!')?></p>
		<?php } else { ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Birth Weight</th>
					<th>Length at Birth</th>
					<th>Size of Head at Birth</th>
					<th>Health Condition</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		    <?php foreach($regChild as $x) { ?>
				<tr>
					<td><?=$x->fullName?></td>
					<td><?=$x->birth_weight?></td>
					<td><?=$x->length_at_birth?></td>
					<td><?=$x->size_of_head_at_birth?></td>
					<td><?=($x->health_condition) ? $healthCondition[$x->health_condition] : ''?></td>
					<td align="right">
						<a class="action add-edit" data-type="edit" href="/midwife/reg_child/add_edit/<?=$homeId?>/<?=$regWifeId?>/<?=$x->peopleId?>/<?=$x->regChildId?>"><i class="fa fa-pencil fa-lg"></i></a>
						<a class="action delete" href="/midwife/reg_child/delete/<?=$x->regChildId?>"><i class="fa fa-trash fa-lg"></i></a>
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
pageName = "Child Registration";

$(document).ready(function() {
	$('#home-select').on('change', function(e) {
		e.preventDefault();

		var urlPart = $('#home-select').val();

		window.location.href = "/midwife/reg_child/"+urlPart;
	});

	$('#people-select').on('change', function(e) {
		e.preventDefault();

		var urlPart = $('#home-select').val();
		if (urlPart) {
			if ($('#people-select').val() > 0) {
				urlPart += '/' + $('#people-select').val();
			}
		}

		window.location.href = "/midwife/reg_child/" + urlPart;
	});
});
</script>
