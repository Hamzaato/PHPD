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
 <title>Last</title>
</head>
<style>
 *{
  font-family: monospace;
  font-size: 1.2rem;
 }
 body{
  background-color: #686887;
 }
 table{
  width: 100%;
  margin-top: 5rem;
  text-align: center;
 }
 table tr:nth-child(even){
  background-color: #C9C9D9;
 }
</style>
<body>
  <table>
   <thead>
    <tr>
     <th>Full name</th>
     <th>Price</th>
     <th>Year</th>
    </tr>
   </thead>
   <tbody>
    <?php
    $query = " SELECT * FROM nobels ORDER BY year DESC LIMIT 25";
    $response = mysqli_query($connect,$query);
    while($data = mysqli_fetch_assoc($response)){
     echo '<tr>';
     echo '<td>'.$data['name'].'</td>';
     echo '<td>'.$data['category'].'</td>';
     echo '<td>'.$data['year'].'</td>';
     echo '</tr>';
    }
    ?>
   </tbody>
  </table>
</body>
</html>