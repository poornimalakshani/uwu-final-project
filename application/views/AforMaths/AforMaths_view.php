<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>A passes for Ordinary Level Matamatics</h2>
  <p>Students who get A pass for O/L Mathamatics:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Full Name</th>
       
       
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($AforMaths as $key => $value) {
    	?>
    
      <tr>

        <td><?=$value->fullName; ?></td>
        
       
      </tr>
     <?php }?>
      
    </tbody>
  </table>
</div>