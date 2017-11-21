<?php 
$this->load->view('layouts/header');
?>  
<div class="container">
  <h2>Average Income</h2>
  <p>Average Income:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Average Income</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($averageIncome as $key => $value) {
    	?>
    
      <tr>

        <td><?=$value->income; ?></td>
        
        
      </tr>
     <?php }?>
      
    </tbody>
  </table>
</div>
<?php $this->load->view('layouts/footer'); ?>