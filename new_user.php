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


if(strlen($_POST['new_username'])<4)
{

	header("Location: index.php?msg=userLength");
	exit();
}


if(strlen($_POST['first_name'])<1 || strlen($_POST['last_name'])<1)
{

	header("Location: index.php?msg=required");
	exit();
}



if($_POST['new_password'] != $_POST['confirm_password'])
{
	header("Location: index.php?msg=pwMatch");
	exit();
	
}



$pin = sha1(rand(1,1000000));

$query = "INSERT INTO user (username, email, password, admin, verified, verification_pin,first_name, last_name) VALUES ('{$_POST['new_username']}', '{$_POST['email']}', UNHEX(SHA1('{$_POST['new_password']}')), '0','0',UNHEX(SHA1('{$pin}')),'{$_POST['first_name']}','{$_POST['last_name']}');";


if($result = mysqli_query($conn,$query))
{

	$verify = exec("python3 verifyemail.py {$_POST['email']} {$pin}"); 
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
