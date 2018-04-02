<?php
	$question=$_POST['test'];
	session_start();
	$college=$_SESSION['school'];
	$testname=$_SESSION['paper'];
	$conn=mysqli_connect("localhost:4000","root","","{$college}");
	//$result=mysqli_query($conn," select count(distinct id) from {$testname} ")or die("Failed to query database ".mysqli_error($conn));
	//echo $result;
	//$no=mysqli_fetch_array($result,MYSQLI_NUM);
	$result=mysqli_query($conn,"select * from {$testname} where id={$question} ")or die("Failed to query database 	".mysqli_error($conn));
	$no=mysqli_fetch_array($result,MYSQLI_NUM);
	echo $no[0]." ".$no[1]." ".$no[2]." ".$no[3]." ".$no[4]." ".$no[5];
?>