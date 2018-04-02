
<html>
<center>
<br>
<br>
<br>
<fieldset style="height:200; width:400;" >;
<legend>Choose the question you want to modify</legend> 
<form method="post" action="modques.php">

<?php
	

	
	echo "<center>";
	$testname=$_POST['testname'];
	session_start();
	$college=$_SESSION['school'];

	$testname=stripcslashes($testname);
	$_SESSION['paper']=$testname;
	$conn=mysqli_connect("localhost:4000","root","","{$college}");
	$testname = mysqli_real_escape_string($conn,$testname);

	$result=mysqli_query($conn," select count(distinct id) from {$testname} ")or die("Failed to query database ".mysqli_error($conn));
	//echo $result;
	$no=mysqli_fetch_array($result,MYSQLI_NUM);
	//echo $no;
if($no[0]!= 0)
{
	echo "<select name='test'>";
	for($i=1;$i<=$no[0];$i++)
	{
	$result=mysqli_query($conn,"select * from {$testname} 	where id={$i} ")or die("Failed to query database 	".mysqli_error($conn));
	$row=mysqli_fetch_array($result,MYSQLI_NUM);
	echo "<option value=".$row[0]." id='testname'>".	$row[1]."</option>";
	}
	echo"</select>";
	echo "</center> <br> <br> <br>";
	echo "<button style="."width:190;"." type="."submit".">MODIFY</button>";

}
else
{
	echo " NO QUESTION IS STILL UPDATED "; 
}

?>
</form>
<br>
<br>
</fieldset>
</center>
</html>