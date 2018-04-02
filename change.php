<?php
	session_start();
	$_SESSION['var']=$_SESSION['var']+1;
	header('Location:teststart.php');
?>