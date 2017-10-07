<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>Low Age Marriages</h2>
  <p>Peoples who get married in low age:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Full Name</th>
       <th>Age</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($LowAgeMarriage as $key => $value) {
    	?>
    
      <tr>

        <td><?=$value->fullName; ?></td>
        
        
        <td><?=(int)$value->age_in_marriage;?></td>
      </tr>
     <?php }?>
      
    </tbody>
  </table>
</div>