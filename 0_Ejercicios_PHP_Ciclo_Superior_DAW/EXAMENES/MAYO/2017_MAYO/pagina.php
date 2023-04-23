<?php
session_start();

if (!isset($_SESSION['validado']) || !$_SESSION['validado']){
	
	header("Location: index.php"); // puede ser index.php
	exit;
}
$nombre=$_SESSION['nombre'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Maig 2017</title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
Mayo 2017
<span id="nombre"><?=$nombre?></span>
<header>
<body>
</html>