<?php
	$username=$_POST['username'];
	$password=$_POST['password'];
	$type=$_POST['type'];
	$college=$_POST['college'];

	$username = stripcslashes($username);
	$password=stripcslashes($password);
	$type = stripcslashes($type);
	$college = stripcslashes($college);
	
	$conn=mysqli_connect("localhost:4000","root","","exam");

	$username = mysqli_real_escape_string($conn,$username);
	$password=mysqli_real_escape_string($conn,$password);
	$type = mysqli_real_escape_string($conn,$type);
	$college = mysqli_real_escape_string($conn,$college);

	
	
$result=mysqli_query($conn,"SELECT count(distinct id) from users")or
die("FAILED TO QUERY DATABASE");
$row=mysqli_fetch_array($result,MYSQLI_NUM);
$id=$row[0]+1;
mysqli_query($conn,"INSERT INTO users values($id,'{$username}','{$password}','{$type}','{$college}')")or die("Failed to query database ".mysqli_error($conn));
header("location:admin.html");
	
?>