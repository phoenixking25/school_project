<?php
include ('config.php');
session_start();

if($_SERVER("REQUEST_METHOD") == "POST")
{
	$username = mysqli_escape_string($db , $_POST['username']);
	$password = mysqli_escape_string($db , $_POST['password']);
	$sql = "SELECT id FROM admin WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query($sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active = $row['active'];
	$count = mysqli_num_rows($result);

	if($count == 1){
		session_register('username');
		$_SESSION['login_user']= $username;
		header("location,myadmin.php");
		}
		else{
			$error = "Your login Name or Password is invalid.";
		}
}
