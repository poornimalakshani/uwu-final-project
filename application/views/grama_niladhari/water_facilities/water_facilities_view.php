<?php $this->load->view('layouts/header'); ?>

<div class="row">
	<div class="col-md-12">
	<h4>
		Water Facility Types
		<?php if(!empty($homeId)) { ?>
		<span class="pull-right"><small><a href="/grama_niladhari/water_facilities/add_edit/<?=$homeId?>" data-type="add" class="btn btn-success add-edit">Add New</a></small></span>
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

		<?php if(empty($waterFacilities)) { ?>
			<p class="text-warning"><?=(empty($homeId) ? 'Please Select A Home!' : 'Sorry, No Water Facility Types!')?></p>
		<?php } else { ?>
		<table class="table table-striped">
			<tbody>
		    <?php foreach($waterFacilities as $x) { ?>
				<tr>
					<td><?=$waterFacilitiesTypes[$x->type]?></td>
					<td align="right">
						<!--<a class="action" href="/grama_niladhari/people1/<?=$x->id?>"><i class="fa fa-eye fa-lg"></i></a>-->
						<a class="action add-edit" data-type="edit" href="/grama_niladhari/water_facilities/add_edit/<?=$homeId?>/<?=$x->id?>"><i class="fa fa-pencil fa-lg"></i></a>
						<a class="action delete" href="/grama_niladhari/water_facilities/delete/<?=$x->id?>"><i class="fa fa-trash fa-lg"></i></a>
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
pageName = "Water Facility Type";

$(document).ready(function() {
	$('#home-select').on('change', function(e) {
		e.preventDefault();

		window.location.href = "/grama_niladhari/water_facilities/"+$(this).val();
	});
});
</script>