<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
      header('Location: index.php');
    }

    $getid = $_GET['buy'];
    $user = $_SESSION['user_id'];
    require 'conndb.php';
    require '../_rcon/Rcon.php';
    require '../conf.php';

    use Thedudeguy\Rcon;


    if (is_numeric($getid))
    {
      if ($getid !== ' ')
      {

        $ps = mysqli_query($dbcon,"SELECT * FROM product WHERE id_product = '$getid'")->fetch_assoc();
        $us = mysqli_query($dbcon,"SELECT * FROM authme WHERE username = '$user'")->fetch_assoc();
        $rcon = new Rcon($host, $port, $password, $timeout);


        if ($ps['price_product'] > $us['point'])
        {
          if (header('Location: ../member.php')) {
           $alert = "<div id='alert' class='alert alert-danger' role='alert'><strong>เงินในบัญชีของคุณไม่พอ!</strong> กรุณาเติมเงินด้วยนะครับ</div>";
          }
        }
        else if ($ps['price_product'] <= $us['point'])
        {
           $command = str_replace('<player>',$user,$ps['command_product']);

           if ($rcon->connect()) {
             $rcon->sendCommand($command);
           }
           $detail = $ps['name_product'];
           $ans = $us['point'] - $ps['price_product'];
           mysqli_query($dbcon,"UPDATE authme SET point = '$ans' WHERE username = '$user'");
           $keep_log = mysqli_query($dbcon, "INSERT INTO logs (who_log, data_log) VALUES ('$user','$detail')");
           if (header('Location: ../member.php')) {
              $alert = "<div id='alert' class='alert alert-success' role='alert'><strong>ทำรายการเรียบร้อยเเล้ว</strong> ขอบคุณสำหรับการใช้บริการ โอกาสหน้าเชิญใหม่นะครับ</div>";
           }

        }



      }
    }
    else
    {
      exit;
    }





 ?>
