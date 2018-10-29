<?php
	session_start();

	include 'lib/function.php';
	if(checkConnect() === FALSE)
	{
		header("Location: /index.php");
	}
?>
<html>
	<head>
		<title>LaBoutik</title>
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
		<article style="text-align:center;">
			<h1>Mon compte</h1>
			<form action="./lib/modify_pass.php" method="post">
				<table style="border:1px solid #000; position: relative;left: 30vw; right: 30vw;">
					<tr>
						<td colspan="2" style="width: 10vw; font-size: 2vmin; border:none;">Changer son mot de passe</td>
					</tr>
					<tr>
						<td style="width: 10vw; font-size: 2vmin; border:none;">Mot de passe actuel:</td>
						<td><input id="oldpass" type="password" name="oldpassword" placeholder="mot de passe" style="width: 30vw; height: 2vh border:none;" onkeyup="check();"/></td>
					</tr>
					<tr>
						<td style="width: 10vw; font-size: 2vmin; border:none;">Mot de passe nouveau mot de passe :</td>
						<td><input id="firpass" type="password" name="password" placeholder="mot de passe" style="width: 30vw; height: 2vh border:none;" onkeyup="check();"/></td>
					</tr>
					<tr>
						<td style="width: 10vw; font-size: 2vmin; border:none;">Repetition Mot de passe:</td>
						<td><input id="secpass" type="password" name="secpassword" placeholder="mot de passe" style="width: 30vw; height: 2vh border:none;" onkeyup="check();"/></td>
					</tr>
					<tr>
						<td colspan="2">
							<button class="button" disabled="" id="send">
								<span><i class="fa fa-user-plus"></i>Changer son password</span>
							</button>
							<div id="state">
						</td>
					</tr>
				</form>
				<form action="./lib/delete.php" method="post">
						<tr>
							<td colspan="2" style="width: 10vw; font-size: 2vmin; border:none;">SUPPRIMER SON COMPTE (irreversible !)</td>
						</tr>
						<tr>
							<td colspan="2">
								<button class="button" id="send_delpass">
									<span><i class="fa fa-user-plus"></i>Supprimer son compte</span>
								</button>
							</td>
						</tr>
					</form>
				</table>
		</article>
	</section>
	<script>
	function check()
	{
		var pass1 = document.getElementById('firpass').value;
		var pass2 = document.getElementById('secpass').value;
		var send = document.getElementById('send');

		var output = document.getElementById("state");
		console.log(pass1.length);
		if (pass1 != pass2 || pass1.length == 0 || pass2.length == 0)
		{
			output.innerHTML = "Les mots de passes ne correspondent pas !";
			output.style.color = "#c0392b";
			send.setAttribute("disabled", "");
		}
		else
		{
			output.innerHTML = '<i class="fa fa-check"></i>';
			output.style.color = "#27ae60";
			send.removeAttribute("disabled");
		}
	}
	</script>
	<footer>
		<p>
		</p>
	</footer>
</html>
