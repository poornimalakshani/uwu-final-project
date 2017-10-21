<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>Percentage of who have ability to get Election</h2>
  <p>Percentage of who have ability to get Election:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Percentage</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($PercentageGetElection as $key => $value) {
    	?>
    
      <tr>

        <td><?=$value->percentage; ?></td>
        
        
      </tr>
     <?php }?>
      
    </tbody>
  </table>
</div>