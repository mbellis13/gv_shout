<?php
session_start();
//echo "home.php";

if(!isset($_SESSION['username']))
{
        header("location: index.php");
        exit();
        //echo "set";
        //echo "{$_SESSION['username']}";
}


$servername = "localhost";
$username = "gvcs";
$password = "1234";
$database_name = "gvcs_app";
//create connection
$conn = mysqli_connect($servername, $username, $password,$database_name);

$query = "DELETE FROM follow WHERE follower = '{$_POST['follower']}' AND followed = '{$_SESSION['username']}' AND accepted = 0;";

echo $query;

$result = mysqli_query($conn,$query);
        

header("Location: follow.php");
exit();


?>

