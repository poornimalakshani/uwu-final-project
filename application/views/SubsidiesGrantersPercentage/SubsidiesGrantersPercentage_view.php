<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>Percentage of All Subsidies Granters</h2>
  <p>Percentage of  All Subsidies Granters:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Percentage</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($SubsidiesGrantersPercentage as $key => $value) {
    	?>
    
      <tr>

        <td><?=$value->percentage; ?></td>
        
        
      </tr>
     <?php }?>
      
    </tbody>
  </table>
</div>