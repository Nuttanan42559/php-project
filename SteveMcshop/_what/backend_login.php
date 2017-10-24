<?php

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login : Backend</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/steve.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body style="background-color: #CCD1D9">
     <center><img src="../img/logo.png" height="340" width="340"></center>
     <div class="container">
       <div class="row">
         <div class="col-sm-4">

         </div>
         <div class="col-sm-4">
           <form action="_backend.php" method="post">
             <div class="panel panel-info">
               <div class="panel panel-heading"><font size="4">Backend | System</font></div>
               <div class="panel panel-body">
                  <input class="form-control" type="text" name="ad_user" placeholder="Username">
                  <br>
                  <input class="form-control" type="password" name="ad_pass" placeholder="Password">
                  <br>

               </div>
             </div>
           </form>
         </div>
       </div>
     </div>

  </body>
</html>
