<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>Risk To Weight Children</h2>
  <p>Children who have Risk For Malnutrition:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Home ID</th>
        <th>Full Name</th>

       
       
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($RiskWeightChildren as $key => $value) {
    	?>
    
      <tr>
      <td><?=$value->home_id; ?></td>
        <td><?=$value->fullName; ?></td>
        
       
      </tr>
     <?php }?>
      
    </tbody>
  </table>
</div>
<?php $this->load->view('layouts/footer'); ?>