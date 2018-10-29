<?php
	session_start();
	include './function.php';

	if(check_admin($_SESSION['id']) === FALSE)
	{
		header("Location: ./index.php?error");
		exit;
	}
	$password = passwordify($login, $_POST['user_password']);
	$name = htmlspecialchars($_POST['user_name'], ENT_QUOTES);
	$type = intval($_POST['user_type']);
	$id = intval($_POST['user_id']);
	$conn = mysqli_connect("localhost", "root", "rush00", "rush");

	$sql = "UPDATE `rush`.`client` SET `name`= '".	$name."', `type`= '".$type."', `pass`= '".$password."' WHERE `id` = '".$id."'";
	$res = mysqli_query($conn, $sql);

	if ($res === false)
		header("Location: ../connect.php?error=changepass");
	mysqli_close($conn);
	header("Location: ../admin.php");
?>
