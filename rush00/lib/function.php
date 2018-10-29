<?php

function passwordify($usr, $pass)
{
	$key = "IciAussiOnAimeLesPoneys";
	return (hash("whirlpool", $user.$key.$pass));
}

function checkConnect()
{
	if (!isset($_SESSION['login']) || !isset($_SESSION['password']) || !isset($_SESSION['id']))
		return(FALSE);
	$login = htmlspecialchars($_SESSION['login'], ENT_QUOTES);
	$password = htmlspecialchars($_SESSION['password'], ENT_QUOTES);//Add for security
	$conn = mysqli_connect("localhost", "root", "rush00", "rush");

	$sql = "SELECT * FROM `rush`.`client` WHERE `name` = '$login' AND `pass` = '$password'";

	$res = mysqli_query($conn, $sql);
	if ($res === false)
	{
		return(FALSE);
	}
	$line = mysqli_fetch_assoc($res);
	$_SESSION['login'] = $line['name'];
	$_SESSION['password'] = $line['pass'];
	$_SESSION['id'] = $line['id'];
	mysqli_close($conn);
	return(TRUE);
}

function getUserType()
{
	if (!isset($_SESSION['login']) || !isset($_SEESSION['password']) || !isset($_SESSION['id']))
		return -1;
	$login = htmlspecialchars($_SESSION['login'], ENT_QUOTES);
	$password = htmlspecialchars($_SESSION['password'], ENT_QUOTES);//Add for security
	$conn = mysqli_connect("localhost", "root", "rush00", "rush");

	$sql = "SELECT * FROM `rush`.`client` WHERE `name` = '$login' AND `pass` = '$password'";

	$res = mysqli_query($conn, $sql);
	if ($res === false)
		header("Location: ./connect.php?error=connect");
	$line = mysqli_fetch_assoc($res);
	$i = $line['type'];
	mysqli_close($conn);
	return ($i);
}

function reconstruct_panier($userid)
{
	$conn = mysqli_connect("localhost", "root", "rush00", "rush");
	$sql = "SELECT * FROM `rush`.`user_panier` WHERE `user_id` = '".$userid."'";
	$_SESSION['panier'] = array();

	$i_pannier = 0;
	$res = mysqli_query($conn, $sql);
	if (mysqli_num_rows($res) > 0)
	{
		while (($line_pannier = mysqli_fetch_assoc($res)))
		{
		  $_SESSION['panier'][$i_pannier]["product_id"] = $line_pannier['product_id'];
		  $_SESSION['panier'][$i_pannier]["color"] = $line_pannier['chosen_color'];
	    $_SESSION['panier'][$i_pannier]["qtty"] = $line_pannier['quantitee'];
		  $_SESSION['panier'][$i_pannier]["panier_insert_id"] = $line_pannier['id'];
			$i_pannier++;
		}
	}
}

function check_admin($userid)
{
	$conn = mysqli_connect("localhost", "root", "rush00");
	$sql = "SELECT * FROM `rush`.`client` WHERE `id` = '$userid' AND `type` = '1'";
	$res = mysqli_query($conn, $sql);
	if(mysqli_num_rows($res) > 0)
		return(TRUE);
	else
		return(FALSE);
}
?>
