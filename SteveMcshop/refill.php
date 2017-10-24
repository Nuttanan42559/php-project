<?php
    session_start();

    if (!isset($_SESSION['user_id']))
    {
       header('Location: index.php');
    }
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
    <script type="text/javascript" src='https://www.tmtopup.com/topup/3rdTopup.php?uid=206037'></script>
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
            <li><a href="member.php"><font size="4"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ร้านค้า</font></a></li>
            <li class="active"><a href=""><font size="4"><i class="fa fa-money" aria-hidden="true"></i></i> เติมเงิน</font></a></li>
            <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font size="4"><i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $_SESSION['user_id']; ?></font><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="_action/setting.php"><font size="4">ตั้งค่าสมาชิก</font></a></li>
                  <li><a href="_action/_logout.php"><font size="4">ออกจากระบบ</font></a></li>
                </ul>
              </li>

            <li><a href=""></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <div class="row">
      <div class="col-sm-6">
          <div class="panel panel-default">
             <div class="panel panel-heading"><font size="4">TRUE MONEY</font></div>
             <div class="panel panel-body">
                 <center><img src="img/true-money.png" width="220" height="220"></center>
                 <input class="hidden" type="text" id="ref1" name="ref1" value="<?php echo $_SESSION['user_id']; ?>">
                 <input class="form-control text-center" id="ref2" name="ref2" type="text" value="<?php echo $_SESSION['user_id']; ?>" placeholder="<?php echo $_SESSION['user_id']; ?>" disabled="">
                 <br>
                 <input id="tmn_password" name="tmn_password" type="text" class="form-control text-center" placeholder="หมายเลขบัตร True money" maxlength="14">
                 <br>
                 <center>
                    <button type="button" class="btn btn-success" onclick="submit_tmnc()">เติมเลย</button>
                 </center>
                 <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>ราคา</th>
                        <th class="text-right">Cash ที่ได้</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>50 true</td>
                        <td class="text-right">500 cash</td>
                      </tr>
                      <tr>
                        <td>150 true</td>
                        <td class="text-right">2000 cash</td>
                      </tr>
                      <tr>
                        <td>300 true</td>
                        <td class="text-right">4000 cash</td>
                      </tr>
                      <tr>
                        <td>1000 true</td>
                        <td class="text-right">20000 cash</td>
                      </tr>
                    </tbody>
                 </table>
             </div>
          </div>
      </div>
      <div class="col-sm-6">
          <div class="panel panel-default">
             <div class="panel panel-heading"><font size="4">TRUE WALLET</font></div>
             <div class="panel panel-body">
                 <img src="img/wallet-logo.png" height="194" width="500">
                 <center><font size="8" color="#ffc000">0949698915</font></center>
                 <br>
                 <input type="text" class="form-control text-center" placeholder="เลขที่อ้างอิง True wallet" maxlength="15">
                 <br>
                 <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>ราคา</th>
                        <th class="text-right">Cash ที่ได้</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>50 wallet</td>
                        <td class="text-right">600 cash</td>
                      </tr>
                      <tr>
                        <td>150 wallet</td>
                        <td class="text-right">2500 cash</td>
                      </tr>
                      <tr>
                        <td>300 wallet</td>
                        <td class="text-right">4500 cash</td>
                      </tr>
                      <tr>
                        <td>1000 wallet</td>
                        <td class="text-right">25000 cash</td>
                      </tr>
                    </tbody>
                 </table>
             </div>
          </div>
      </div>
    </div>
  </div>
  </body>
</html>
