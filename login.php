<?php
    require 'conndb.php';

    $login_username = mysqli_real_escape_string($dbcon, $_POST['username']);
    $login_password = mysqli_real_escape_string($dbcon, $_POST['password']);


    $sult = 'jimmyjackhacktoolbystevemcshop';
    $pass_hash = hash_hmac('sha256', $login_password, $sult);

    $sql = "SELECT * FROM authme WHERE username=? AND password=?";
    $stmt = mysqli_prepare($dbcon, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $login_username, $pass_hash);
    mysqli_execute($stmt);
    $result_stmt = mysqli_stmt_get_result($stmt);
    function alert($msg)
    {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }

    if ($result_stmt->num_rows == 1)
    {
        session_start();
        $row_user = mysqli_fetch_array($result_stmt, MYSQLI_ASSOC);
        $_SESSION['user_id'] = $row_user['username'];
        $_SESSION['permission'] = $row_user['permission'];
        header('Location: ../member.php');
    }
    else {
        alert('username หรือ password ไม่ถูกต้อง');
        header('Location: ../login.php');
    }



 ?>
