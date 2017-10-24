<?php
     session_start();

     if (isset($_SESSION['user_id']))
     {
         header('Location: member.php');
     }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login : <?php  ?></title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/steve.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body style="background-color: #CCD1D9">
  <div class="container">
    <center><img src="img/logo.png" height="340" width="340"></center>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><font size="4">Server name</font></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><font size="4"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ร้านค้า</font></a></li>
            <li class="active"><a href=""><font size="4"><i class="fa fa-sign-in" aria-hidden="true"></i> เข้าสู่ระบบ</font></a></li>
            <li><a href="register.php"><font size="4"><i class="fa fa-user-plus" aria-hidden="true"></i> สมัครสมาชิก</font></a></li>
            <li><a href=""></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <div class="row">
    <form action="_action/_login.php" method="post">

    <div class="col-sm-6">
    <div class="panel panel-success">
      <div class="panel panel-heading"><font size="4">Login : เข้าสู่ระบบ</font></div>
      <div class="panel panel-body">
          <input class="form-control" type="text" name="username" id="username" placeholder="USERNAME">
          <br>
          <input class="form-control" type="password" name="password" id="password" placeholder="PASSWORD">
          <br>
          <center><button type="submit" class="btn btn-lg btn-success">ยืนยัน</button>
      </div>
    </div>
   </div>
    </form>
   <div class="col-sm-6">
     <div class="panel panel-default">
      <div class="panel panel-heading"><font size="4">Server rule - กฎของเซิฟ</font></div>
      <div class="panel panel-body">
         <font size="4">
            **ช่องทางการติดต่อหรือพูดคุยมีดังนี้**
            <br>
            Facebook fanpage :
            <br>
            Youtube chanel :
            <br>
        </font>
      </div>
    </div>
   </div>
  </div>
</div>
</html>
