<?php
include_once 'dbh.inc.php';
session_start();

if (!isset($_POST['submit'])){
	header('Location: index.php');
	exit();
} else {
	$u_id = mysqli_real_escape_string($conn, $_POST['u_id']);
	$u_pwd = mysqli_real_escape_string($conn, $_POST['u_pwd']);
	if (empty($u_id) || empty($u_pwd)){
		header('Location: index.php');
		exit();
	} else {
		$sql = "select * from users where u_id='$u_id' OR u_email='$u_id';";
		$result = mysqli_query($conn, $sql);
		$checkResult = mysqli_num_rows($result);
		if ($checkResult != 1){
			header('Location: index.php');
			exit();
		} else {
			$row = mysqli_fetch_assoc($result);
			if (!password_verify($u_pwd, $row['u_pwd'])){
				header('Location: index.php');
				exit();
			} else {
				$_SESSION['u_first'] = $row['u_first'];
				$_SESSION['u_last'] = $row['u_last'];
				$_SESSION['u_email'] = $row['u_email'];
				$_SESSION['u_id'] = $row['u_id'];
				header('Location: index.php');
				exit();
			}
		}
	}
};