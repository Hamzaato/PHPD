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
    require 'connect.php';
    $sql = " SELECT * FROM nobels ORDER BY year DESC LIMIT 25";
    $statment = $conn->query($sql);
    $rows = $statment->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row){
     echo '<tr>';
     echo '<td>'.$row['name'].'</td>';
     echo '<td>'.$row['category'].'</td>';
     echo '<td>'.$row['year'].'</td>';
     echo '</tr>';
    }
    ?>
   </tbody>
  </table>
</body>
</html>