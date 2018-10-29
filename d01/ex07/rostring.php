#!/usr/bin/php
<?PHP

if ($argc >= 2)
{
	$array = explode(" ",eregi_replace("[ ]+"," ",trim($argv[1])), 2);
	echo $array[1]." ".$array[0]."\n";
}

?>
