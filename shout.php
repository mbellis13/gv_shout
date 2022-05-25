<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("location: index.php");
	exit();
}

$servername = "localhost";
$username = "gvcs";
$password = "1234";
$database_name = "gvcs_app";

$conn = mysqli_connect($servername, $username, $password, $database_name);

echo "here";

echo $_POST['shout_area'];

echo "still here";
$query = "INSERT INTO post (username, text, approved) VALUES ('{$_SESSION['username']}', '{$_POST['shout_area']}', '1');";

echo $query;

if($result = mysqli_query($conn, $query))
	echo "success";


header("location: home.php");
exit();
?>

