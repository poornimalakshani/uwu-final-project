<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>Percentage of Samurdhi Granters</h2>
  <p>Percentage of Samurdhi Granters:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Percentage</th>
       
        <
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($newlyRegisters as $key => $value) {
    	?>
    
      <tr>

        <td><?=$value->percentage; ?></td>
        
        
      </tr>
     <?php }?>
      
    </tbody>
  </table>
</div>