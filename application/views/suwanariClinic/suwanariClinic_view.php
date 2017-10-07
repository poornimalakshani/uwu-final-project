<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>Focus on Suwanarii Clinic</h2>
  <p>Peoples who want to participate Suwanari Clinic:</p>            
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
    foreach ($SuwanariClinic as $key => $value) {
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