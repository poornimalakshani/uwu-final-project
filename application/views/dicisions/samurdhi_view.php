<?php 
$this->load->view('layouts/header');
?>

<div class="row">
	<div class="col-md-12">
		<h4>
			Samurdhi Granters<br>
			<small>Peoples who grant the Samurdhi:</small>
		</h4>
	</div>
	<div class="col-md-12">
		<table class="table table-striped no-top-border">
			<thead>
				<tr>
					<th>Home Id</th>
					<th>Address</th>
					<th>Income(Rs)</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach ($samurdhiGranters as $key => $value) {
			?>
				<tr>
					<td><?=$value->id; ?></td>
					<td><?=$value->address;?></td>
					<td><?=$value->income;?></td>
				</tr>
			<?php }?>

			</tbody>
		</table>
	</div>
</div>

<?php $this->load->view('layouts/footer'); ?>