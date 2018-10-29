<?php
	session_start();
	include './function.php';
	if(check_admin($_SESSION['id']) === FALSE)
	{
		header("Location: ./index.php?error");
		exit;
	}
	$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
	$description = htmlspecialchars($_POST['desc'], ENT_QUOTES);
	$img = htmlspecialchars($_POST['image'], ENT_QUOTES);
	$price = htmlspecialchars($_POST['price'], ENT_QUOTES);
	$int = htmlspecialchars($_POST['stock'], ENT_QUOTES);
	$marque = htmlspecialchars($_POST['marque'], ENT_QUOTES);
	$conn = mysqli_connect("localhost", "root", "rush00");
	$sql = "INSERT INTO `rush`.`articles` (`id`, `last_change`, `name`, `description`, `price`, `stock`, `marque`, `colors`, `img`) VALUES (NULL, NULL, '$name', '$description', '$price', '$int', '$marque', '[\"noir\",\"blanc\",\"gris\",\"rose\"]', '$img')";
	$res = mysqli_query($conn, $sql);
	if ($res === false)
		header("Location: ../index.php?error");
	mysqli_close($conn);
	header("Location: ../admin.php?articleajouter");
?>
