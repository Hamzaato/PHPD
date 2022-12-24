<?php
  require 'modal.php';
  $table = new Modal();
?>
<style>
  table{
    width: 100%;
    text-align: center;
    font-family: monospace;
    font-size: 18px;
    margin-top: 2rem;
  }
  .action{
    display: flex;
    justify-content: space-around;
    width: 100%;
  }
</style>
  <table >
   <thead>
    <tr>
     <th>Full name</th>
     <th>Price</th>
     <th>Year</th>
     <th>Action</th>
    </tr>
   </thead>
   <tbody>
    <?php
    $table->get_last();
    ?>
   </tbody>
  </table>