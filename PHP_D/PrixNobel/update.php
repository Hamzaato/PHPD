  <?php
  require "../../Exer-01/connect.php";
  require "modal.php";
  $year = 2015;
  $category = "peace";
  $name = "Luffy";
  $birthdate = "1998";
  $birthplace = "East !blue";
  $country = "Japan";
  $motivation = "King Of Pirates";
  $id = 19;
  $up = new Modal();
  $up->updateNobelPrize($id,$year,$category,$name,$birthdate,$birthplace,$country,$motivation)

  ?>
  