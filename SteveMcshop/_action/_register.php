<?php
   require 'conndb.php';

   $user = $_POST['username'];
   $pass = $_POST['password'];
   $conpass = $_POST['con_password'];

   $sult = 'jimmyjackhacktoolbystevemcshop';
   $pass_hash = hash_hmac('sha256', $pass, $sult);

   $regis = "INSERT INTO authme (username,password) VALUES ('$user','$pass_hash')";

   function alert($msg)
   {
       echo "<script type='text/javascript'>alert('$msg');</script>";
   }

   if ($pass !== $conpass)
   {
       header('Location: ../register.php');
   }

   if (strlen($user) and strlen($pass) < 4)
   {
       alert('username เเละ password ต้องมีความยาวมากกว่า 4 ตัว !เค๋');
       exit;
   }

   if (empty($user) and empty($pass))
   {
     alert('กรุณากรอกข้อมูลด้วยจ้า');
     exit;
   }

   if (isset($_POST["username"]))
   {
      $sql = "SELECT * FROM authme WHERE username = '".$_POST["username"]."'";
      $result = mysqli_query($dbcon, $sql);
      if (mysqli_fetch_row($result) > 0)
      {
        alert('มีคนใช้เเล้วจ้า');
        exit;

      }

   }


   if($result)
     {
        alert('ทำรายการเรียบร้อยเเล้ว');
        $result = mysqli_query($dbcon, $regis);
        header('Location: ../login.php');
        exit;
     }
     else
     {
        alert('เกิดข้อผิดพลาดโปรดทำรายการใหม่');
        exit;
     }


 ?>
