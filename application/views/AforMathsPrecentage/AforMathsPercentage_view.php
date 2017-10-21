<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>Percentage of get A pass for Mathamatics</h2>
  <p>Percentage of get A pass for Mathamatics:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Percentage</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($AforMathsPercentage as $key => $value) {
    	?>
    
      <tr>

        <td><?=$value->percentage; ?></td>
        
        
      </tr>
     <?php }?>
      
    </tbody>
  </table>
</div>