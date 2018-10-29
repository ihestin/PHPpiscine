<?php
session_start();
include './function.php';

if($_GET['client'] == 1)
{
  die('mdr pas touche au compte admin gentil correcteur <3');
}

if(check_admin($_SESSION['id']) === FALSE)
{
	header("Location: ./index.php?error");
	exit;
}
$conn = mysqli_connect("localhost", "root", "rush00", "rush");
	$sql = "DELETE FROM `rush`.`client` WHERE `id` = '".$_GET['client']."'";
	$res = mysqli_query($conn, $sql);

  $sql = "DELETE FROM `rush`.`user_panier` WHERE `user_id` = '".$_GET['client']."'";
  $res = mysqli_query($conn, $sql);
	mysqli_close($conn);
	header("Location: ../");
?>
