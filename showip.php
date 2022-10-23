<?php
$string =  '<!DOCTYPE html>'.
'<html lang="es">'.
'  <head>'.
'    <meta charset="utf-8" lang="es">'.
'    <meta http-equiv="content-type" content="text/html; charset=UTF-8">'.
'    <!-- Descripcion -->'.
'    <meta name="description" content="BinariaOS Desarrollo de sitios web, plantillas, CMS, landings, Asuncion, Paraguay, Desarrollo, Web, Diseño, Sitios web, website, fotografia, app, informatica, backend, frontend, HTML5, WordPress, Drupal, Prestashop, Magento, pagina web">'.
'    <meta name="keywords" content="Desarrollo, Web, Diseño, Asucnión, Paraguay">'.
'    <!-- Titulo-->'.
'    <title> Contactos BinariaOS || Desarrollo Web Asunci&oacute;n Paraguay Plantillas, CMS, landings</title>'.
'    <!-- No click -->'.
'    <script type="text/javascript">document.oncontextmenu = function show() { alert("NO ES POSIBLE ACCEDER AL MENU CONTEXTUAL POR ESTE MEDIO."); return false }</script>'.
'    <!-- Screen scaling-->'.
'    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, user-scalable=0">'.
'    <!-- Links -->'.
'    <link href="img/Logoico.png" rel="icon">'.
'    <link href="img/Logoico.png" rel="apple-touch-icon">'.
'    <link rel="stylesheet" href="css/bootstrap.css" media="screen">'.
'    <link rel="stylesheet" href="css/bootstrap-responsive.css" media="screen">'.
'    <link rel="stylesheet" href="css/bootstrap-reboot.css" media="screen">'.
'    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">'.
'    <link rel="stylesheet" href="css/bootstrap-grid.css" media="screen">'.
'  </head>'.
'  <body>';
echo "Su IP es:";
echo "<br>";
echo $ip = $_SERVER['REMOTE_ADDR'];
echo "<br>";
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo $details->city; 
echo "\n";
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo $details->country; 
echo "<br>";
echo "Loc Maps";
echo "\n";
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo $details->loc; 
echo "<br>";
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo $details->org; 
echo "<br>";
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo $details->hostname; 
echo "<br>";
echo '<a class="button" href="index.html" role="button">VOLVER A INICIO</a>';
'  </body>'.
'</html>';
 echo $string; 
?>