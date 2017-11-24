<?php $this->load->view('layouts/header'); ?>
<style>
	.table td, .table th {
		border-top: none;
	}
</style>
<div class="row">
	<div class="col-md-12">
	<h4>Admin List <span class="pull-right"><small><a href="/user_manager/add_edit" data-type="add" class="btn btn-success add-edit">Add New</a></small></span></h4>
	</div>
	<div class="col-md-12">
		<?php
		$adminCount = 0;
		foreach($users as $x) {
			if ($x->type != 309) {
				$adminCount++;
			}
		}
		?>
		<?php if(empty($adminCount)) { ?>
		<p class="text-warning">Sorry No Admin found!</p>
		<?php } else { ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>User Name</th>
					<th>Name</th>
					<th>Address</th>
					<th>Telephone</th>
					<th>Email</th>
					<th>Type</th>
					<th>Status</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		    <?php foreach($users as $x) {
				if ($x->type == 309) {
					continue;
				}
				?>
				<tr>
					<td><?=$x->userName?></td>
					<td><?=$x->name?></td>
					<td><?=$x->address?></td>
					<td><?=$x->telephone?></td>
					<td><?=$x->email?></td>
					<td><?=$adminTypes[$x->type]?></td>
					<td><?=$adminStatus[$x->status]?></td>
					<td align="right">
						<a class="action add-edit" data-type="edit" href="/user_manager/add_edit/<?=$x->id?>"><i class="fa fa-pencil fa-lg"></i></a>
						<a class="action delete" href="/user_manager/delete/<?=$x->id?>"><i class="fa fa-trash fa-lg"></i></a>
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
pageName = "Admin";
</script>