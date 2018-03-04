<!DOCTYPE HTML>
<html><head>
<link href="https://fonts.googleapis.com/css?family=Orbitron:700" rel="stylesheet">
<title>HTTP PROXY</title>
</head>
<body style="background-color: black">
<center>
<font color="aqua" size="14" face="Orbitron">Challenge 01</font><br><br><br>
<font color="white" size="5" face="Orbitron">You must connect to proxy - 1.3.3.7:4444</font><br><br>
<font color="red" size="4" face="Orbitron">
<?php

foreach (getallheaders() as $a => $b) {
$x = "$a: $b\n";
foreach (getallheaders() as $c => $d) {
$y = "$c: $d\n";
if(strpos($x, 'X-Forwarded-For: 1.3.3.7') !== false && strpos($y, 'X-Forwarded-Port: 4444') !== false) {
echo 'Flag : OmeletteAuFromage111'; }	
}}

?>
</font></center>
</body></html>