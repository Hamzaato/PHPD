<?php

// Récupérer le nombre de prix nobels dans la base de données pour l'afficher à la place de TO FILL.


require "begin.html";

?>
<style>
 a{
  text-decoration: none;
  color: black;
}
strong{
 color: white;
}
</style>
 <main>
  <h1> List of the nobel prizes </h1>
  <?php require "last25.php" ?>
 </main>
<p> Welcome to the website listing the different nobel prizes given until 2010. It references <strong>
 <?php require 'count.php' ?>
</strong> nobel prizes. You can modify this list by adding new Nobel Prizes, and removing or updating the information contained in this database. You can also search among the nobel prizes on the name, the year and the different categories. </p>


<?php require "end.html"; ?>