
<?php require 'connect.php'?>
<?php require 'functions.php'?>



<header> Login </header>
<form method="post" action="login.php">
	<table>
		<tr><td>Username</td> 
		<td> <input type="text" name="username" class="textinput" required>
		</tr>
		<tr><td>Password</td> 
		<td> <input type="password" name="password" class="textinput"required>
		</tr>
		<tr>
		<td> <input type="submit" name="login_btn" value="login">
		</tr>

	</table>
</form>
