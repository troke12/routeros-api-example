<?php
// Ini adalah contoh script yang berfungsi untuk menjalankan /system/script
require('routeros_api.class.php');

$API = new RouterosAPI();

$API->debug = false;
//Config
$iphost = "ip_public_kalian";
$userhost = "nama_user";
$pass = "troke_keren";

if ($API->connect($iphost, $userhost, $pass)) {

   $API->write('/system/script/getall', false);
   $API->write('=.proplist=.id', false);
   $API->write('?name=testcode'); //disini nama scriptku adalah testcode
   $READ = $API->read(false);
   $ARRAY = $API->parseResponse($READ);
   if(isset($ARRAY['0']) && isset($ARRAY['0']['.id'])) {
        $API->write('/system/script/run', false);
        $API->write('=.id='. $ARRAY['0']['.id']);
        $READ = $API->read(false);
        echo '{"name":"testcode","state":"OK"}';
   } else {
        echo 'Error';
   }
   $API->disconnect();

}

?>
