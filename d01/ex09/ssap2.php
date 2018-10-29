#!/usr/bin/php
<?PHP
function comp_car($c1, $c2)
{
	if ($c1 >= 'a' && $c1 <= 'z')
		$g1 = 1;
	elseif ($c1 >= '0' && $c1 <= '9')
		$g1 = 2;
	else
		$g1 = 3;

	if ($c2 >= 'a' && $c2 <= 'z')
		$g2 = 1;
	elseif ($c2 >= '0' && $c2 <= '9')
		$g2 = 2;
	else
		$g2 = 3;
	if ($g1 != $g2)
		return ($g1 - $g2);
	return (ord($c1) - ord($c2));
}

function cmp($a,$b)
{
	$a = strtolower($a);
	$b = strtolower($b);
	if ($a == $b)
		return(0);
	$sia = strlen($a);
	$sib = strlen($b);
	$si = ($sia > $sib) ? $sib : $sia;
	$i = 0;
	while ($i < $si && $a[$i] == $b[$i])
		$i++;
	if ($i == $si)
		return ($sia - $sib);
	return (comp_car($a[$i], $b[$i])); 
}

unset($argv[0]);
$str = "";
foreach($argv as $ar)
	$str = $str." ".$ar;
$array = array_filter(explode(' ',$str));
usort($array,"cmp");
foreach($array as $ar)
	echo $ar."\n";
?>
