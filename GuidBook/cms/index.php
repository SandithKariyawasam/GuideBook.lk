<?php
session_start();
if(!isset($_SESSION["useremail"])){
	header('location:login.php');
}
?>
<!--
	<h1></h1>
<a href="logout.php"><img src="../assets/images/power.png" width="50px" height="50px"></img></a>
<br/><br/>
-->
<?php include('Add.php');
?>