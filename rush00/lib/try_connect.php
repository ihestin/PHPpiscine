<?php
	session_start();

	include './function.php';

	if (!isset($_POST['login']) || !isset($_POST['password']))
		header("Location: ./connect.php?error=connect");

	$login = htmlspecialchars($_POST['login'], ENT_QUOTES);
	$password = passwordify($login, $_POST['password']);
	$conn = mysqli_connect("localhost", "root", "rush00", 'rush');

	$sql = "SELECT * FROM `rush`.`client` WHERE `name` = '$login' AND `pass` = '$password'";

	$res = mysqli_query($conn, $sql);
	if ($res === false)
		header("Location: ./connect.php?error=connect");
	$line = mysqli_fetch_assoc($res);

  $nbpannier = count($_SESSION['panier']);

  if($nbpannier > 0)
  {
		$i_pannier = 0;
    while($i_pannier < $nbpannier)
		{
		  	$sql = "INSERT INTO `rush`.`user_panier`(`id`, `basket_send`, `date_send`, `user_id`, `product_id`, `chosen_color`, `quantitee`) VALUES (NULL, '0', NULL,'".intval($line['id'])."','".intval($_SESSION['panier'][$i_pannier]["product_id"])."','".htmlspecialchars($_SESSION['panier'][$i_pannier]["color"], ENT_QUOTES)."','".intval($_SESSION['panier'][$i_pannier]["qtty"])."')";
		  	$res = mysqli_query($conn, $sql);
				$_SESSION['panier'][$i_pannier]["panier_insert_id"] = mysqli_insert_id($conn);
				$i_pannier++;
		}
  }

	//reconstruct_panier($line["id"]);

	$_SESSION['login'] = $line['name'];
	$_SESSION['password'] = $line['pass'];
	$_SESSION['id'] = $line['id'];
	mysqli_close($conn);
?>
<script>
window.location = "../";
</script>
