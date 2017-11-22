<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>Scholarship Granters</h2>
  <p>Peoples who grant the Scholarship:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>People Id</th>
       
        <th>Name</th>
        <th>Income(Rs)</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($scholarship as $key => $value) {
    	?>
    
      <tr>

        <td><?=$value->id; ?></td>
        <
        <td><?=$value->fullName;?></td>
        <td><?=$value->income;?></td>
      </tr>
     <?php }?>
      
    </tbody>
  </table>
</div>
<?php $this->load->view('layouts/footer'); ?>