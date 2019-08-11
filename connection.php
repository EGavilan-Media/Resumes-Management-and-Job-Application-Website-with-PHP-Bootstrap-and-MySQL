<?php

  // database connection
  $connection = mysqli_connect("localhost","root","","egm_application");

  if(!$connection){
    die("Connection failed: ".mysql_connect_error());
  }

 ?>