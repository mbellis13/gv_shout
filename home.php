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

$query = "SELECT followed, text, date FROM post INNER JOIN follow ON post.username=follow.followed WHERE follow.follower='{$_SESSION['username']}' AND accepted='1' AND approved='1' ORDER By date DESC;";



//echo $query;

if($result = mysqli_query($conn, $query))
{
	//echo mysqli_fetch_row($result)[0];
	if(mysqli_num_rows($result)>0)
	{
//		echo "found stuff";
	}
	else
	{
//		echo "no results";
	}
}
//echo "here";
?>

<!DOCTYPE HTML>
<HTML>
<head>
	<meta charset="utf-8">
	<title>GV Shouts!</title>
	<link rel="stylesheet" href="shout_style.css">
</head>
	

<div class="navbar">
	<a href="home.php" class="active">Home</a>
	<a href="myShouts.php">My Shouts</a>
	<a href="follow.php">Followers</a>
	<a href="logout.php">Logout</a>
</div>

<div class="sidebar">
	<form action = "shout.php" method = "post">
		<h2 style="color:white;">Shout Out!!</h2>
	
		<textarea id="shout_area" name="shout_area" style="padding-left:15px;" rows="3" cols="50" placeholder="what do you have to say?"></textarea>
		<button type="submit">SHOUT</button>
	</form>
	<form action = "request_follow.php" method = "post">
		<h2 style="color:white;">Request Follow:</h2>
	
		<input id="followed" name="followed" style="padding-left:15px; width:300px;" placeholder="Who do you want to hear? Enter Username">
		<button type="submit">REQUEST</button>
	</form>
</div>

<body>


	<table class="shoutouts">
		<th colspan='3'>SHOUTOUTS!</th>
		<?php 
		while($row = $result->fetch_array())
		{
			echo "<tr><td>".$row['followed']."</td><td>".$row['text']."</td><td>".$row['date']."</td></tr>";
		}
		?>
	
	</table>
</body>

</HTML>
