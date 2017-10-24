<?php

   require '../_action/conndb.php';
   $getid = ;
   $name = $_POST[''];
   $price = $_POST[''];
   $amount = $_POST[''];
   $img = $_POST[''];
   $command =$_POST[''];





   if (is_numeric($getid))
   {
    if ($getid !== ' ')
    {
        mysqli_query($dbcon, "UPDATE product SET id_product = '', name_product = '', price_product = '', amount = '', img_product = '', command_product = '' WHERE id_product = $getid");
    }
   }



 ?>
