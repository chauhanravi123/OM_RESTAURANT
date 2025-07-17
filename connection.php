<?php
$server="localhost";
$user ="root";
$password ="";
$dbname ="om_restaurant";

 $conn= new mysqli($server,$user,$password,$dbname);

 if(!$conn)
   echo "Error !:{$conn->connect_Error}";

?>