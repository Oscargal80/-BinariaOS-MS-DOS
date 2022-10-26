<?php
$string =  
'<!DOCTYPE html>'.
'<html lang="es">'.
'<head>'.
'<link rel="stylesheet" href="css/bootstrap.css" media="screen">'.
'</head>'.
'<body>';
echo "<div class='jumbotron'\"h3 style=\"text-align:center\">";
echo $ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo "<center>$details->city;</center>"; 
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo "<center>$details->country;</center>";
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo "<center>$details->loc;</center>";
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo "<center>$details->org;</center>";
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo "<center>$details->hostname;</center>";
echo $string;
'</body>'.
'</html>';
echo $string;
?>