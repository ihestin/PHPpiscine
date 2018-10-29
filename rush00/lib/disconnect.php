<?php
session_start();
$_SESSION['panier'] = array();
$_SESSION['login'] = '';
$_SESSION['password'] = '';
$_SESSION['id'] = '';
header("Location: ../");
?>
