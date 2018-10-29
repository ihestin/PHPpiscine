<?php
	session_start();
	include './function.php';
	if (!isset($_POST['login']) || !isset($_POST['password']) || !isset($_POST['secpassword']))
		header("Location: ./connect.php?error=connect");
	$login = htmlspecialchars($_POST['login'], ENT_QUOTES);
	$password = passwordify($login, $_POST['password']);
	$conn = mysqli_connect("localhost", "root", "rush00", "rush");

	$sql_tst = "SELECT * FROM `rush`.`client` WHERE `name` = '$login'";
	$res_tst = mysqli_query($conn, $sql_tst);
	if (mysqli_num_rows($res_tst) > 0)
	{
		header("Location: ../connect.php?error=already_used_login");
		exit();
	}

	$sql = "INSERT INTO `rush`.`client` (`id`, `name`, `pass`, `type`) VALUES (NULL, '$login', '$password', '0')";
	$res = mysqli_query($conn, $sql);

	$sql = "SELECT * FROM `rush`.`client` WHERE `name` = '$login' AND `pass` = '$password'";
	$res = mysqli_query($conn, $sql);

	if ($res === false)
	{
		header("Location: ../connect.php?error=register");
		exit();
	}
	$line = mysqli_fetch_assoc($res);
	$_SESSION['login'] = $line['name'];
	$_SESSION['password'] = $line['pass'];
	$_SESSION['id'] = $line['id'];
	mysqli_close($conn);
	header("Location: ../");
?>
