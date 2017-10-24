<?php
    require 'class.truewallet.php';
    require 'config.php';
    require 'rcon/Rcon.php';

    use Thedudeguy\Rcon;

    $rcon = new Rcon($host, $port, $password, $timeout);

    $alert = ' ';

    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit']))
    {
        if (empty($_POST['username']) && empty($_POST['truemoney']))
        {
             $alert = "<div class='alert alert-danger'><strong>!กรุณา</strong> ใส่ username เเละเลขบัตร truemoney ด้วยนะครับ</div>";
        }
        elseif (!is_numeric($_POST['truemoney'])) {
             $alert = "<div class='alert alert-danger'><strong>!รูปแบบของเลขบัตรไม่ถูกต้อง</strong></div>";
        }
        else {
             $getnum = $_POST['truemoney'];

             $wallet = new TrueWallet($phone, $pin, $phone);
             $token = json_decode($wallet->GetToken(),true)['data']['accessToken'];
             $paystate = $wallet->Topup($getnum,$token);
             //echo $paystate;

             if (strpos($paystate, 'ไม่สามารถทำรายการได้'))
             {
                   $alert = "<div class='alert alert-danger'><strong>!ไม่สามารถรายการได้ กรุณาลองใหม่</strong></div>";
             }
             elseif (strpos($paystate, 'transactionId')) {
                   $cutstr = substr($paystate, 10, 4);
                   $balance = intval($cutstr);

                   $user = $_POST['username'];
                   $muti = $balance * 2;

                   $coin = ($balance / 100) * 10;

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

                   $alert = "<div class='alert alert-success'><strong>ทำรายการเรียบร้อยเเล้ว</strong></div>";

             }

        }


    }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AMITY - shop</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/amity.css">


  </head>
  <body>
<img src="img/backg.png" class="bg">
    <div class="container">
      <div class="row">
        <div class="col-4">
            <center><img src="img/amity.png" width="1160" height="400"></center>

        </div>
        <div class="col-4">

        </div>
        <div class="col-4">

        </div>
        <div class="col-4">

        </div>
        <div class="col-4">

          <form method="post">

         <div class="jumbotron">
           <img src="img/logo-truemoney.png">
           <?php echo $alert;  ?>

          <input type="text" class="form-control text-center" name="username" placeholder="Username">
          <br>
          <input type="text" class="form-control text-center" name="truemoney" placeholder="เลขบัตร truemoney 14 หลัก" maxlength="14">
          <br>
            <center><font size="4" color="orange"><strong>!ต้องออนไลน์ในเซิฟเวอร์</strong></font></center>
            <center><font size="4" color="greem"><strong>!ก่อนปิดเว็บโปรดดูว่าได้ cash กับ coin คบเเล้วก่อนนะครับ</strong></font></center>
            <br>
          <center><font color="greem">----| </font><button class="btn btn-success" type="submit" name="submit">ตกลง</button><font color="greem"> |----</font></center>
         </div>
         <center><a href="https://www.facebook.com/noaa.thailand"><font size="4" color="white">Copyright © 2017 | Linux@amity-mc.com</font></a></center>
         </form>
        </div>
      </div>
    </div>
  </body>
</html>
