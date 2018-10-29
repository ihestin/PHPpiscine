<?php
$act = $_GET['action'];
$nam = $_GET['name'];
$val = $_GET['value'];

if ($act && $nam)
{
switch($act)
 	{
 	case('set'):
 	   if ($val !== NULL)
 		  setcookie($nam,$val);
 		break;
 	case('get'):
 		echo $_COOKIE[$nam]."\n";
 		break;
 	case('del'):
 		setcookie($nam,NULL,-1);
 		break;
 	}
 }

?>