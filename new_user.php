<?php
/*
session_start();
//echo "home.php";

if(!isset($_SESSION['username']))
{
        header("location: index.php");
        exit();
        //echo "set";
        //echo "{$_SESSION['username']}";
}
 */

$servername = "localhost";
$username = "gvcs";
$password = "1234";
$database_name = "gvcs_app";
//create connection
$conn = mysqli_connect($servername, $username, $password,$database_name);

if($conn)
	echo 'connection successful';

if($_POST['new_password'] != $_POST['confirm_password'])
{
	header("Location: index.php?msg=pwMatch");
	exit();
	
}


$query = "INSERT INTO user (username, email, password, admin) VALUES ('{$_POST['new_username']}', '{$_POST['email']}', UNHEX(SHA1('{$_POST['new_password']}')), '0');";


if($result = mysqli_query($conn,$query))
{
	echo 'query successful';
	
	header("Location: index.php?msg=created");
	exit();
}
else
{
	echo 'query unsuccessful';
	echo $_POST['email'];
	echo $_POST['new_username'];

	header("Location: index.php?msg=notCreated");
}
//exit();
?>
