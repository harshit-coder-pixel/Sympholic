<?php
    require './config/session-login.php';
    $role = $_SESSION['role'];
    // echo $count;
    if($role == 'admin' || $role == 'Admin')
    {
        header("Location: ./Dashboard-ui/admin-sidebar.php");
        die();
    }
    else if($role == 'user' || $role == 'User')
    {
        header("Location: ./Dashboard-ui/sidebar.php");
        die();
    }
    else
    {
        header("Location: ./Dashboard-ui/sidebar.php");
        die();
    }
?>