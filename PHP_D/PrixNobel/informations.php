
<html>
 <head>
  <title>Info</title>
 </head>
 <style>
 body{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #686887;
 }
 ul{
  list-style: none;
  width: 500px;
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
 }
 ul li{
  padding: 10px;
  border-radius: 10px;
  background-color: #C9C9D9;
  margin: 10px auto;
 }
</style>
<body>
 <?php
require '../../Exer-01/connect.php';
$id = $_GET['id'];
$query = "SELECT * FROM nobels WHERE id = $id";
$res = mysqli_query($connect,$query);
$data = mysqli_fetch_assoc($res);
echo '<ul>
<li>'.$data['name'].'</li>
<li>'.$data['category'].'</li>
<li>'.$data['year'].'</li>
<li>'.$data['county'].'</li>
<li>'.$data['motivation'].'</li>
</ul>'
?>
</body>
</html>