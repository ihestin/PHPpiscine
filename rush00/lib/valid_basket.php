<?php
	session_start();
	include './function.php';

	$conn = mysqli_connect("localhost", "root", "rush00");
	// $name = htmlspecialchars($_GET['basket'], ENT_QUOTES);
	// $sql = "INSERT INTO `rush`.`basket` (`id`, `cat_name`) VALUES (NULL, '$name')";
	// $res = mysqli_query($conn, $sql);
	$conn = mysqli_connect("localhost", "root", "rush00", "rush");
	$sql = "UPDATE `rush`.`user_panier` SET `basket_send`= 1, `date_send`= CURRENT_TIMESTAMP() WHERE `user_id` = '".intval($_SESSION['id'])."' and `basket_send`= 0";
    $res = mysqli_query($conn, $sql);
    reconstruct_panier($_SESSION["id"]);
	if ($res === false)
		header("Location: ./index.php?error");
	mysqli_close($conn);
	header("Location: ../basket.php");
?>
