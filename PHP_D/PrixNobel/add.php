  <?php
   function check_data(){
   $name = $_POST['name'];
   $year = $_POST['year'];
   $birth = $_POST['birth'];
   $place = $_POST['place'];
   $country = $_POST['country'];
   $cat = $_POST['cat'];
   $nobel = $_POST['nobel'];
    require "modal.php";
    $main = new Modal();
    if($name !== "" && $year !== "" && $cat !== ""){
     $main->add_nobel_prize($year,$cat,$name,$birth,$place,$country,$nobel);
     header("Location:home.php");
    }else{
      return false;
    }
   }
  if(isset($_POST['submit'])){
   check_data();
  }
  ?>