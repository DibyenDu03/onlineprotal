<html>
<body>
<center>
<fieldset style="height:50;width:500;">
<legend>
choose the tests
</legend> 
<form method="post" action="modtest.php">
<?php
session_start();
$college=$_SESSION['school'];
$conn=mysqli_connect("localhost:4000","root","","{$college}");

$result=mysqli_query($conn,"select count(*) from questionpaper ")or die("Failed to query database ".mysqli_error($conn));
$no=mysqli_fetch_array($result,MYSQLI_NUM);
echo "<select name='testname'>";
for($i=1;$i<=$no[0];$i++)
{
$result=mysqli_query($conn,"select testname from questionpaper where id={$i}")or die("Failed to query database ".mysqli_error($conn));
$row=mysqli_fetch_array($result,MYSQL_ASSOC);
echo "<option value='".$row['testname']."'id=".$row['testname'].">".$row['testname']."</option>";
}
echo"</select>";
?>
</br>
<br>
<button type="submit" style="width:200">SELECT</button>
</form>
</center>
</body>
</html>
