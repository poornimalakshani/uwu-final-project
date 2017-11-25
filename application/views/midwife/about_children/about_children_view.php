<?php $this->load->view('layouts/header'); ?>

<div class="row">
	<div class="col-md-12">
	<h4>
		About Children
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
					<th>Rubella</th>
					<th>Alive</th>
					<th>Below 5 Years</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		    <?php foreach($peopleList as $x) { ?>
				<tr>
					<td><?=$x->fullName?></td>
					<td><?=$x->education_condition?></td>
					<td><?=$x->age_in_marriage?></td>
					<td><?=(!empty($x->protected_on_Rubella)) ? $protectedOnRubella[$x->protected_on_Rubella]: '' ?></td>
					<td><?=$x->number_in_alive?></td>
					<td><?=$x->number_in_below_5years?></td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Action <span class="caret"></span>
							</button>
							<ul class="dropdown-menu action">
								<?php if (empty($x->regWifeId)) { ?>
								<li><a class="action add-edit" data-type="add" data-page-name="Register Wife" href="/midwife/reg_wife/add_edit/<?=$homeId?>/<?=$x->peopleId?>">Register Wife</a></li>
								<?php } elseif (empty($x->aboutChildrenId)) { ?>
								<li><a class="action add-edit" data-type="add" href="/midwife/about_children/add_edit/<?=$homeId?>/<?=$x->peopleId?>/<?=$x->regWifeId?>">Add About Children</a></li>
								<?php } else { ?>
								<li><a class="action add-edit" data-type="edit" href="/midwife/about_children/add_edit/<?=$homeId?>/<?=$x->peopleId?>/<?=$x->regWifeId?>/<?=$x->aboutChildrenId?>">Edit About Children</a></li>
								<li><a class="action delete" href="/midwife/about_children/delete/<?=$x->id?>">Delete About Children</a></li>
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
pageName = "About Children";

$(document).ready(function() {
	$('#home-select').on('change', function(e) {
		e.preventDefault();

		var urlPart = $('#home-select').val();

		window.location.href = "/midwife/about_children/"+urlPart;
	});
});
</script>
