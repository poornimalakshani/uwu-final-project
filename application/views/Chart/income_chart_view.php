<?php $this->load->view('layouts/header'); ?>

<div class="row">
	<div class="col-md-12">
		<h4>Population based on Income</h4>
	</div>
	<div class="col-md-12">
		<div id="bar_chart"></div>
	</div>
</div>

<?php $this->load->view('layouts/footer'); ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript">
	// Load the Visualization API and the line package.
	google.charts.load('current', {'packages':['bar']});
	// Set a callback to run when the Google Visualization API is loaded.
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		$.ajax({
			type: 'POST',
			url: '<?php echo base_url() . 'income_chart/getdata' ?>',
			success: function (data1) {
				// Create our data table out of JSON data loaded from server.
				var data = new google.visualization.DataTable();

				data.addColumn('string', 'category');
				data.addColumn('number', 'count');

				var jsonData = $.parseJSON(data1);

				console.log(jsonData)
				for (var i = 0; i < jsonData.length; i++) {
					data.addRow([jsonData[i].category, parseInt(jsonData[i].count)]);
				}

				var options = {
					chart: {
						//subtitle: 'Show Sales and Expense of Company'
					},
					width: 900,
					height: 500,
					axes: {
						x: {
							0: {side: 'top'}
						}
					}
				};

				var chart = new google.charts.Bar(document.getElementById('bar_chart'));
				chart.draw(data, options);
			}
		});
	}
</script>