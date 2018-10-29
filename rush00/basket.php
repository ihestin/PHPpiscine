<?php
	session_start();

	include './lib/function.php';

  if(isset($_GET['del_id']))
  {
		if(checkConnect() === FALSE)
		{
		  $_SESSION['panier'][$_GET['del_id']]["product_id"] = '';
		  $_SESSION['panier'][$_GET['del_id']]["color"] = '';
	      $_SESSION['panier'][$_GET['del_id']]["qtty"] = '';
	      $_SESSION['panier'][$_GET['del_id']] = '';
		  $_SESSION["panier"] = array_values(array_filter($_SESSION["panier"]));
		}
		else
		{
      $conn = mysqli_connect("localhost", "root", "rush00", "rush");
      $sql = 'DELETE FROM `rush`.`user_panier` WHERE `id` = '.intval($_GET['del_id']);
      $res = mysqli_query($conn, $sql);
      reconstruct_panier($_SESSION["id"]);
		}
  }
?>
<html>
	<head>
		<title>Votre boutique</title>
		<link href='./css/index.css' rel='stylesheet' type='text/css' />
		<link href='./lib/css/font-awesome.min.css' rel='stylesheet' type='text/css' />
	</head>
	<header>
		<nav>
			<ul>
      <br>
				<a href="./"><li id="home">ACCUEIL</li></a>
				<div class="menucat">
				<ul class="niveau1 ">
					 <li class="menu01">Categorie<ul class="niveau2">
				<?php
				$conn_sql = mysqli_connect("localhost", "root", "rush00", "rush");
				$get_cat = 'SELECT * FROM `rush`.`category` ';

				$res_cat = mysqli_query($conn_sql, $get_cat);
				if (mysqli_num_rows($res_cat) > 0)
				{
					while (($line_cat = mysqli_fetch_assoc($res_cat)))
					{
						?>
						 <li class="categorie"><a href="category.php?id=<?=$line_cat['id'];?>"><?=$line_cat['cat_name'];?></a></li>
<?php
					}
				}
				mysqli_close($conn_sql);
				?>
							</ul>
						</li>
						</ul>
					</div>
				<?php
					if ((isset($_SESSION['login']) && !empty($_SESSION['login']) && isset($_SESSION['password']) && !empty($_SESSION['password'])))
					{
						echo '<li style="width: 30vw;"><p>Bonjour '.$_SESSION['login'].' !</p></li>';
						echo '<a href="account.php"><li class="menu"><p><i class="fa fa-user"></i> Mon Compte</p></li></a>';
						echo '<a href="basket.php"><li class="menu"><p><i class="fa fa-shopping-basket"></i> Mon panier</p></li></a>';
						if($admin = check_admin($_SESSION['id']) == TRUE)
							echo '<a href="admin.php"><li class="menu"><p><i class="fa fa-sign-in"></i> Administration</p></li></a>';
						echo '<a href="lib/disconnect.php"><li class="menu" style="width: 1vw; text-align: middle;"><p><i class="fa fa-sign-out"></i></p></li></a>';
					}
					else
					{
						echo '<a href="basket.php"><li class="menu"><p><i class="fa fa-shopping-basket"></i> Mon panier</p></li></a>';
						echo '<a href="connect.php"><li class="menu"><p><i class="fa fa-sign-in"></i> Se connecter</p></li></a>';
					}
				?>
			</ul>
		</nav>
	</header>
	<section id="main">
		<article id="pres">
			<div>
        <i class="fa fa-circle" style="position: relative; bottom: 4px;"></i> <u style="font-size: 32px;">Votre pannier<u>
        <div align="center">
          <ul class="presentation">
            <table style="width:100%">
            <tr>
              <th>Produit</th>
              <th>Prix</th>
              <th>Spécification</th>
              <th>Quantitée</th>
              <th>Action</th>
            </tr>
					<?php
          $total = 0;
          $basket_exist = 0;

          $conn = mysqli_connect("localhost", "root", "rush00", "rush");
          $sql = "SELECT * FROM `rush`.`user_panier` WHERE `user_id` = '".intval($_SESSION['id'])."' AND `basket_send` = 0";
          $baskets = mysqli_query($conn, $sql);

  		  foreach ($baskets as $basket)
  		  {
  		  	$basket_exist = 1;
  					$sql = 'SELECT * FROM `rush`.`articles` WHERE `id` = '.intval($basket['product_id']);
            $res = mysqli_query($conn, $sql);
  					$res = mysqli_fetch_assoc($res);
            ?>

            <tr>
              <td><?=$res["name"];?></td>
              <td><?=$res['price'].'€';?></td>
              <td><?=$basket["chosen_color"];?></td>
              <td><?=$basket["quantitee"];?></td>
              <td><a href="./basket.php?del_id=<?php if (isset($basket["id"]) && !empty($basket["id"])) { echo $basket["id"]; } else { echo $i_panier; }?>">Supprimer du pannier</a></td>
            </tr>

            <?php
            $total += $res['price']*$basket["quantitee"];
            $i_panier++;
           }
					?>

          <tr style="height: 20px">
          </tr>

          <tr>
            <td></td>
            <td></td>
            <td><b>Prix total</b></td>
            <td><?=$total.'€';?></td>
          </tr>

          <tr>
            <td></td>
            <td></td>
            <td></td>
            <?php
            if ((isset($_SESSION['login']) && !empty($_SESSION['login']) && isset($_SESSION['password']) && !empty($_SESSION['password']) && $basket_exist == 1))
				{
            		echo '<td><a href="./lib/valid_basket.php">Valider la commande et payer</a></td>';
            	}
            ?>
          </tr>
        </table>
	</ul>
	</div>
			</div>
		</article>
	</section>
	<footer>
		<p>
		</p>
	</footer>
</html>
