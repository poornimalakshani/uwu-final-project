<?php $this->load->view('layouts/header'); ?>

<div class="row">
	<div class="col-md-12">
	<h4>Home List <span class="pull-right"><small><a href="/grama_niladhari/home/add_edit" data-type="add" class="btn btn-success add-edit">Add New</a></small></span></h4>
	</div>
	<div class="col-md-12">
		<table class="table table-striped">
			<tbody>
		    <?php foreach($home as $x) { ?>
				<tr>
					<td><a href="/grama_niladhari/people1/<?=$x->id?>"><?=$x->address?></a></td>
					<td align="right">
						<a class="action" href="/grama_niladhari/people1/<?=$x->id?>"><i class="fa fa-eye fa-lg"></i></a>
						<a class="action add-edit" data-type="edit" href="/grama_niladhari/home/add_edit/<?=$x->id?>"><i class="fa fa-pencil fa-lg"></i></a>
						<a class="action delete" href="/grama_niladhari/home/delete/<?=$x->id?>"><i class="fa fa-trash fa-lg"></i></a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
    </div>
</div>

<?php $this->load->view('layouts/dialog'); ?>

<?php $this->load->view('layouts/footer'); ?>    

<script type="text/javascript">
pageName = "Home";
</script>