<?php
    session_start();
    $_SESSION["user_status"]="logged_out";
    session_unset();
    session_destroy();
    header("Location: ../Landing-site/homepage.php");
    die();
?>