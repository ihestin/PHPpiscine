<?php
	session_start();
	include './function.php';

	if(check_admin($_SESSION['id']) === FALSE)
	{
		header("Location: ./index.php?error");
		exit;
	}
	$id = intval($_POST['art_id']);
	$name = htmlspecialchars($_POST['art_name'], ENT_QUOTES);
	$desc = htmlspecialchars($_POST['art_desc'], ENT_QUOTES);
	$price = intval($_POST['art_price']);
	$stk = intval($_POST['art_stk']);
	$img = htmlspecialchars($_POST['art_img'], ENT_QUOTES);
	$marque = htmlspecialchars($_POST['art_marque']);

	$conn = mysqli_connect("localhost", "root", "rush00", "rush");

	$sql = "UPDATE `rush`.`articles` SET `name`= '".	$name."', `description`= '".$desc."', `price`= '".$price."', `stock`= '".$stk."', `img`= '".$img."', `marque`= '".	$marque."', `last_change`= CURRENT_TIMESTAMP() WHERE `id` = '".$id."'";
	$res = mysqli_query($conn, $sql);

	if ($res === false)
		header("Location: ../connect.php?error=changepass");
	mysqli_close($conn);
	header("Location: ../admin.php");
?>
