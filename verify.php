<?php

$servername = "localhost";
$username = "gvcs";
$password = "1234";
$database_name = "gvcs_app";
//create connection
$conn = mysqli_connect($servername, $username, $password,$database_name);


$query = "UPDATE user SET verified='1' WHERE email='{$_GET['email']}' AND verification_pin=UNHEX(SHA1('{$_GET['ver']}'))";


echo $query;


if($result = mysqli_query($conn,$query))
{


        header("Location: index.php?msg=created");
        exit();
}
else
{

        header("Location: index.php?msg=notCreated");
	exit();
}





?>
