<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>Normal Weight Children</h2>
  <p>children who have Normal weight:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Full Name</th>
       
       
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($NormalWeightChildren as $key => $value) {
    	?>
    
      <tr>

        <td><?=$value->fullName; ?></td>
        
       
      </tr>
     <?php }?>
      
    </tbody>
  </table>
</div>