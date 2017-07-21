<?php
include_once 'dbh.inc.php';

if (!isset($_POST['submit'])) {
	header('Location: signup.php');
	exit();
} else {
	$u_first = mysqli_real_escape_string($conn, $_POST['u_first']);
	$u_last = mysqli_real_escape_string($conn, $_POST['u_last']);
	$u_email = mysqli_real_escape_string($conn, $_POST['u_email']);
	$u_id = mysqli_real_escape_string($conn, $_POST['u_id']);
	$u_pwd = mysqli_real_escape_string($conn, $_POST['u_pwd']);
	if (empty($u_first) || empty($u_last) || empty($u_email) || empty($u_id) || empty($u_pwd)) {
		header('Location: signup.php');
		exit();
	} else {
		if (!preg_match("/^[a-zA-z]*$/", $u_first) || !preg_match("/^[a-zA-z]*$/", $u_last)) {
			header('Location: signup.php');
			exit();
		} else {
			$sql = "select * from users where u_email='$u_email';";
			$result = mysqli_query($conn, $sql);
			$checkResult = mysqli_num_rows($result);
			if ($checkResult > 0) {
				header('Location: signup.php');
				exit();
			} else  {
				if (!filter_var($u_email, FILTER_VALIDATE_EMAIL)) {
					header('Location: signup.php');
					exit();
				} else {
					$sql = "select * from users where u_id='$u_id';";
					$result = mysqli_query($conn, $sql);
					$checkResult = mysqli_num_rows($result);
					if ($checkResult > 0) {
						header('Location: signup.php');
						exit();
					} else {
						$hashedPwd = password_hash($u_pwd, PASSWORD_DEFAULT);
						$sql = "insert into users (u_first, u_last, u_email, u_id, u_pwd) values ('$u_first','$u_last','$u_email','$u_id','$hashedPwd');";
						mysqli_query($conn, $sql);
						header('Location: index.php');
						exit();
					}
				}
			}
		}
	}
};