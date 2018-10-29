#!/usr/bin/php
<?PHP

if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	exit();
}
$nb1 = floatval(trim($argv[1]));
$nb2 = floatval(trim($argv[3]));
$ope = trim($argv[2]);

switch ($ope)
{
	case ('+') :
		$res = $nb1 + $nb2;
		break;
 	case ('-') :
		$res = $nb1 - $nb2;
		break;
 	case ('*') :
		$res = $nb1 * $nb2;
		break;
 	case ('/') :
		$res = $nb1 / $nb2;
		break;
 	case ('%') :
		$res = $nb1 % $nb2;
		break;
}
echo $res."\n";
?>
