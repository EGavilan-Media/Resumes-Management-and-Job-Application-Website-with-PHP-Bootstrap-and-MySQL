<?php

  require_once "connection.php";

  $sql="SELECT position_name,
              position_description,
              position_requirement
          FROM tbl_position WHERE position_id='1'";
          
  $result=mysqli_query($connection,$sql);
      
  $row=mysqli_fetch_row($result);
      
  $data=array(
        'position_name'        => $row[0],
        'position_description' => $row[1],
        'position_requirement' => $row[2]
      );

  echo json_encode($data);

?>