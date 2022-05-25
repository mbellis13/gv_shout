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

$query = "UPDATE follow SET accepted='1' WHERE follower='{$_POST['follower']}' AND followed='{$_SESSION['username']}';";


if($result = mysqli_query($conn,$query))
{
        echo 'query successful';

        header("Location: follow.php");
        exit();
}

?>
