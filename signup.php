<?php
include_once 'header.php'
?>
	<section>
		<h2 id="signupheader">Sign Up</h2>
		<form id="signupform" action="signup.inc.php" method="POST">
			<input name="u_first" type="text" placeholder="Firstname">
			<input name="u_last" type="text" placeholder="Lastname">
			<input name="u_email" type="text" placeholder="Email">
			<input name="u_id" type="text" placeholder="Username">
			<input name="u_pwd" type="password" placeholder="Password">
			<input id="signupbutton" type="submit" name="submit" value="Submit">
		</form>
	</section>
<?php
include_once 'footer.php'
?>
