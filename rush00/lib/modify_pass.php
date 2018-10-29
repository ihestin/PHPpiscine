<?php
	session_start();
	include './function.php';
	if (!isset($_POST['password']) || !isset($_POST['secpassword']) || !isset($_POST['oldpassword']) || $_POST['password'] != $_POST['secpassword'])
		header("Location: ./connect.php?error=connect");
	$password = passwordify($login, $_POST['password']);
	$oldpassword = passwordify($login, $_POST['oldpassword']);
	$conn = mysqli_connect("localhost", "root", "rush00", "rush");

	$sql = "UPDATE `rush`.`client` SET `pass`= '".$password."' WHERE `pass` = '".$oldpassword."'";
	$res = mysqli_query($conn, $sql);

	if ($res === false)
		header("Location: ../connect.php?error=changepass");
	$_SESSION['password'] = $oldpassword;
	mysqli_close($conn);
	header("Location: ../");
?>
