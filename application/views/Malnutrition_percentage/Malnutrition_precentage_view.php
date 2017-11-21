<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>Percentage of Malnutrition Children</h2>
  <p>Percentage of Malnutrition Children:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Percentage</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($MalnutritionPercentage as $key => $value) {
    	?>
    
      <tr>

        <td><?=$value->percentage; ?></td>
        
        
      </tr>
     <?php }?>
      
    </tbody>
  </table>
</div>
<?php $this->load->view('layouts/footer'); ?>