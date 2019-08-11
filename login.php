<?php

	session_start();
	
	require_once "connection.php";

	$username = $_POST['username'];
	$password = sha1($_POST['password']);	

  	$sql="SELECT * FROM tbl_admin WHERE admin_name = '$username' AND admin_password = '$password'";

	$result=mysqli_query($connection,$sql);

	if(mysqli_num_rows($result) > 0){
		$_SESSION['username']=$username;
		echo 1;
	}else{
		echo 0;
	}

?>
