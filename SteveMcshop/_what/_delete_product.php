<?php
    session_start();
    require '../_action/conndb.php';

    $getid = $_GET['product'];


    if (is_numeric($getid)) {
       if ($getid !== ' ') {
           mysqli_query($dbcon, "DELETE FROM product WHERE id_product = $getid");
           header('Location: frm_backend.php');

       }
    }
    else {
      exit;
    }



 ?>
