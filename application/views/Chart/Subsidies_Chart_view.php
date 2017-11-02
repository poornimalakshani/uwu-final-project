<!DOCTYPE html> 
  <head> 
  <title>Subsidies Granters and Non Subsidies Granters</title> 
    <!--Load the AJAX API--> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
    <script type="text/javascript"> 
     
    // Load the Visualization API and the piechart package. 
    google.charts.load('current', {'packages':['corechart']}); 
       
    // Set a callback to run when the Google Visualization API is loaded. 
    google.charts.setOnLoadCallback(drawChart); 
       
    function drawChart() { 
      var jsonData = $.ajax({ 
          url: "<?php echo base_url() . 'SubsidiesChart/getdata' ?>",
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.PieChart(document.getElementById('chart_div')); 
      chart.draw(data, {width: 900, height: 500}); 
    } 
 
    </script> 
<style> 
h1 { 
    text-align: center; 
} 
</style> 
  </head> 
 
  <body> 
    <!--Div that will hold the pie chart--> 
    <h1>Subsidies Granters and Non Subsidies Granters</h1> 
    <div id="chart_div"></div> 
  </body> 
</html> 