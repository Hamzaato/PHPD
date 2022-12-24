<?php
 require "../../Exer-01/connect.php";
 $id = $_GET['id'];
 $query = "SELECT * FROM nobels WHERE id = $id";
 $response = mysqli_query($connect,$query);
 $data = mysqli_fetch_array($response);
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Update</title>
</head>
<style>
 body{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #686887;
 }
 form{
  display: flex;
  flex-direction: column;
  background-color: #C9C9D9;
  padding: 10px 20px;
  border-radius: 10px;
  font-family: monospace;
  font-size: 18px;
  width: 500px;
 }
 input,textarea{
  width: 90%;
  padding: 8px;
  margin: 5px auto;
  border-radius: 10px;
  border: none;
  outline:none;
 }
 input,textarea:not(input[type='radio']){
  border: #eee solid 2px;
 }
 textarea{
  resize: none;
 }
 input[type='submit']{
  background-color: #fff;
  font-family: monospace;
  font-size: 20px;
  font-weight: bold;
  cursor: pointer;
 }
 h3{
  text-align: center;
 }
</style>
<body>
 <form method="post">
   <h3>Update</h3>
   <label for="">name : </label>
   <input type="text" name="name" value="<?php echo $data['name'] ?>">
   <label for="">year</label>
   <input type="number" name="year" value="<?php echo $data['year'] ?>">
   <label for="">Birth Date</label>
   <input type="number" name="birth" value="<?php echo $data['birthdate'] ?>">
   <label for="">Birth Place</label>
   <input type="text" name="place" value="<?php echo $data['birthplace'] ?>">
   <label for="">Country</label>
   <input type="text" name="country" value="<?php echo $data['county'] ?>">
   <?php
   require 'modal.php';
   $arr = new Modal();
   $cats = $arr->get_categories();
   foreach($cats as $cat){
    echo $cat.'<input type="radio" name="cat" value='.$cat.'>';
   }
   ?>
   <textarea name="nobel"  rows="1"
   value="<?php echo $data['motivation'] ?>">
  </textarea>
   <input name="submit" type="submit" value="Update">
  </form>
  <?php
  function update_data(){
      $name = $_POST['name'];
      $year = $_POST['year'];
      $birth = $_POST['birth'];
      $place = $_POST['place'];
      $country = $_POST['country'];
      $cat = $_POST['cat'];
      $nobel = $_POST['nobel'];
      $main = new Modal();
      $main->updateNobelPrize($_GET['id'],$year,$cat,$name,$birth,$place,$country,$nobel);
      header("Location:home.php");
   }
if(isset($_POST['submit'])){
  update_data();
}
  ?>
</body>
</html>