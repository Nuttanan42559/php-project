<?php
   require '../_config/config.php';

   $dbcon = mysqli_connect($HOST, $USER, $PASS, $DATABASE);

   if (mysqli_connect_errno()) {
     echo "<font size='8' color='red'>Database เป็นเหี้ยไรก็ไม่รู้ไปดูดิ</font>" .mysqli_connect_errno();
   }


 ?>
