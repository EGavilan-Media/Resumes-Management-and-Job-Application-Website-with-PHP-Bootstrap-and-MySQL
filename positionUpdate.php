<?php
  require_once "connection.php";

  $name         = $_POST['name'];
  $description  = $_POST['description'];
  $requirement  = $_POST['requirement'];

  //update candidate table
  $query = "UPDATE tbl_position SET position_name='$name', 
  									position_description='$description', 
  									position_requirement='$requirement', 
  									created_date=NOW() 
  									WHERE position_id='1'";                         

  $result = mysqli_query($connection, $query);
  echo $result;

?>