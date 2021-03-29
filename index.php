<?php

require('routeros_api.class.php');

$API = new RouterosAPI();

$API->debug = false;
//Config
$iphost = "ip_kalian";
$userhost = "user_kalian";
$pass = "troke_keren_abizzz";

if ($API->connect($iphost, $userhost, $pass)) {

   $stats = $API->comm('/system/resource/print');
   $meme = $stats['0'];

   echo "<title>Contoh Bro</title>";
   echo "<table>";
   echo "<tr><td>Uptimenya segini bro = " . $meme['uptime'] . "</td></tr><br />";
   echo "<tr><td>CPU yang dipake = " . $meme['cpu'] . "</td></tr>";
   echo "</table>";
   $API->disconnect();

}

?>
