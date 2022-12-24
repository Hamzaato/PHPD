<?php 
 $host = 'localhost';
 $user = 'root';
 $password = 'root';
 $db = 'php_test';
 $connect = mysqli_connect($host,$user,$password,$db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Info</title>
</head>
<style>
  body{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  flex-direction: column;
  font-family: monospace;
  font-size: 20px;
 }
 input{
  padding: 10px 15px;
  border: 2px solid #eee;
  outline: none;
  border-radius: 10px;
  font-family: monospace;
  font-size: 20px;
  margin: 20px;
 }
</style>
<body>
 <form method="post">
  <input type="number" name="id" placeholder="Taper un Number"><br><br>
  <input type="submit" name="submit" value="Afficher">
 </form>
 <?php
 if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $query = "SELECT * from nobels WHERE id = $id";
  $response = mysqli_query($connect,$query);
  if($data = mysqli_fetch_assoc($response)){
   echo '<ul>
<li>'.$data['name'].'</li>
<li>'.$data['category'].'</li>
<li>'.$data['year'].'</li>
<li>'.$data['county'].'</li>
<li>'.$data['motivation'].'</li>
</ul>';
  }
  else{
   echo 'None';
  }
  
 }
 ?>
</body>
</html>