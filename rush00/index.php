<?php
	session_start();

	include './lib/function.php';
	checkConnect();
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
				<a href="./"><li id="home">Accueil</li></a>
				<div class="menucat">
					<ul class="niveau1 ">
	     			 	<li class="menu01">Categorie
	     			 		<ul class="niveau2">
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
						echo '<a href="basket.php"><li class="menu"><p><i class="fa fa-shopping-basket"></i> Mon panier</p></li></a>';
						echo '<a href="account.php"><li class="menu"><p><i class="fa fa-user"></i> Mon Compte</p></li></a>';
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
				<i class="fa fa-circle" style="position: relative; bottom: 4px;"></i> <u style="font-size: 32px;">Derniers articles:<u>
				<div align="center">
					<ul class="presentation">
					<?php
					$conn_sql = mysqli_connect("localhost", "root", "rush00", "rush");
					$get_articles = 'SELECT * FROM `rush`.`articles` ORDER BY `last_change` DESC LIMIT 6';

					$res_articles = mysqli_query($conn_sql, $get_articles);
					if (mysqli_num_rows($res_articles) > 0)
					{
						while (($line = mysqli_fetch_assoc($res_articles)))
						{
							echo <<<EOD
							<li>
								<a href="consult.php?id={$line['id']}">
									<img src="./res/article/{$line['img']}"/><br>
									<span>{$line['name']}</span>
								</a>
							</li>
EOD;
						}
					}
					mysqli_close($conn_sql);
					?>
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
<!-- git je te déteste -->
