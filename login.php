<?php>
	session_start();
	$username="user";
	$password="password";
	if(isset=($_SESSION['logged_in'])&& $_SESSION['logged_in']==true){
	header("location : success.php");
}
if(isset($_POST['username'])&& isset($_POST['password'])){
	if($_POST['username']==$username && $_POST['password']==$password)
	$_SESSION[logged_in']=true;
	header("location : success.php");
}
<html>
	
	<center>
		<form method="post" action="index.php">
		Username :<input type="text" name="fname"><br/>
		</form>
		Password :<input type="password" name="fname"><br/>
		<input type="submit" value="login!">
		</form>
	</center>
	
</html>