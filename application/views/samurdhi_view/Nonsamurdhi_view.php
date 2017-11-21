<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>Non Samurdhi Granters</h2>
  <p>Peoples who do not grant the Samurdhi:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Home Id</th>
       
        <th>Address</th>
        <th>Income(Rs)</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($NonSamurdhiGranters as $key => $value) {
    	?>
    
      <tr>

        <td><?=$value->id; ?></td>
        <td><?=$value->address;?></td>
        <td><?=$value->income;?></td>
      </tr>
     <?php }?>
      
    </tbody>
  </table>
</div>
<?php $this->load->view('layouts/footer'); ?>