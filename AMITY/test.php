<?php
   require 'rcon/Rcon.php';
   require 'config.php';

   use Thedudeguy\Rcon;

   $rcon = new Rcon($host, $port, $password, $timeout);

   $balance = 90;

   $muti = $balance * 2;

   $coin = ($balance / 100) * 10;

   $user = 'Linux';

if ($rcon->connect())
{
  if ($balance == 90) {
    for ($i = 0; $i < 200; $i++) {
      $rcon->sendCommand("mm items give" . ' ' . $user . ' ' . 'cash');
    }
    for ($i = 0; $i < 10; $i++) {
      $rcon->sendCommand("mm items give" . ' ' . $user . ' ' . 'coin');
    }
  }
  else {
    for ($i = 0; $i < $muti; $i++) {
      $rcon->sendCommand("mm items give" . ' ' . $user . ' ' . 'cash');
    }
    for ($i = 0; $i < $coin; $i++) {
      $rcon->sendCommand("mm items give" . ' ' . $user . ' ' . 'coin');
    }

  }

}




 ?>
