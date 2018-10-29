<?php
	session_start();
	include './function.php';

	if(check_admin($_SESSION['id']) === FALSE)
	{
		header("Location: ./index.php?error");
		exit;
	}
	$conn = mysqli_connect("localhost", "root", "rush00");
	$name = htmlspecialchars($_GET['categorie'], ENT_QUOTES);
	$whereclause = htmlspecialchars_decode($_GET['whereclause'], ENT_QUOTES);
	
	$sql = "INSERT INTO `rush`.`category` (`id`, `cat_name`, `whereclause`) VALUES (NULL, '$name', '$whereclause')";
	$res = mysqli_query($conn, $sql);
	if ($res === false)
		header("Location: ../index.php?error");
	mysqli_close($conn);
	header("Location: ../admin.php?categorieajouter");
?>
