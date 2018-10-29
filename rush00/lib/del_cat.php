<?php
session_start();
include './function.php';
if(check_admin($_SESSION['id']) === FALSE)
{
	header("Location: ./index.php?error");
	exit;
}
$conn = mysqli_connect("localhost", "root", "rush00", "rush");
	$sql = "DELETE FROM `rush`.`category` WHERE `id` = '".$_GET['categorie']."'";
	$res = mysqli_query($conn, $sql);
	mysqli_close($conn);
	header("Location: ../admin.php");
?>
