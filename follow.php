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
//else
//	echo "not set";
$servername = "localhost";
$username = "gvcs";
$password = "1234";
$database_name = "gvcs_app";

$conn = mysqli_connect($servername, $username, $password, $database_name);

//if($conn)
//	echo "connection successful";

$acceptquery = "SELECT follower FROM follow WHERE followed='{$_SESSION['username']}' AND accepted=0;";


$acceptresult = mysqli_query($conn, $acceptquery);


//my pending

$pendingquery = "SELECT followed FROM follow WHERE follower='{$_SESSION['username']}' AND accepted=0;";


$pendingresult = mysqli_query($conn, $pendingquery);



//find following
	
$followingquery = "SELECT followed FROM follow WHERE follower='{$_SESSION['username']}' AND accepted=1;";



//echo $query;

$followingresult = mysqli_query($conn, $followingquery);

 
//find followers
	
$followersquery = "SELECT follower FROM follow WHERE followed='{$_SESSION['username']}' AND accepted=1;";



//echo $query;

$followersresult = mysqli_query($conn, $followersquery);

?>

<!DOCTYPE HTML>
<HTML>
<head>
	<meta charset="utf-8">
	<title>GV Shouts!</title>
	<link rel="stylesheet" href="shout_style.css">
</head>
	

<div class="navbar">
	<a href="home.php">Home</a>
	<a href="myShouts.php">My Shouts</a>
	<a href="follow.php" class="active">Followers</a>
	<a href="logout.php">Logout</a>
</div>

<div class="sidebar">
	<form action = "shout.php" method = "post">
		<h2 style="color:white;">Shout Out!!</h2>
	
		<textarea id="shout_area" name="shout_area" style="padding-left:15px;" rows="3" cols="50" placeholder="what do you have to say?" maxlength="140"></textarea>
		<button type="submit" id="shout_btn">SHOUT</button>
	</form>
	
	
	<form action = "request_follow.php" method = "post">
		<h2 style="color:white;">Request Follow:</h2>
	
		<input id="followed" name="followed" style="padding-left:15px; width:300px;" placeholder="Who do you want to hear? Enter Username">
		<button type="submit">REQUEST</button>
	</form>


</div>

<body>


	<table class="follows">
		<tr><th colspan='3'>Accept Follow Requests</th></tr>
		<?php 
		while($row = $acceptresult->fetch_array())
		{
			echo "<tr><td>".$row['follower']."</td><td><form action=accept_follow.php method='post'><input type='hidden' name='follower' value='{$row['follower']}'><button type='submit'>Accept</button></form></td><td><form action=decline_follow.php method='post'><input type='hidden' name='follower' value='{$row['follower']}'><button type='submit'>Decline</button></form></td></tr>";
		}
		?>
	
	</table>
	<table class="follows">
		<tr><th colspan='2'>My Pending Requests</th></tr>
		<?php 
		while($row = $pendingresult->fetch_array())
		{
			echo "<tr><td>".$row['followed']."</td><td><form action=remove_follow.php method='post'><input type='hidden' name='followed' value='{$row['followed']}'><button type='submit'>Remove</button></form></td></tr>";
		}
		?>
	
	</table>
	<table class="follows">
		<tr><th colspan='2'>Currently Following</th></tr>
		<?php 
		while($row = $followingresult->fetch_array())
		{
			echo "<tr><td>".$row['followed']."</td><td><form action=remove_follow.php method='post'><input type='hidden' name='followed' value='{$row['followed']}'><button type='submit'>Remove</button></form></td></tr>";
		}
		?>
	
	</table>
	<table class="follows">
		<tr><th colspan='2'>My Followers</th></tr>
		<?php 
		while($row = $followersresult->fetch_array())
		{
			echo "<tr><td>".$row['follower']."</td><td><form action=remove_follow.php method='post'><input type='hidden' name='followed' value='{$row['followed']}'><button type='submit'>Remove</button></form></td></tr>";
		}
		?>
	
	</table>
</body>

	<script>
	// Get the input field
	var input = document.getElementById("shout_area");

		// Execute a function when the user presses a key on the keyboard
		input.addEventListener("keypress", function(event) {
  		// If the user presses the "Enter" key on the keyboard
  		if (event.key === "Enter") {
    			// Cancel the default action, if needed
    			event.preventDefault();
    			// Trigger the button element with a click
    			document.getElementById("shout_btn").click();
  		}
	}); 
	</script>
</HTML>
