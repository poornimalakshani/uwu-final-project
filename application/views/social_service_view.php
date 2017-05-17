<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>Social Service Granters</h2>
  <p>Peoples who grant the social Services:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Full Name</th>
       
        <th>Date Of Birth</th>
        <th>Age</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($socialServiceGranters as $key => $value) {
    	?>
    
      <tr>

        <td><?=$value->fullName; ?></td>
        
        <td><?=$value->dateOfBirth;?></td>
        <td><?=(int)$value->ageInYears;?></td>
      </tr>
     <?php }?>
      
    </tbody>
  </table>
</div>