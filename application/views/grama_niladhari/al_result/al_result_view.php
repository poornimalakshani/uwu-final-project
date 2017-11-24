<?php $this->load->view('layouts/header'); ?>

<div class="row">
	<div class="col-md-12">
	<h4>
		A/L Results <?=(!empty($peopleId)) ? 'of '.$people->fullName : '' ?>
		<?php if(!empty($peopleId)) { ?>
		<span class="pull-right"><small><a href="/grama_niladhari/al_result/add_edit/<?=$homeId?>/<?=$peopleId?>" data-type="add" class="btn btn-success add-edit">Add New</a></small></span>
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
				<option value="0">-- Select People --</option>

				<?php if(!empty($peopleList)) {
					foreach($peopleList as $x) { ?>
				<option value="<?=$x->id?>" <?=($x->id == $peopleId) ? 'selected="selected"': ''; ?>><?=$x->fullName?></option>
				<?php }
				} ?>
			</select>
		</div>

		<?php if(empty($alResults)) { ?>
			<p class="text-warning"><?=(empty($peopleId) ? 'Please Select A People!' : 'Sorry, No A/L Results!')?></p>
		<?php } else { ?>
		<table class="table table-striped">
			<tbody>
		    <?php foreach($alResults as $x) { ?>
				<tr>
					<td><?=$subjects[$x->subject]?></td>
					<td><?=$x->result?></td>
					<td align="right">
						<a class="action add-edit" data-type="edit" href="/grama_niladhari/al_result/add_edit/<?=$homeId?>/<?=$peopleId?>/<?=$x->id?>"><i class="fa fa-pencil fa-lg"></i></a>
						<a class="action delete" href="/grama_niladhari/al_result/delete/<?=$x->id?>"><i class="fa fa-trash fa-lg"></i></a>
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
pageName = "A/ L Results";

$(document).ready(function() {
	$('#home-select').on('change', function(e) {
		e.preventDefault();

		var urlPart = $('#home-select').val();

		window.location.href = "/grama_niladhari/al_result/"+urlPart;
	});

	$('#people-select').on('change', function(e) {
		e.preventDefault();

		var urlPart = $('#home-select').val();
		if (urlPart) {
			if ($('#people-select').val() > 0) {
				urlPart += '/' + $('#people-select').val();
			}
		}

		window.location.href = "/grama_niladhari/al_result/" + urlPart;
	});
});
</script>
