<?php

  require_once "connection.php";

  $firstname = $_POST['firstname'];
  $lastname  = $_POST['lastname'];
  $email     = $_POST['email'];
  $phone     = $_POST['phone'];
  $address   = ($_POST['address']);

  $file_name      = $_FILES['resume']['name'];
  $file_path      = $_FILES['resume']['tmp_name'];
  $storage_folder = 'files';
  $final_path     = $storage_folder . '/' . $file_name;

  //Upload files to files' folder
  move_uploaded_file($file_path, $final_path);

  $query1 = "INSERT INTO tbl_file(file_name, file_storage_path) VALUES('$file_name','$final_path')";

  $result1 = mysqli_query($connection, $query1);

  $file_id = mysqli_insert_id($connection);

  //Insert into candidate table
  $query2 = "INSERT INTO tbl_candidate(file_id,
                          candidate_firstname, 
                          candidate_lastname, 
                          candidate_email, 
                          candidate_phone, 
                          candidate_address, 
                          created_date)
                  VALUES( '$file_id',
                          '$firstname', 
                          '$lastname', 
                          '$email', 
                          '$phone', 
                          '$address',
                          NOW())";

  $result = mysqli_query($connection, $query2);

?>