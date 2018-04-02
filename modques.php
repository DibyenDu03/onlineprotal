<html>
	
	
	<center>
		<fieldset style="width:500;height:400;">
		<form method="post" action="mod.php">
		<br>
		<br>
		NAME OF THE QUESTIONS 
		<br>
		<br>
&nbsp;&nbsp;&nbsp;&nbsp;

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
	//echo $no[0]." ".$no[1]." ".$no[2]." ".$no[3]." ".$no[4]." ".$no[5];
	$_SESSION['id']=$no[0];
	


echo "<textarea type="."text"." name="."question"." cols="."40"." rows="."2"." id="."question".">".$no[1]."</textarea></br>";
		echo "<br>";
		echo "A :<textarea type="."text"." name="."op1"." cols="."40"." rows="."1"." id="."op1".">".$no[2]."</textarea></br>";

		echo "B :<textarea type="."text"." name="."op2"." cols="."40"." rows="."1"." id="."op2".">".$no[3]."</textarea></br>";


		echo "C :<textarea type="."text"." name="."op3"." cols="."40"." rows="."1"." id="."op3".">".$no[4]."</textarea></br>";


		echo "D :<textarea type="."text"." name="."op4"." cols="."40"." rows="."1"." id="."op4".">".$no[5]."</textarea></br>";
		
?>
		ANSWER :<select name="ans" id="ans">
			<option  value="A" >A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			</select>
		<br>
		<br>
		<button type="submit" style="width:200">MODIFY</button>
		<br>
		<br>
		</form>
				
		</fieldset>
	</center>
</html>