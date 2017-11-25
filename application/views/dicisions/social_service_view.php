<?php 
$this->load->view('layouts/header');
?>  

<div class="row">
	<div class="col-md-12">
		<h4>
			Social Service Granters<br>
			<small>Peoples who grant the social Services::</small>
		</h4>
	</div>
	<div class="col-md-12">
		<table class="table table-striped no-top-border">
			<thead>
				<tr>
					<th>Full Name</th>
					<th>Date Of Birth</th>
					<th>Age</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($socialServiceGranters as $key => $value) { ?>
				<tr>
					<td><?=$value->fullName; ?></td>
					<td><?=$value->dateOfBirth;?></td>
					<td><?=(int)$value->ageInYears;?></td>
				</tr>
			<?php }?>
			</tbody>
		</table>
	</div>
</div>

<?php $this->load->view('layouts/footer'); ?>