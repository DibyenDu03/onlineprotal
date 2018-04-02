<?php
	$username=$_POST['username'];
	$password=$_POST['password'];


	$username = stripcslashes($username);
	$password=stripcslashes($password);

	
	$conn=mysqli_connect("localhost:4000","root","","exam");

	$username = mysqli_real_escape_string($conn,$username);
	$password=mysqli_real_escape_string($conn,$password);
	

$result=mysqli_query($conn,"select * from users where username='{$username}' and password='{$password}' ")or die("Failed to query database ".mysqli_error($conn));

$row=mysqli_fetch_array($result,MYSQLI_NUM);
//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

if(($row[1]== $username)&&($row[2]== $password))
{
	//echo" login success !!! welcome ".$row[3];
	if($row[3]=="student")
	echo"hello  r u ready for exam ?";
	else
		{
			session_start();
			$_SESSION['school']=$row[4];
			header("location:admin.html");
		}
 }
else
{
	echo" failed to login ";
}
	
?>