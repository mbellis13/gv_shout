<?php


$servername = "localhost";
$username = "gvcs";
$password = "1234";
$database_name = "gvcs_app";
//create connection
$conn = mysqli_connect($servername, $username, $password,$database_name);


$query = "SELECT `username` FROM `user` WHERE username='{$_POST['username']}' AND password=UNHEX(SHA1('{$_POST['password']}'))";


if($result = mysqli_query($conn,$query))
	echo 'query successful';
else
	echo 'query unsuccessful';

if(mysqli_num_rows($result)>0)
{
	echo "login successful";
	session_start();
	$_SESSION['username'] = $_POST['username'];
	echo "{$_POST['username']}";
	echo "{$_SESSION['username']}";
	header("Location: home.php");
	mysqli_close($conn);
	exit();	
}
else
{
	echo "login unsuccessful";
	header("Location: index.php?msg=failed");
}
?>
