<?php
if(session_status() == PHP_SESSION_NONE || !isset($_SESSION['username']))
{
	header('location: index.php');
	exit();
}
?>
