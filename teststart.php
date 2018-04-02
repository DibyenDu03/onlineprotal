
<html>
<center>
<br>
<br>
<br>
<fieldset style="height:300; width:400;" >;
<legend>Choose the correct answer</legend> 

<?php
	

	
	echo "<center>";

	session_start();
	$college=$_SESSION['school'];
	$s=$_SESSION['var'];

	if($s==1)
	{
		$testname=$_POST['testname'];
		$testname=stripcslashes($testname);
	}
	else
	{
		$testname=$_SESSION['paper'];
	}

	$_SESSION['paper']=$testname;
	$conn=mysqli_connect("localhost:4000","root","","{$college}");
	$testname = mysqli_real_escape_string($conn,$testname);

	$result=mysqli_query($conn," select count(distinct id) from {$testname} ")or die("Failed to query database ".mysqli_error($conn));
	//echo $result;
	$no=mysqli_fetch_array($result,MYSQLI_NUM);
	
	
	
if($no[0]!= 0)
{
	$i=$s%$no[0];
	if($i==0)
		$i=$no[0];
	$_SESSION['var']=$s;
	echo " <form action="."change.php"." method="."POST".">";
	$result=mysqli_query($conn,"select * from {$testname} 	where id={$i} ")or die("Failed to query database 	".mysqli_error($conn));
	$row=mysqli_fetch_array($result,MYSQLI_NUM);
	echo "<p>".$row[1]."</p><br><br>";
	echo "<p> A. ".$row[2]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."        B. ".$row[3]."<br><br><br>"." C. ".$row[4]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." D. ".$row[5]." </p><br><br><br> ";
	echo "<button style="."width:190;"." type="."submit".">NEXT</button>";
}
else
{
	echo " NO QUESTION IS STILL UPDATED "; 
}

?>
<br>
<br>
</fieldset>
</center>
</html>