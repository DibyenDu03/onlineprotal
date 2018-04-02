<?php
	$question=$_POST['question'];
	$option1=$_POST['op1'];
	$option2=$_POST['op2'];
	$option3=$_POST['op3'];
	$option4=$_POST['op4'];
	$ans=$_POST['ans'];
	$question = stripcslashes($question);
	$option1=stripcslashes($option1);
	$option2=stripcslashes($option2);
	$option3=stripcslashes($option3);
	$option4=stripcslashes($option4);
	$ans=stripcslashes($ans);
	
	session_start();
	$college=$_SESSION['school'];
	$testname=$_SESSION['TEST'];
	$no=$_SESSION['id'];
	$conn=mysqli_connect("localhost:4000","root","","{$college}");

	$question = mysqli_real_escape_string($conn,$question);
	$option1=mysqli_real_escape_string($conn,$option1);
	$option2=mysqli_real_escape_string($conn,$option2);
	$option3=mysqli_real_escape_string($conn,$option3);
	$option4=mysqli_real_escape_string($conn,$option4);
	$ans=mysqli_real_escape_string($conn,$ans);

	$result=mysqli_query($conn,"update  {$testname} set question='{$question}' where id=$no ")or die("Failed to query database (add questions) ".mysqli_error($conn));
	$result=mysqli_query($conn,"update  {$testname} set option1='{$option1}' where id=$no ")or die("Failed to query database (option1) ".mysqli_error($conn));
	$result=mysqli_query($conn,"update  {$testname} set option2='{$option2}' where id=$no ")or die("Failed to query database (option2) ".mysqli_error($conn));
	$result=mysqli_query($conn,"update  {$testname} set option3='{$option3}' where id=$no ")or die("Failed to query database (option3) ".mysqli_error($conn));
	$result=mysqli_query($conn,"update  {$testname} set option4='{$option4}' where id=$no ")or die("Failed to query database (option4) ".mysqli_error($conn));
	$result=mysqli_query($conn,"update  {$testname} set answer='{$ans}' where id=$no ")or die("Failed to query database (ans) ".mysqli_error($conn));
	header('Location:modify.php');
?>