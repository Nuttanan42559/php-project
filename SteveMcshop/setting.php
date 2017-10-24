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
     <title>SETTING : <?php echo $_SESSION['user_id']; ?></title>

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/steve.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <style>
       .navbar {
           margin-bottom: 0;
           border-radius: 0;
       }
     </style>
   </head>
   <body>
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
               <li><a href="login.php"><font size="4"><i class="fa fa-sign-in" aria-hidden="true"></i> เข้าสู่ระบบ</font></a></li>
               <li><a href="register.php"><font size="4"><i class="fa fa-user-plus" aria-hidden="true"></i> สมัครสมาชิก</font></a></li>
               <li><a href=""></a></li>
             </ul>
           </div>
         </div>
       </nav>
       <br>
       <form action="_action/_setting.php" method="post">
            <div class="panel panel-danger">
              <div class="panel panel-heading">เปลี่ยน</div>
              <div class="panel panel-body">

              </div>
            </div>
       </form>
   </body>
 </html>
