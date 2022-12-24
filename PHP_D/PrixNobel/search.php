<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Pagination</title>
</head>
<style>
 body{
  background-color: #686887;
 }
 *{
  font-family: monospace;
  font-size: 1rem;
 }
 table {  
   border-collapse: collapse; 
   width: 100%; 
   text-align: center;
   margin-top: 5rem;
   background-color: #fff;
   height: 250px;
 }
 table thead tr{
  background-color: #eee;
 }
 table th{
  color: #777;
   text-transform: uppercase;
   font-size: 20px;
 }
 table tr:nth-child(even){
  background-color: #c9c9d9;
 }
 .pagination{
  display: flex;
  list-style: none;
  justify-content: space-evenly;
  align-items: center;
  margin-top: 25px;
 }
 .pagination a {   
 font-weight:bold;   
 font-size:16px;   
 color: black;   
 padding: 5px 10px;
 border-radius: 10px;   
 text-decoration: none;   
 border:2px solid #eee; 
background-color: #fff;  
 }
 .pagination a:hover{
  background-color: #eee;
 } 
</style>
<body>
<table>
 <thead>
  <tr>
   <th>id</th>
   <th>name</th>
   <th>category</th>
   <th>year</th>
  </tr>
 </thead>
 <tbody>
  <?php
require "../../Exer-01/connect.php";
//1. Get the current page number
   if (isset($_GET['page'])) {
     $page = $_GET['page'];
  } else {
     $page = 1;
  }
// 2. The formula for php pagination
  $no_of_records_per_page = 10;
  $offset = ($page-1) * $no_of_records_per_page;
// 3. Get the number of total number of pages
  $total_pages_sql = "SELECT COUNT(*) FROM nobels";
  $result = mysqli_query($connect,$total_pages_sql);
  $total_rows = mysqli_fetch_array($result)[0];
  $total_pages = ceil($total_rows / $no_of_records_per_page);
//4. Constructing the SQL Query for pagination
  $name = $_POST['name'];
  $year = $_POST['year'];
  $filter = $_POST['filter'];
  $sql = "SELECT * FROM nobels  WHERE year $filter '$year' and motivation like '%$name%' LIMIT 10"; 
  $res_data = mysqli_query($connect,$sql);
  while($row = mysqli_fetch_array($res_data)){
   echo '<tr>
   <td>'.$row['id'].'</td> 
   <td>'.$row['name'].'</td> 
   <td>'.$row['category'].'</td> 
   <td>'.$row['year'].'</td> 
   </tr>';
  }
  mysqli_close($connect);
?>
 </tbody>
</table>
<!-- Pagination buttons -->
<ul class="pagination">
    <li><a href="?page=1">First</a></li>
    <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Prev</a>
    </li>
    <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next</a>
    </li>
    <li><a href="?page=<?php echo $total_pages; ?>">Last</a></li>
</ul>

</body>
</html>