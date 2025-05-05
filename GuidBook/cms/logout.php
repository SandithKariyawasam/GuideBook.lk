<?php
session_start();
if(isset($_SESSION["useremail"])){
	session_unset();
	header('location:login.php');
}
else{
	header('location:login.php');
}

?>