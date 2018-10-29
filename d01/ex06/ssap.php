#!/usr/bin/php
<?PHP

unset($argv[0]);

$str = "";
foreach($argv as $ar)
	$str = $str." ".$ar;
$array = array_filter(explode(' ',$str));
sort($array);
foreach($array as $ar)
	echo $ar."\n";
?>
