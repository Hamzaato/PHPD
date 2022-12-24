<?php
class Modal{
 public $host = 'localhost';
 public $user = 'root';
 public $password = 'root';
 public $db = 'php_test';
 public $connect = '';
 function __construct(){
   $this->connect = mysqli_connect($this->host,$this->user,$this->password,$this->db);
 }
 function get_last(){
    $query = " SELECT * FROM nobels ORDER BY year DESC LIMIT 25";
    $response = mysqli_query($this->connect,$query);
    while($data = mysqli_fetch_assoc($response)){
     echo '<tr>';
     echo '<td>
     <a href="informations.php?id='.$data['id'].'">'.$data['name'].'<a/>
     </td>';
     echo '<td>'.$data['category'].'</td>';
     echo '<td>'.$data['year'].'</td>';
     echo '<td class="action">
     <a href="remove.php?id='.$data['id'].'"><img src="./Content/img/remove-icon.png"/><a/>
     <a href="form_update.php?id='.$data['id'].'"><img src="./Content/img/edit-icon.png"/><a/>
     </td>';
     echo '</tr>';
    }
 }

 function get_nb_nobel_prizes(){
  $query = "SELECT count(*) as total FROM nobels";
  $res = mysqli_query($this->connect,$query);
  $data = mysqli_fetch_assoc($res);
  echo $data['total'];
 }

 function get_nobel_prize_informations($id){
  $query = "SELECT * from nobels WHERE id = $id";
  $response = mysqli_query($this->connect,$query);
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

 function get_categories(){
  $categories = array();
  $query = "SELECT Distinct category from nobels";
  $response = mysqli_query($this->connect,$query);
  while($data = mysqli_fetch_assoc($response)){
    array_push($categories,$data['category']);
  }
  return $categories;
 }

 function add_nobel_prize($year,$category,$name,$birthdate,$birthplace,$country,$motivation){
     $query = "INSERT into nobels(year, category,name,birthdate,birthplace, county, motivation) values('$year','$category','$name','$birthdate','$birthplace','$country','$motivation')";
   if(mysqli_query($this->connect,$query)){
    echo 'New Record';
   }else{
    echo "Failed";
   }
 }

 function remove_nobel_prize($id){
  $query = "DELETE FROM nobels WHERE id = $id";
  $res = mysqli_query($this->connect,$query);
  if($id === ''){
    echo 'There is no id in the url';
   }
   elseif(mysqli_query($this->connect,$query)){
    echo "<h2>The nobel prize has been removed</h2>";
   }
   else{
    echo "There is no nobel prize with such id";
   }
 }

 function updateNobelPrize($id,$year,$category,$name,$birthdate,$birthplace,$country,$motivation){
  $query = "UPDATE nobels SET year = '$year',category = '$category',
  name = '$name',birthdate = '$birthdate', birthplace = '$birthplace',county = '$country',motivation = '$motivation'  WHERE id = '$id'";
  if(mysqli_query($this->connect,$query)){
    echo "Success";
  }
 }
 function get_nobel_prizes_with_limit($offset, $limit){
  $sql = "SELECT * FROM nobels LIMIT $limit, $offset"; 
  $res_data = mysqli_query($this->connect,$sql);
  while($row = mysqli_fetch_array($res_data)){
   echo '<tr>
   <td>'.$row['id'].'</td> 
   <td>'.$row['name'].'</td> 
   <td>'.$row['category'].'</td> 
   <td>'.$row['year'].'</td> 
   </tr>';
  }
 }
 function search_nobel_prizes($filters, $offest, $limit){
  
 }
}
?>