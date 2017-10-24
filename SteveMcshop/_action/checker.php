<?php
   require "conndb.php";

   if (isset($_POST["username"]))
   {
      $sql = "SELECT * FROM authme WHERE username = '".$_POST["username"]."'";
      $result = mysqli_query($dbhandle, $sql);
      if (mysqli_fetch_row($result) > 0)
      {

      }
    
   }
 ?>
