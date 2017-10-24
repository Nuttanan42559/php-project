<?php
    require '../_action/conndb.php';


    $AD_user = mysqli_real_escape_string($dbcon, $_POST['ad_user']);
    $AD_pass = mysqli_real_escape_string($dbcon, $_POST['ad_pass']);

    $key = "passwordkakkakbackendkakkaksystemkakkak";
    $AD_pass_hash = hash_hmac('sha256', $AD_pass, $key);

    $sql = "SELECT * FROM what WHERE admin_name=? AND admin_password=?";
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
        $_SESSION['admin_id'] = $row_user['admin_name'];
        header('Location: ../frm_backend.php');
    }
    else {
        alert('username หรือ password ไม่ถูกต้อง');
        header('Location: ../backed_login.php');
    }

 ?>
