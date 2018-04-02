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
	$conn=mysqli_connect("localhost:4000","root","","{$college}");

	$question = mysqli_real_escape_string($conn,$question);
	$option1=mysqli_real_escape_string($conn,$option1);
	$option2=mysqli_real_escape_string($conn,$option2);
	$option3=mysqli_real_escape_string($conn,$option3);
	$option4=mysqli_real_escape_string($conn,$option4);
	$ans=mysqli_real_escape_string($conn,$ans);

	$result=mysqli_query($conn,"select count(distinct id) from {$testname}  ")or die("Failed to query database ".mysqli_error($conn));
	$row=mysqli_fetch_array($result,MYSQLI_NUM);
	$id=$row[0]+1;
	mysqli_query($conn,"Insert into {$testname} values({$id},'{$question}','{$option1}','{$option2}','{$option3}','{$option4}','{$ans}'); ")or die("Failed to query database ".mysqli_error($conn));
	$table="all_question";
	$result=mysqli_query($conn,"select count(distinct id) from {$table}  ")or die("Failed to query database ".mysqli_error($conn));
	$row=mysqli_fetch_array($result,MYSQLI_NUM);
	$id=$row[0]+1;
	mysqli_query($conn,"Insert into {$table} values({$id},'{$question}','{$option1}','{$option2}','{$option3}','{$option4}','{$ans}'); ")or die("Failed to query database ".mysqli_error($conn));

header("location:add_questions.html");

	
?>