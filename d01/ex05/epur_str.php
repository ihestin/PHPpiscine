#!/usr/bin/php
<?PHP

if ($argc >= 2)
{
	$str = eregi_replace("[ ]+", " ", trim($argv[1]));
	echo $str."\n";
}
?>
