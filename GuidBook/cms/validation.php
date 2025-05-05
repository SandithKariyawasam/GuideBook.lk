<?php
session_start();
if(isset($_POST['login_btn'])){
	include('../database/connection.php');
	$email=$_POST['email'];
	$password=$_POST['password'];
	$hash_password=sha1($password);
	
	$sql="SELECT * FROM user WHERE user_email='$email' AND user_password='$hash_password'";
	$res=mysqli_query($conn,$sql);
	$data_rows=mysqli_fetch_array($res);
	$num_rows=mysqli_num_rows($res);
	
	if($num_rows>=1){
		$username=$data_rows['user_name'];
		$user_email=$data_rows['user_email'];
		$_SESSION["useremail"]=$user_email;
		header('location:index.php');
	}
	else{
		header('location:login.php?alert=error');
	}
}
?>