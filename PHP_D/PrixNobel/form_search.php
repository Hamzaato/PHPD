<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Nobel Search</title>
</head>
<style>
 body{
  background-color: #686887;
  font-family: monospace;
  font-size: 1rem;
 }
 form{
  width: 90%;
  background-color: #c9c9d9;
  margin: 90px auto;
  padding: 20px;
  border-radius: 10px;
 }
 form h2{
  text-align: center;
  margin-bottom: 35px;
 }
 form div{
  margin: 10px;
 }
 form .one{
  display: flex;
  flex-direction: column;
 }
 input{
  width: 40%;
  padding: 5px 10px;
  border: none;
  border-radius: 5px;
  outline: none;
 }
 select{
  background-color: #eee;border-radius: 5px;
  padding: 5px;
 }
 button{
  padding: 10px;
  color: #fff;
  font-size: 15px;
  border: none;
  background-color: #777;
  border-radius: 5px;
 }
</style>
<body>
 <form action="search.php" method="post">
  <h2>Find Among Nobel Prizes</h2>
  <div class="one">
     <label for="">Name Contains : </label><br>
     <input type="text" name="name">
  </div>
  <div>
   <label for="">Year : </label><br><br>
   <select name="filter">
    <option value="<="><=</option>
    <option value=">=">>=</option>
    <option value="=">==</option>
   </select>
   <input type="number" name="year">
  </div>
  <button type="submit" name="submit">Search</button>
 </form>
</body>
</html>