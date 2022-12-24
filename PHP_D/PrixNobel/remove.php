
<html>
 <head>
  <title>Controler</title>
 </head>
 <style>
  body{
   display: flex;
   justify-content: center;
   align-items: center;
   height: 100vh;
   background-color: #686887;
   font-family: monospace;
   font-size: 20px;
   flex-direction: column;
   gap: 25px;
  }
  h2{
   padding: 10px;
   border-radius: 10px;
   background-color: #C9C9D9;
   margin: 10px auto;
   color: #f9f9f9;
  }
  button{
   padding: 10px;
   border-radius: 10px;
   border: none;
   outline: none;
   background-color: #C9C9D9;
   font-family: monospace;
   font-size: 20px;
   font-weight: bold;
   cursor: pointer;
  }
  a{
   text-decoration: none;
   color: white;
  }
</style>
<body>
 <?php
require 'modal.php';
$id = $_GET['id'];
$main = new Modal();
$main->remove_nobel_prize($id);
if(isset($_POST['btn'])){
 header("Location:home.php");
}
?>
<button type="submit"><a href="home.php">Back Home</a></button>

</body>
</html>