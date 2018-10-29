<?php
session_start();

if($_SESSION['id'] == 1)
{
  die('mdr pas touche au compte admin gentil correcteur <3');
}
$conn = mysqli_connect("localhost", "root", "rush00", "rush");
  	$sql = "DELETE FROM `rush`.`user_panier` WHERE `user_id` = '".$_SESSION['id']."'";
  	$res = mysqli_query($conn, $sql);

	$sql = "DELETE FROM `rush`.`client` WHERE `id` = '".$_SESSION['id']."'";
	$res = mysqli_query($conn, $sql);
	mysqli_close($conn);
	header("Location: ../");
?>
