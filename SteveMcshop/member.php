<?php
     session_start();
     //error_reporting(0);


     if (!isset($_SESSION['user_id']))
     {
        header('Location: index.php');
     }

     require 'conndbs.php';

     mysqli_set_charset($dbcon, "utf8");

     $user = $_SESSION['user_id'];
     $records = mysqli_query($dbcon,"SELECT * FROM news ORDER BY date_content ASC");
     $product = mysqli_query($dbcon,"SELECT * FROM product ORDER BY id_product DESC");
     $userdata = mysqli_query($dbcon,"SELECT * FROM authme WHERE username = '$user'");
     $log = mysqli_query($dbcon, "SELECT * FROM logs ORDER BY date_log DESC LIMIT 8");
     $alert = ' ';




 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MEMBER : <?php echo $_SESSION['user_id']; ?></title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/steve.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sweetalert.css">

    <script src="js/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
      .navbar {
          margin-bottom: 0;
          border-radius: 0;
      }
    </style>
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
            <li class="active"><a href="#"><font size="4"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ร้านค้า</font></a></li>
            <li><a href="refill.php"><font size="4"><i class="fa fa-money" aria-hidden="true"></i></i> เติมเงิน</font></a></li>
            <?php
                if ($_SESSION['permission'] == 20) {
                   echo "<li><a href='_what/frm_backend.php'><font size='4' color='red'><i class='fa fa-cog' aria-hidden='true'></i></i> จัดการระบบ</font></a></li>";
                }


             ?>
            <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font size="4"><i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $_SESSION['user_id']; ?></font><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href=""><i class="fa fa-cog" aria-hidden="true"></i><font size="4"> ตั้งค่าสมาชิก</font></a></li>
                  <li><a href="_action/_logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i><font size="4"> ออกจากระบบ</font></a></li>
                </ul>
              </li>

            <li><a href=""></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <div class="row">
      <div class="col-md-4 col-md-push-8">
        <div class="panel panel-info">
          <div class="panel panel-heading"><font size="4">ABOUT | <?php echo $_SESSION['user_id']; ?></font></div>
          <div class="panel panel-body">

            <br>
            <img src="" alt="">
            <br>
             <center><font size="6"><u><?php echo $_SESSION['user_id']; ?></u></font></center>
             <br>
             <?php $data = $userdata->fetch_assoc() ?>
             <font size="4"><i class="fa fa-money" aria-hidden="true"></i> Username : <font size="5"><span class="label label-warning label-lg"> <?php echo $data['username']; ?></span></font></font>
             <br>
             <font size="4"><i class="fa fa-money" aria-hidden="true"></i> Point : <font size="5"><span class="label label-success label-lg"> <?php echo $data['point']; ?></span></font></font>


          </div>
        </div>
        <div class="panel panel-info">
          <div class="panel panel-heading">
               <font size="4">Last รายการล่าสุด</font>
            </div>
            <div class="panel panel-body">
              <?php
                  if ($log->num_rows > 0)
                  {
                    while ($log_row = $log->fetch_assoc())
                    {
                       echo "<a class='list-group-item'><font color='orange'><b>" . $log_row['who_log'] . "</b></font> ได้ซื้อ <font color='red'>" . $log_row['data_log'] . "</font> จำนวน X 1 รายการ</a>";

                    }
                  }
               ?>
            </div>
        </div>
      </div>
      <div class="col-md-8 col-md-pull-4">
        <div class="panel panel-warning">
          <div class="panel-heading"><font size="4">ข่าวสาร</font></div>
          <div class="panel-body">
            <div class="col-sm-12">
                <div class="list-group">
                  <?php
                  if ($records->num_rows > 0)
                  {
                    while ($row = $records->fetch_assoc())
                    {
                      if ($row['type_content'] == 1)
                      {
                         echo "<a class='list-group-item'><span class='label label-danger label-xs'>ข่าวด่วน</span> " . $row['data_content'] . "</a>";
                      }
                      else if($row['type_content'] == 0)
                      {
                         echo "<a class='list-group-item'><span class='label label-success label-xs'>ข่าวทั่วไป</span> " . $row['data_content'] . "</a>";
                      }

                    }
                  }
                  else {
                      echo "<a class='list-group-item'><span class='label label-warning label-xs'>ยังไม่มีข้อมูล</span> ยังไม่มีข่าวสาร?</a>";
                  }
                   ?>

                </div>
        </div>

          </div>
        </div>
        <div class="panel panel-success">
          <div class="panel panel-heading"><font size="4">Shop : สินค้า</font></div>
          <div class="panel panel-body">
            <form method="">

            <?php

            echo $alert;

            if ($product->num_rows > 0)
            {
              while ($order = $product->fetch_assoc())
              {
                echo "<div class='col-sm-6'>";
                  echo "<a href='' class='list-group-item'>";
                    echo "<center><img src=" . $order['img_product'] . " height='200' width='200'></center>";
                    echo "<br>";
                    echo "<font size='5' class='list-group-item-heading'>" . $order['name_product'] . "<font color='#f72e6b'><b> X  " . $order['amount'] . "</b></font></font>";
                    echo "<br>";
                    echo "<font size='4' class='list-group-item-heading'>ราคา : <font size='4' color='green'><b>" . $order['price_product'] . " </b><i class='fa fa-money' aria-hidden='true'></i></font></font>";
                    echo "<br>";
                    echo "<a href='_action/_buy.php?buy=" . $order['id_product'] . "'><button type='button' class='btn btn-info' name='buy_order'>BUY ORDER</button></a>";
                  echo "</a>";
                echo "</div><br>";
              }

            }
            else {
               echo "Not Product";
            }

            ?>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>
