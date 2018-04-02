<?php
	$testname=$_POST['test'];
	$password=$_POST['password'];
	

	$testname = stripcslashes($testname);
	$password=stripcslashes($password);
	session_start();
	$college=$_SESSION['school'];

	
	$conn=mysqli_connect("localhost:4000","root","","{$college}");

	$testname = mysqli_real_escape_string($conn,$testname);
	$password=mysqli_real_escape_string($conn,$password);

	
	$result=mysqli_query($conn,"select count(distinct id) from 	questionpaper ")or die("Failed to query database 	".mysqli_error($conn));
	$row=mysqli_fetch_array($result,MYSQLI_NUM);
	$id=$row[0]+1;
	
	$result=mysqli_query($conn,"Insert into questionpaper values(
	{$id},'{$testname}','{$password}'
	
	); ")or die("Failed to query database ".mysqli_error($conn));


	$result=mysqli_query($conn,"create table {$testname}(
	id INTEGER ,
	question TEXT,
	option1 TEXT,
	option2 TEXT,
	option3 TEXT,
	option4 TEXT,
	answer VARCHAR(1)
	); ")or die("Failed to query database ".mysqli_error($conn));

	session_start();
	$_SESSION['TEST']=$testname;
	header("location:add_questions.html");
 
?>