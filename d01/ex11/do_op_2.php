#!/usr/bin/php
<?PHP

if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	exit();
}
$arr = sscanf($argv[1]," %f %c %f ");
if ( isset($arr[0]) && isset($arr[1]) && isset($arr[2]) && !$arr[3])
{
	switch ($arr[1])
	{
	case ('+') :
		$res = $arr[0] + $arr[2];
		break;
 	case ('-') :
		$res = $arr[0] - $arr[2];
		break;
 	case ('*') :
		$res = $arr[0] * $arr[2];
		break;
	case ('/') :
		if ($arr[2] == 0)
		{
			echo "Divide by zero\n";
			exit();
		}
		$res = $arr[0] / $arr[2];
		break;
 	case ('%') :
		$res = $arr[0] % $arr[2];
		echo $res."\n";
		break;
	default:
		echo "Syntax Error\n";
		exit();
	}
}
else
{
		echo "Syntax Error\n";
		exit();
}
echo $res."\n";

?>
