<?php
	session_start();
	include './function.php';
	if (!isset($_POST['product_id']) || !isset($_POST['chosen_color']))
		header("Location: ./?error=not_added");
  $id = intval($_POST['product_id']);
  $color = htmlspecialchars($_POST['chosen_color'], ENT_QUOTES);
	$conn = mysqli_connect("localhost", "root", "rush00", "rush");
  $qtty = intval($_POST['qtty']);
  $nbpannier = count($_SESSION['panier']);

  if($nbpannier == 0)
  {
    $_SESSION['panier'] = array();
  }

  if(checkConnect() === FALSE)
  {
    $_SESSION['panier'][$nbpannier]["product_id"] = $id;
    $_SESSION['panier'][$nbpannier]["color"] = $color;
    $_SESSION['panier'][$nbpannier]["qtty"] = $qtty;
  	header("Location: ../");
  }
  else
  {
  	$sql = "INSERT INTO `rush`.`user_panier`(`id`, `basket_send`, `date_send`, `user_id`, `product_id`, `chosen_color`, `quantitee`) VALUES (NULL, '0', NULL,'".intval($_SESSION['id'])."','".intval($id)."','".htmlspecialchars($color, ENT_QUOTES)."', '".intval($qtty)."')";

  	$res = mysqli_query($conn, $sql);
    // $_SESSION['panier'][$nbpannier]["product_id"] = $id;
    // $_SESSION['panier'][$nbpannier]["color"] = $color;
    // $_SESSION['panier'][$nbpannier]["qtty"] = $qtty;
    // $_SESSION['panier'][$nbpannier]["panier_insert_id"] = mysqli_insert_id($conn);
  	mysqli_close($conn);
  	header("Location: ../");
  }
?>
