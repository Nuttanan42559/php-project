<?php
    session_start();


    if (session_destroy())
    {
        header('Location: ../login.php');
    }

    if (!isset($_SESSION['user_id']))
    {
        header('Location: ../login.php');
    }

 ?>
