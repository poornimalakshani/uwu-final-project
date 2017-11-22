<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>Name Of Electoral Register</h2>
  <p>Peoples who register in Electoral Register:</p>            
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
    foreach ($newlyRegisters as $key => $value) {
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
<?php $this->load->view('layouts/footer'); ?>