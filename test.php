<?php
	session_start();
	$college=$_SESSION['school'];
?>
<html>
	<body>
	<center>
	<fieldset style="height:200; width:500;">
	<legend>REGISTER A TEST</legend>
	<center>
		<br>
		<br>
	<center>
		<form method="post" action="create_test.php">
		Test_name :<input type="text" name="test" id="test">
		<br>
		<br>
		Password :<input type="password" name="password" id="password">
		<br>
		<br>
		COLLEGE :<input type="text" name="college" value=<?php echo htmlentities($college); ?> readonly >		<br>
		<br>
		<button type="submit" style="width:190">Set Questions</button>
		</form>
	</center>
	</fieldset>
	</center>
	</body>
</html>
