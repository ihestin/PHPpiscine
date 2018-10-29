<?php
include './lib/function.php';

$conn = mysqli_connect("localhost", "root", "rush00");
$adm_pass = passwordify("admin", "admin");

$sql = array(
	"DROP DATABASE IF EXISTS rush",
	"CREATE DATABASE rush"
);

echo "<table style='width: 100%;' border='1px' cellspacing='0'>";
foreach ($sql as $key)
{
	if (mysqli_query($conn, $key) === TRUE)
		echo "<tr><td><code>$key</code></td><td><b style='color: #27ae60; text-align: center;'>SUCCESS</b></td></tr>";
	else
		echo "<tr><td><code>$key</code></td><td><b style='color: #c0392b; text-align: center;'>ERROR</b></td></tr>";
}
//$conn->close();


/* ************************************************************************** */
/*                         INITIALISATION DE LA DB RUSH                       */
/* ************************************************************************** */
mysqli_select_db($conn, 'rush');

$sql = array(
	"CREATE TABLE `rush`.`client` ( `id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `pass` TEXT NOT NULL , `type` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;",
	"CREATE TABLE `category` (  `id` int(11) NOT NULL  AUTO_INCREMENT,  `cat_name` text NOT NULL , `whereclause` text NOT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB;",
	"CREATE TABLE `rush`.`user_panier` ( `id` int(11) NOT NULL AUTO_INCREMENT, `basket_send` BOOLEAN NOT NULL, `date_send` DATETIME, `user_id` int(11) NOT NULL, `product_id` int(11) NOT NULL,  `chosen_color` text NOT NULL , `quantitee` INT NOT NULL	, PRIMARY KEY (`id`)) ENGINE=InnoDB;",
	"CREATE TABLE `rush`.`articles` ( `id` INT NOT NULL AUTO_INCREMENT , `last_change` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `name` TEXT NOT NULL , `description` TEXT NOT NULL , `price` INT NOT NULL , `stock` INT NOT NULL , `marque` TEXT NOT NULL , `colors` MEDIUMTEXT NOT NULL , `img` TEXT NOT NULL  , PRIMARY KEY (`id`)) ENGINE = InnoDB;",
	"INSERT INTO `rush`.`client` (`id`, `name`, `pass`, `type`) VALUES (NULL, 'admin', '$adm_pass', '1')",
	"INSERT INTO `category` (`id`, `cat_name`,`whereclause`) VALUES (NULL, 'marque apple', '`marque`=''apple'''), (NULL, 'marque samsung','`marque`=''samsumg'''), (NULL, ' toutes marques','1=1'),(NULL, 'haut de game','`price` >= 250'),(NULL, ' game moyenne','`price` >= 150')",
	"INSERT INTO `rush`.`articles`(`id`, `last_change`, `name`, `description`, `price`, `stock`, `marque`, `colors`, `img`) VALUES (NULL, CURRENT_TIMESTAMP, 'Iphone 5c', 'Vivez l''expérience Apple avec toute l''intuitivité offerte par iOS et la puce A6 extrêmement économique en énergie. L''appareil photo iSight 8 mégapixels immortalise vos plus beaux moments en photo et vidéo, tandis que son design unique offre légèreté et robustesse.', '220', '20', 'apple', '[\"noir\",\"blanc\",\"gris\",\"rose\"]', 'apple_iphone_5c_front.jpg')",
	"INSERT INTO `rush`.`articles`(`id`, `last_change`, `name`, `description`, `price`, `stock`, `marque`, `colors`, `img`) VALUES (NULL, CURRENT_TIMESTAMP, 'Iphone 5s', 'Une puce avec architecture 64 bits, un capteur d''identité par empreinte digitale, un appareil photo amélioré et plus rapide, un système conçu spécifiquement pour le 64 bits voici les principales nouveautés de l''iPhone 5s.', '330', '20', 'apple', '[\"noir\",\"blanc\",\"gris\",\"rose\"]', 'apple_iphone_5s.jpg')",
	"INSERT INTO `rush`.`articles`(`id`, `last_change`, `name`, `description`, `price`, `stock`, `marque`, `colors`, `img`) VALUES (NULL, CURRENT_TIMESTAMP, 'Iphone 6', 'Plus grand, plus large, plus fin et plus puissant, voilà comment définir l''Apple iPhone 6. Chaque détail, chaque aspect matériel a été méticuleusement pensé et optimisé pour vous offrir le smartphone parfait.', '215', '20', 'apple', '[\"noir\",\"blanc\",\"gris\",\"rose\"]', 'apple_iphone_6.jpg')",
	"INSERT INTO `rush`.`articles`(`id`, `last_change`, `name`, `description`, `price`, `stock`, `marque`, `colors`, `img`) VALUES (NULL, CURRENT_TIMESTAMP, 'Iphone 6s', 'La barre était déjà très haute, mais l''Apple iPhone 6s a surpassé les qualités qui ont fait le succès de la précédente génération. Fabriqué en aluminium 7000 Series, l''alliage le plus solide jamais utilisé pour un iPhone, il présente un écran Retina HD de 4.7&#147; taillé dans le verre le plus solide.', '280', '20', 'apple', '[\"noir\",\"blanc\",\"gris\",\"rose\"]', 'apple_iphone_6s.jpg')",
	"INSERT INTO `articles` (`id`, `last_change`, `name`, `description`, `price`, `stock`, `marque`, `colors`, `img`) VALUES (NULL, CURRENT_TIMESTAMP, 'GALAXY A5', 'Accessible au plus grand nombre, le Samsung Galaxy A5 2016 adopte un design sobre et élégant fait de verre et de métal. Grâce à ses finitions travaillées, sa finesse et son verre Gorilla Glass 4, le Galaxy A5 est un smartphone moderne et soigné.', '150', '20', 'samsumg', '[\"noir\",\"blanc\"]', 'a5.jpeg');",
	"INSERT INTO `articles` (`id`, `last_change`, `name`, `description`, `price`, `stock`, `marque`, `colors`, `img`) VALUES (NULL, CURRENT_TIMESTAMP, 'GALAXY XCover', 'Samsung Galaxy Xcover 4, un smartphone puissant, endurant et ultra résistant.
Samsung Galaxy Xcover 4, il ne vous laissera pas tomber.', '30', '20', 'samsumg', '[\"noir\",\"blanc\"]', 'galaxy.jpeg');",
	"INSERT INTO `articles` (`id`, `last_change`, `name`, `description`, `price`, `stock`, `marque`, `colors`, `img`) VALUES (NULL, CURRENT_TIMESTAMP, 'GALAXY S8', 'Si l''élégance est une chose, la robustesse en est une autre. Pour ne plus avoir peur d''utiliser son téléphone sous la pluie, le Samsung Galaxy S8 est entièrement étanche, et résiste à la poussière ! Qu''il s''agisse de l''utiliser sous la pluie, en extérieur ou à la plage, il ne craint pas les éléments ! Eau, sable, terre ou encore poussière lui sont indifférents, et permettent de ne se poser aucune question quant à l''utilisation du Galaxy S8.', '849', '20', 'samsumg', '[\"noir\",\"blanc\"]', 's8.jpeg');",
);

foreach ($sql as $key)
{
	if (mysqli_query($conn, $key) === TRUE)
		echo "<tr><td><code>$key</code></td><td><b style='color: #27ae60; text-align: center;'>SUCCESS</b></td></tr>";
	else
		echo "<tr><td><code>$key</code></td><td><b style='color: #c0392b; text-align: center;'>ERROR</b></td></tr>";
}
echo "</table>";
mysqli_close($conn);
?>
