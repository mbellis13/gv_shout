<!DOCTYPE HTML>
<HTML>
<form action = "login.php" method = "post">
	<div id = "form" style = "width:350px;margin-left:auto;margin-right:auto;">
		<fieldset>
			<legend style="color:blue;font-weight:bold;">GV Computer Science Login</legend>
			<table>
				<?php  if ($_GET['msg'] == 'failed') echo "<tr><p style='color: red; font-weight: bold'>Incorrect username or password</p></tr>
"; ?>				<tr>
					<td><span  style="text-decoration:undersine">U</span>sername</td>
					<td><input name="username" placeholder="enter username" type="text"/></td>
				</tr>
				<tr>
					<td><span style="text-decoration:underline">P</span>assword</td>
					<td><input name="password" placeholder="enter password" type="password"/></td>
				</tr>
				<tr><td><button type="submit">Login</button></td></tr>
			</table>
		</fieldset>
	</div>
</form>


<form action = "new_user.php" method = "post">
	<div id = "form" style = "width:350px;;margin-left:auto;margin-right:auto;">
		<fieldset>
			<legend style="color:blue;font-weight:bold;">Create New Account</legend>
			<table>
				<tr>
					<td><span  style="text-decoration:underline">E</span>mail Address</td>
					<td><input name="email" placeholder="enter email" type="text"/></td>
				</tr>
				<tr>
					<td><span  style="text-decoration:underline">U</span>sername</td>
					<td><input name="new_username" placeholder="enter username" type="text"/></td>
				</tr>
				<tr>
					<td><span style="text-decoration:underline">P</span>assword</td>
					<td><input name="new_password" placeholder="enter password" type="password"/></td>
				</tr>
				<tr>
					<td><span style="text-decoration:underline">C</span>onfirm Password</td>
					<td><input name="confirm_password" placeholder="confirm password" type="password"/></td>
				</tr>
				<tr><td><button type="submit">Create Account</button></td></tr>
			</table>
		</fieldset>
	</div>
</form>
</HTML>
