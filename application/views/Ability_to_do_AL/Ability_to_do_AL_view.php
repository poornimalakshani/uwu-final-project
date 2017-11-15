<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>Ability to do Advanced Level</h2>
  <p>Students who have ability to do Advanced Level:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Full Name</th>
       
       
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($AbilityToDoAL as $key => $value) {
    	?>
    
      <tr>

        <td><?=$value->fullName; ?></td>
        
       
      </tr>
     <?php }?>
      
    </tbody>
  </table>
</div>