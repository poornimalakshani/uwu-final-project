<?php $this->load->view('layouts/header'); ?>

<div class="row">
	<div class="col-md-12">
	<h4>
		Husband Register
		<?php if(!empty($homeId)) { ?>
		<span class="pull-right"><small><a href="/midwife/reg_husband/add_edit/<?=$homeId?>" data-type="add" class="btn btn-success add-edit">Add New</a></small></span>
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

		<?php if(empty($peopleList)) { ?>
			<p class="text-warning">Sorry, No People Found!</p>
		<?php } else { ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Education condition</th>
					<th>Age in Marriage</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		    <?php foreach($peopleList as $x) { ?>
				<tr>
					<td><?=$x->fullName?></td>
					<td><?=$x->education_condition?></td>
					<td><?=$x->age_in_marriage?></td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Action <span class="caret"></span>
							</button>
							<ul class="dropdown-menu action">
								<?php if (empty($x->age_in_marriage)) { ?>
								<li><a class="action add-edit" data-type="add" href="/midwife/reg_husband/add_edit/<?=$homeId?>/<?=$x->peopleId?>">Register</a></li>
								<?php } else { ?>
								<li><a class="action add-edit" data-type="edit" href="/midwife/reg_husband/add_edit/<?=$homeId?>/<?=$x->peopleId?>/<?=$x->id?>">Edit Registed Husband</a></li>
								<li><a class="action delete" href="/midwife/reg_husband/delete/<?=$x->id?>">Delete Registed Husband</a></li>
								<?php } ?>
							</ul>
						</div>
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
pageName = "Register Husband";

$(document).ready(function() {
	$('#home-select').on('change', function(e) {
		e.preventDefault();

		var urlPart = $('#home-select').val();

		window.location.href = "/midwife/reg_husband/"+urlPart;
	});
});
</script>