<?php
	session_start();
	include './function.php';

	if(check_admin($_SESSION['id']) === FALSE)
	{
		header("Location: ./index.php?error");
		exit;
	}
	$id = intval($_POST['categorie_id']);
	$name = htmlspecialchars($_POST['categorie_name'], ENT_QUOTES);
	$whereclause = htmlspecialchars_decode($_POST['whereclause_name'], ENT_QUOTES);

	$conn = mysqli_connect("localhost", "root", "rush00", "rush");

	$sql = "UPDATE `rush`.`category` SET `cat_name`= '".$name."', `whereclause`= '".$whereclause."' WHERE `id` = '".$id."'";
	$res = mysqli_query($conn, $sql);

	if ($res === false)
		header("Location: ../connect.php?error=changepass");
	mysqli_close($conn);
	header("Location: ../admin.php");
?>
