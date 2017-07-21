<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<nav>
			<a href="index.php">Home</a>
		</nav>
<?php
if (isset($_SESSION['u_id'])) {
    echo '
		<form class="login" action="logout.inc.php" method="POST">
		<input id="loginbutton" type="submit" name="submit" value="LogOut">
		</form>	
    ';
    echo '<span id="greeting">Hello ' . $_SESSION['u_first'] . "!</span>";
} else {
	echo '
		<a id="signup" href="signup.php">SignUp</a>
		<form class="login" action="login.inc.php" method="POST">
			<input type="text" name="u_id" placeholder="Username or email">
			<input type="password" name="u_pwd" placeholder="Password">
			<input id="loginbutton" type="submit" name="submit" value="LogIn">
		</form>
	';
}

?>
	</header>