<?php
class Modal{
 public $host = 'localhost';
 public $user = 'root';
 public $password = 'root';
 public $db = 'php_test';
 public $connect = '';
 function __construct()
 {
   $this->connect = mysqli_connect($this->host,$this->user,$this->password,$this->db);
 }
 function get_last(){
    $query = " SELECT * FROM nobels ORDER BY year DESC LIMIT 25";
    $response = mysqli_query($this->connect,$query);
    while($data = mysqli_fetch_assoc($response)){
     echo '<tr>';
     echo '<td>'.$data['name'].'</td>';
     echo '<td>'.$data['category'].'</td>';
     echo '<td>'.$data['year'].'</td>';
     echo '</tr>';
    }
 }
 function get_nb_nobel_prizes(){
  $query = "SELECT count(*) as total FROM nobels";
  $res = mysqli_query($this->connect,$query);
  $data = mysqli_fetch_assoc($res);
  return '<h2>Totla Nobels is :'.$data['total'].'</h2>';

 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Class Last</title>
</head>
<style>
 *{
  font-family: monospace;
  font-size: 1.2rem;
 }
 table{
  width: 100%;
  margin-top: 5rem;
  text-align: center;
 }
 table tr:nth-child(even){
  background-color: #eee;
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
    $res = new Modal();
    echo $res->get_nb_nobel_prizes();
    $res->get_last();
    ?>
   </tbody>
  </table>
</body>
</html>
</html>