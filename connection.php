<?php
$server="localhost";
$user ="root";
$password ="";
$dbname ="OM_RESTAURANT";

 $conn= new mysqli($server,$user,$password,$dbname);

 if(!$conn)
   echo "Error !:{$conn->connect_Error}";
   else
     echo "Connected to the databse successfully!"; 

?>